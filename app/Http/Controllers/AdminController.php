<?php

namespace App\Http\Controllers;
//use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        //$admins = Admin::orderBy('id','desc')->first();
        // dd($admins);

        $admins= DB::table('users as u')->select(
            'c.name as country_name',
            'u.name',
            'u.email',
            'u.address',
            'u.phone_no',
            'u.street',
            'u.image',
            'u.id',
            'u.city'
        )
        ->leftjoin('ref_country as c', 'c.id', '=', 'u.country_id')
        ->orderBy('u.id','desc')->first();
        return view('admins.admin_profile', compact('admins'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $countries = DB::table('ref_country')->get();
        $programs = DB::table('programs')->get();
        $events = DB::table('events')->get();

        return view('admins.create', ['countries' =>$countries,'programs' =>$programs,'events' =>$events]);
    }


    public function store(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'name' => 'required|string|max:30',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6',
            'country_id' => 'required',
            'address' => 'required',
            'phone_no' => 'required|max:11|min:11'
        ]
        , [
            'country_id.required' => 'Select Country Name.',
            'name.required' => 'Please Enter Full Name.',
            'email.required' => 'Please Enter Your Email.',
            'password.required' => 'Please Enter Your Password.',
            'address.required' => 'Please Enter Address.',
            'phone_no.required' => 'Please Enter Phone no.',
        ]);

        $imageName="";
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() .(rand(0,9)*100).'.'. $image->getClientOriginalExtension(); // Generate a unique file name
            $image->move(public_path('Image'), $imageName);
            //return 'Image uploaded successfully.';
        }

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $Admin= new User();
        $Admin->name = $request->input('name');
        $Admin->email = $request->input('email');
        $Admin->password = bcrypt($request->input('password'));
        $Admin->country_id = $request->input('country_id');
        $Admin->address = $request->input('address');
        $Admin->phone_no = $request->input('phone_no');
        $Admin->city = $request->input('city');
        $Admin->street = $request->input('street');
        $Admin->image = $imageName;
        $Admin->save();
        // Admin::create($request->post());

        return redirect()->route('admins.index')->with('success','Admin has been created successfully.');
    }


    public function show(User $admin)
    {
        return view('admins.show',compact('admin'));
    }


    public function edit(User $admin)
    {
        // dd($admin);
        $countries = DB::table('ref_country')->get();
        return view('admins.edit',['countries' =>$countries],compact('admin'));
    }

    public function update(Request $request, User $Admin)
    {
        $validator=$request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6',
            'country_id' => 'required',
            'address' => 'required',
            'phone_no' => 'required|max:11|min:11'
        ]
        , [
            'country_id.required' => 'Select Country Name.',
            'name.required' => 'Please Enter Full Name.',
            'email.required' => 'Please Enter Your Email.',
            'password.required' => 'Please Enter Your Password.',
            'address.required' => 'Please Enter Address.',
            'phone_no.required' => 'Please Enter Phone no.',
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() .(rand(0,9)*100).'.'. $image->getClientOriginalExtension(); // Generate a unique file name
            $image->move(public_path('Image'), $imageName);
            //return 'Image uploaded successfully.';
        }else {
            $imageName = $request->input('existing_image');
        }
        // $Admin= new Admin();
        $Admin->name = $request->input('name');
        $Admin->email = $request->input('email');
        $Admin->password = bcrypt($request->input('password'));
        $Admin->country_id = $request->input('country_id');
        $Admin->address = $request->input('address');
        $Admin->phone_no = $request->input('phone_no');
        $Admin->city = $request->input('city');
        $Admin->street = $request->input('street');
        $Admin->image = $imageName;
        $Admin->save();

        return redirect()->route('admins.admin_profile')->with('success','Admin Has Been updated successfully');


    }
    

    public function destroy(User $admin)
    {
        $admin->delete();
        return redirect()->route('admins.index')->with('success','Admin has been deleted successfully');
    }

}
