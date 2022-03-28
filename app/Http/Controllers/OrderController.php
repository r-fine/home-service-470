<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create()
    {
        $times = ['9:00 a.m.', '10:00 a.m.', '11:00 a.m.', '12:00 p.m.', '01:00 p.m.', '02:00 p.m', '03:00 p.m', '04:00 p.m', '05:00 p.m', '06:00 p.m', '07:00 p.m', '08:00 p.m'];
        $town_cities = ['Abdullahpur', 'Agargaon', 'Badda', 'Banani', 'Banasree', 'Baridhara', 'Bashundhara', 'Bawnia', 'Cantonment area', 'Dakshinkhan', 'Dania', 'Demra', 'Dhanmondi', 'Farmgate', 'Gabtali', 'Gulshan', 'Hazaribagh', 'Islampur', 'Jurain', 'Kafrul', 'Kamalapur', 'Kamrangirchar', 'Kazipara', 'Khilgaon', 'Kotwali', 'Lalbagh', 'Matuail', 'Mirpur', 'Mohakhali', 'Mohammadpur', 'Motijheel', 'Nimtoli', 'Pallabi', 'Paltan', 'Ramna', 'Sabujbagh', 'Sabujbagh', 'Sadarghat', 'Satarkul', 'Shahbagh', 'Sher-e-Bangla Nagar', 'Shyampur', 'Sutrapur', 'Tejgaon', 'Uttara', 'Uttarkhan', 'Vatara', 'Wari'];
        return view('order.create', compact('times', 'town_cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|digits:11',
            'email' => 'required|email',
            'address_line' => 'required',
            'address_line_2' => 'nullable',
            'town_city' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'order_note' => 'nullable'
        ]);

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address_line = $request->address_line;
        $order->address_line_2 = $request->address_line_2;
        $order->town_city = $request->town_city;
        $order->date = $request->date;
        $order->time = $request->time;
        $order->order_note = 'sdsd';
        $order->order_number = substr($request->phone, 7) . time();
        $order->save();

        return back()->with('success', 'Your order has been placed successfully');
    }
}