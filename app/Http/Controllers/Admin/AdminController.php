<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('admins.admin_dashboard');
    }

    public function profile()
    {
        $adminId = Auth::guard('admin')->user()->id;

        $admins= DB::table('admins as a')->select(
            'c.name as country_name',
            'a.name',
            'a.email',
            'a.address',
            'a.phone_no',
            'a.street',
            'a.image',
            'a.id',
            'a.city'
        )
        ->leftjoin('ref_country as c', 'c.id', '=', 'a.country_id')
        ->where('a.id', $adminId)
        ->orderBy('a.id','asc')->first();

        //dd($admins);
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
            'address' => 'required'
        ]
        , [
            'country_id.required' => 'Select Country Name.',
            'name.required' => 'Please Enter Full Name.',
            'email.required' => 'Please Enter Your Email.',
            'password.required' => 'Please Enter Your Password.',
            'address.required' => 'Please Enter Address.'
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

        $Admin= new Admin();
        $Admin->name = $request->input('name');
        $Admin->email = $request->input('email');
        $Admin->password = bcrypt($request->input('password'));
        $Admin->is_admin = 1;
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


    public function show(Admin $admin)
    {
        return view('admins.show',compact('admin'));
    }


    public function edit($id)
    {
        $admin = Admin::find($id);
        $countries = DB::table('ref_country')->get();
        return view('admins.edit',['countries' =>$countries],compact('admin'));
    }

    public function updateAdmin(Request $request, $id)
    {
        $validator=$request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|string|email|unique:admins,email',
            'password' => 'required|string|min:6',
            'country_id' => 'required',
            'address' => 'required'
        ]
        , [
            'country_id.required' => 'Select Country Name.',
            'name.required' => 'Please Enter Full Name.',
            'email.required' => 'Please Enter Your Email.',
            'password.required' => 'Please Enter Your Password.',
            'address.required' => 'Please Enter Address.'
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() .(rand(0,9)*100).'.'. $image->getClientOriginalExtension(); // Generate a unique file name
            $image->move(public_path('Image'), $imageName);
            //return 'Image uploaded successfully.';
        }else {
            $imageName = $request->input('existing_image');
        }
        $Admin = Admin::find($id);
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

        return redirect()->route('admins.profile')->with('success','Admin Has Been updated successfully');


    }


    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admins.index')->with('success','Admin has been deleted successfully');
    }

    public function login()
    {
        return view('admins.login');
    }
    public function SaveLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('admins.index'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function allAdminProfile()
    {
        $admins= DB::table('admins as u')->select(
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
        ->where('data_status','<>',0)

        ->orderBy('u.id','asc')->get();


        return view('admins.allAdminProfile', compact('admins'));
    }
    public function allAdminActive($id)
    {
        DB::table('admins')->where('id', $id)->update(['active_status' => '0']);
        return redirect()->route('admins.allAdminProfile')->with('success','Admin has been Inactive successfully');
    }
    public function allAdminDelete($id)
    {
        DB::table('admins')->where('id', $id)->update(['data_status' => '0']);
        return redirect()->route('admins.allAdminProfile')->with('success','Admin has been deleted successfully');
    }

}
