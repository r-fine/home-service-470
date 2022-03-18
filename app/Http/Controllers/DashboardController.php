<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        if (Auth::user()->hasRole('admin')) {
            return view('admin.admin_homepage');
        } elseif (Auth::user()->hasRole('s_provider') && Auth::user()->is_verified == 1) {
            return view('s_provider.s_provider_homepage');
        } elseif (Auth::user()->hasRole('s_provider') && Auth::user()->is_verified == 0) {
            return view('address.create-address');
        } elseif (Auth::user()->hasRole('customer')) {
            return view('dashboard');
        }
    }
}
