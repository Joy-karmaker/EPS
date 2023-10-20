<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Donations;
use Illuminate\Support\Facades\Auth;
class DonationController extends Controller
{
    public function donationList()
    {

        // $events= DB::table('events as e')->select(
        //     'p.name as programme_name',
        //     'e.name',
        //     'e.eventDate',
        //     'e.donationStartDate',
        //     'e.donationClosingDate',
        //     'e.id',
        //     'e.user_id'
        // )
        // ->leftjoin('programmes as p', 'p.id', '=', 'e.programId')

        // ->orderBy('e.id','desc')
        // ->where('e.status','<>',0)->paginate(5);
        // // $events = DB::table('events')->where('status','<>',0)->get();
        //     // dd($events);
        return view('donation.donation');
    }
    public function createDonation()
    {
        $programs = DB::table('programmes')->where('status','<>',0)->get();
        $events = DB::table('events')->where('status','<>',0)->get();
        $users = DB::table('users')->get();
        return view('donation.createDonation', ['programs' =>$programs,'events' =>$events,'users'=>$users]);
    }
    public function storeDonation(Request $request)
    {

        $validator=Validator::make($request->all(), [
            'program_id' => 'required',
            'event_id' => 'required',
            'donationDate' => 'required',
            'account_number' => 'required',
            'donation_amount' => 'required',
            'transaction_number' => 'required'

        ]
        , [

            'program_id.required' => 'Please Enter Full Name.',
            'event_id.required' => 'Please Enter Full Name.',
            'donationDate.required' => 'Please Enter Full Name.',
            'account_number.required' => 'Please Enter Full Name.',
            'donation_amount.required' => 'Please Enter Full Name.',
            'transaction_number.required' => 'Please Enter Full Name.'

        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $Donations= new Donations();
        $Donations->programId = $request->input('program_id');
        $Donations->event_id = $request->input('event_id');
        $Donations->donationDate = $request->input('donationDate');
        $Donations->account_number = $request->input('account_number');
        $Donations->donation_amount = $request->input('donation_amount');
        $Donations->transaction_number = $request->input('transaction_number');
        // @auth('admin')
        // $user_admin_id=Auth::guard('admin')->user()->id;
        // @endauth
        // @auth('user')
        // $user_admin_id=Auth::guard('user')->user()->id;
        // @endauth
        // dd($user_admin_id);
        $Donations->user_id=Auth::guard('user')->user()->id;
        $Donations->save();
        // Admin::create($request->post());

        return redirect()->route('donations.donationList')->with('success','Donation has been created successfully.');
    }
}
