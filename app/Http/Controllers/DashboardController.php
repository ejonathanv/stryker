<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return redirect()->route('trips.index');
        $user = auth()->user();
        if($user->role == 'admin'){
            return redirect()->route('admin-dashboard');
        }elseif($user->role == 'user'){
            return redirect()->route('driver-dashboard');
        }
    }
    public function admin(){
        $user = auth()->user();
        return view('app.dashboard.admin', compact('user'));
    }
    public function driver(){
        $user = auth()->user();
        return view('app.dashboard.user', compact('user'));
    }
}
