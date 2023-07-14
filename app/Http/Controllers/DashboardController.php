<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
class DashboardController extends Controller
{
    public function dashboard()
    {
        // $admins = Admin::orderBy('id','desc')->paginate(5);
        // echo "<pre>";print_r($admins);exit;
        // return view('admins.admin_dashboard');
        return view('admins/admin_dashboard');
    }
}
