<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Event;
use App\Models\EventView;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function allEvents(){
        $events=EventView::get();
        return $events;
    }

    public function singleEvent($id){
        $events=EventView::where('id',$id)->first();
        return $events;
    }
    public function index(){
        $agent=Agent::where('user_id',auth()->user()->id)->first();
        $events=Event::where('company_id',$agent->company_id)->get();
//        return $events;
        return view('event.index',compact('events'));
    }

    public function edit($id){
        $event=Event::findOrFail($id);
//        return $event;
        return view('event.edit',compact('event'));
    }

    public function store(Request $r){
//        return $r;
        $agent=Agent::where('user_id',auth()->user()->id)->first();
//        return $agent;

        if($r->id){
            $event=Event::findOrFail($r->id);
        }
        else{
            $event=new Event();
        }

        $event->title=$r->title;
        $event->price=$r->price;
        $event->start_date=$r->start_date;
        $event->end_date=$r->end_date;
        $event->details=$r->details;
        $event->agent_id=$agent->id;
        $event->company_id=$agent->company_id;
        $event->save();
        return back();
    }

}
