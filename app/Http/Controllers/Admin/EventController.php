<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Event;

use App\Models\EventHistory;

use Carbon\Carbon;

class EventController extends Controller
{
    public function add()
    {
        return view('admin.event.create');
    }

    public function create(Request $request)
    {

        $this->validate($request, Event::$rules);
        
        $event = new Event;
        $form = $request->all();
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $event->fill($form);
        $event->save();
        
        return redirect('admin/event/create');
    }

    public function edit(Request $request)
    {
        $event = Event::find($request->id);
        if (empty($event)) {
            abort(404);
        }
//        dd($profile);
        return view('admin.event.edit', ['event_form' => $event]);
    }
    
     public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Event::$rules);
        // Profile Modelからデータを取得する
        $event = Event::find($request->id);
        // 送信されてきたフォームデータを格納する
        $event_form = $request->all();

        unset($event_form['_token']);

        // 該当するデータを上書きして保存する
        $event->fill($event_form)->save();
        
        $e_history = new EventHistory();
        $e_history->event_id = $event->id;
        $e_history->edited_at = Carbon::now();
        $e_history->save();
        
        return redirect('/');
    } 
}
