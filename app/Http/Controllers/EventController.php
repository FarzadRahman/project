<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Company;
use App\Models\Event;
use App\Models\EventView;
use Illuminate\Http\Request;
use App\Models\CustomerOrder;

class EventController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function placeOrder(Request $r){
        $events=$r->events;
        $user=$r->user;

        foreach ($events as $event){
            $order=new CustomerOrder();
            $order->user_id=$user['id'];
            $order->event_id=$event['id'];
            $order->save();
        }
        return $r;
    }

    public function allEvents(){
        $events=EventView::get();
        return $events;
    }

    public function singleEvent($id){
        $events=EventView::where('id',$id)->first();
        return $events;
    }
    public function index(){
        if(auth()->user()->type=="admin"){
            // $agent=Agent::where('user_id',auth()->user()->id)->first();
            $events=Event::get();
            // $company=Company::findOrFail($agent->company_id);
            return view('event.index',compact('events'));
        }
        else{
            $agent=Agent::where('user_id',auth()->user()->id)->first();
            $events=Event::where('company_id',$agent->company_id)->get();
            $company=Company::findOrFail($agent->company_id);
            return view('event.index',compact('events','company'));
        }

    }

    public function edit($id){
        $event=Event::findOrFail($id);
//        return $event;
        return view('event.edit',compact('event'));
    }

    public function store(Request $r){

        $r->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        /* Store $imageName name in DATABASE from HERE */

        if($r->id){
            $event=Event::findOrFail($r->id);
        }
        else{
            $agent=Agent::where('user_id',auth()->user()->id)->first();
            $event=new Event();
            $event->agent_id=$agent->id;
            $event->company_id=$agent->company_id;
        }

        $event->title=$r->title;
        $event->price=$r->price;
        $event->start_date=$r->start_date;
        $event->end_date=$r->end_date;
        $event->details=$r->details;

        if($r->hasFile('image')){

            $imageName = time().'.'.$r->image->extension();

            $r->image->move(public_path('images'), $imageName);
            $event->image=$imageName;
        }

        $event->save();
        return back();
    }

}
