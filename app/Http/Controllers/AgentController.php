<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function index()
    {
        $agents=Agent::select('agent.*','company.company_name')->leftJoin('company','company.company_id','agent.company_id')->get();
        $companies=Company::get();

        return view('agent.index',compact('agents','companies'));
    }

    public function store(Request $r){
//        return Hash::make($r->password);
//        return $r;

        $user=new User();
        $user->name=$r->agent_name;
        $user->email =$r->email ;
        $user->password =Hash::make($r->password);
        $user->type ='agent' ;
        $user->status =1 ;
        $user->save();


        $agent=new Agent();
        $agent->agent_name=$r->agent_name;
//        $agent->contact_number=$r->contact_number;
        $agent->contact_number=$r->contact_number;
        $agent->nid=$r->nid;
        $agent->company_id=$r->company_id;
        $agent->user_id=$user->id;
        $agent->save();




        // $agent->save();

        return back();
    }
    public function edit($id){
        $agent=Agent::findOrFail($id);
        $user=User::findOrFail($agent->user_id);

        $companies=Company::get();

        return view('agent.edit',compact('agent','companies','user'));
//        return $agent;
    }

    public function update(Request $r){
        $agent=Agent::findOrFail($r->id);
        $agent->agent_name=$r->agent_name;
//        $agent->contact_number=$r->contact_number;
        $agent->contact_number=$r->contact_number;
        $agent->nid=$r->nid;
        $agent->company_id=$r->company_id;
        $agent->save();

        $user=User::findOrFail($agent->user_id);
        $user->name=$r->agent_name;
        $user->email =$r->email ;

        $user->type ='agent' ;
        $user->status =1 ;
        $user->save();
        return back();
    }
}
