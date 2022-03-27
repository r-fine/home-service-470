<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $services = Service::latest()->simplePaginate(8);
        return view('shop.index', compact('services'));
    }

    public function showService(Service $service)
    {
        $title = $service->title;
        return view('shop.show_service', compact('title', 'service'));
    }

    // Show list of services under a specific category
    public function categoryList(Category $category)
    {
        $title = $category->title;
        $services = Service::where('category_id', $category->id)->simplePaginate(4);
        return view('shop.category_list', compact('title', 'category', 'services'));
    }
}
