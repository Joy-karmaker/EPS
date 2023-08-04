<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function userProfile($id='2')
    {

        $users= DB::table('users as u')->select(
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
        ->where('u.id', $id)
        ->where('u.data_status','<>',0)
        ->orderBy('u.id','asc')->first();
        return view('users.users_profile', compact('users'));
    }


    public function createUser()
    {
        $countries = DB::table('ref_country')->get();
        $programs = DB::table('programs')->get();
        $events = DB::table('events')->get();

        return view('users.create', ['countries' =>$countries,'programs' =>$programs,'events' =>$events]);
    }


    public function storeUser(Request $request)
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

        $User= new User();
        $User->name = $request->input('name');
        $User->email = $request->input('email');
        $User->password = bcrypt($request->input('password'));
        $User->country_id = $request->input('country_id');
        $User->address = $request->input('address');
        $User->phone_no = $request->input('phone_no');
        $User->city = $request->input('city');
        $User->street = $request->input('street');
        $User->image = $imageName;
        $User->save();
        // Admin::create($request->post());

        return redirect()->route('users.userProfile')->with('success','User has been created successfully.');
    }


    // public function show(User $User)
    // {
    //     return view('users.show',compact('User'));
    // }


    public function editUser( $id )
    {
        $user = User::find($id);

        $countries = DB::table('ref_country')->get();
        return view('users.edit',['countries' =>$countries,'user'=>$user]);
    }

    public function updateUser(Request $request, $id)
    {

        $validator=$request->validate([
            'name' => 'required|string|max:30',
            'password' => 'required|string|min:6',
            'country_id' => 'required',
            'address' => 'required'
        ]
        , [
            'country_id.required' => 'Select Country Name.',
            'name.required' => 'Please Enter Full Name.',
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
        // $Admin= new Admin();
        $User = User::find($id);
        $User->name = $request->input('name');
        // $User->email = $request->input('email');
        $User->password = bcrypt($request->input('password'));
        $User->country_id = $request->input('country_id');
        $User->address = $request->input('address');
        $User->phone_no = $request->input('phone_no');
        $User->city = $request->input('city');
        $User->street = $request->input('street');
        $User->image = $imageName;
        $User->save();

        return redirect()->route('users.userProfile')->with('success','User Has Been updated successfully');


    }
    public function login()
    {
        return view('users.login');
    }
    public function SaveLogin(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (['email' => $request->email, 'password' => $request->password]) {
            return redirect()->intended(route('users.userProfile'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function allUserProfile()
    {
        // dd('hi');

        $users= DB::table('users as u')->select(
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
        // dd($users);
        return view('users.allUserProfile', compact('users'));
    }
    public function allUserEdit( $id )
    {
        $user = User::find($id);

        $countries = DB::table('ref_country')->get();
        return view('users.allUserEdit',['countries' =>$countries,'user'=>$user]);
    }


    public function allUserDelete($id)
    {
        DB::table('users')->where('id', $id)->update(['data_status' => '0']);
        return redirect()->route('users.allUserProfile')->with('success','Users has been deleted successfully');
    }
    public function allUserActive($id)
    {
        DB::table('users')->where('id', $id)->update(['active_status' => '0']);
        return redirect()->route('users.allUserProfile')->with('success','Users has been Inactive successfully');
    }

}
