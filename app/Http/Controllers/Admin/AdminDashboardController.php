<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $admin = Auth::guard('admin')->user();
        
        return view('admin.dashboard', compact('admin'));
    }
}