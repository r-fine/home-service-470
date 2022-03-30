<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('s_provider') && Auth::user()->is_verified == 1) {
            return view('s_provider.s_provider_homepage');
        } elseif (Auth::user()->hasRole('s_provider') && Auth::user()->is_verified == 0) {
            return view('address.create_address');
        } elseif (Auth::user()->hasRole('customer')) {
            return view('dashboard');
        }
    }

    public function admin()
    {
        $order_count = OrderItem::count();
        $order_completed = OrderItem::where('status', 'Completed')->count();
        $order_pending = OrderItem::where('status', 'Pending')->count();
        $service_count = Service::count();
        $provider_count = User::whereRoleIs('s_provider')->count();
        $unverified_providers = User::whereRoleIs('s_provider')->where('is_verified', 0)->count();

        return view('admin.admin_homepage', compact('order_count', 'order_completed', 'order_pending', 'service_count', 'provider_count', 'unverified_providers'));
    }
}
