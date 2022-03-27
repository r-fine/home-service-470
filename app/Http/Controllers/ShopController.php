<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $services = Service::latest()->simplePaginate(8);
        return view('shop.index', compact('services'));
    }
}
