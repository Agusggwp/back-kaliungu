<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Admin Dashboard
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Check if user is admin
     */
    public function isAdmin()
    {
        return Auth::user()->isAdmin();
    }
}
