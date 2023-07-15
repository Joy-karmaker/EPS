<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admins/admin_dashboard');
    }
}
