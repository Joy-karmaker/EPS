<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
class EventController extends Controller
{
    public function eventList()
    {

        $events= DB::table('events as e')->select(
            'p.name as programme_name',
            'e.name',
            'e.eventDate',
            'e.donationStartDate',
            'e.donationClosingDate',
            'e.id',
            'e.user_id'
        )
        ->leftjoin('programmes as p', 'p.id', '=', 'e.programId')

        ->orderBy('e.id','desc')
        ->where('e.status','<>',0)->paginate(5);
        // $events = DB::table('events')->where('status','<>',0)->get();
            // dd($events);
        return view('event.event', compact('events'));
    }
    public function createEvent()
    {
        $programs = DB::table('programmes')->where('status','<>',0)->get();
        $users = DB::table('users')->get();
        return view('event.createEvent', ['programs' =>$programs,'users'=>$users]);
    }
    public function storeEvent(Request $request)
    {

        $validator=Validator::make($request->all(), [
            'eventName' => 'required|string|max:30',
            'eventDate' => 'required',
            'donationStartDate' => 'required',
            'donationClosingDate' => 'required'

        ]
        , [

            'eventName.required' => 'Please Enter Full Name.'

        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $Event= new Event();
        $Event->name = $request->input('eventName');
        $Event->programId = $request->input('program_id');
        $Event->eventDate = $request->input('eventDate');
        $Event->donationStartDate = $request->input('eventStartDate');
        $Event->donationClosingDate = $request->input('eventCloseDate');
        $user_admin_id='';
        // @auth('admin')
        // $user_admin_id=Auth::guard('admin')->user()->id;
        // @endauth
        // @auth('user')
        // $user_admin_id=Auth::guard('user')->user()->id;
        // @endauth
        // dd($user_admin_id);
        $Event->user_id=Auth::guard('admin')->user()->name;
        $Event->save();
        // Admin::create($request->post());

        return redirect()->route('events.eventList')->with('success','Event has been created successfully.');
    }
}
