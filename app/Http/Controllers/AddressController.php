<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{

    public function create()
    {
        return view('address.create_address');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required|digits:11|unique:addresses,phone',
            'town_city' => 'required',
            'postal_code' => 'required|digits:4',
            'address_line' => 'required',
            'address_line_2' => 'nullable',
        ]);

        if (!Auth::user()->address) {
            $request->user()->address()->create($request->all());
            return back()->with('success', 'Address added successfully');
        } else {
            return back()->with('success', 'An address is already associated with this account');
        }
    }

    public function edit($id)
    {
        $address = Address::find($id);
        return view('address.edit_address', compact('address'));
    }

    public function update(Request $request, $id)
    {
        $address = Address::find($id);
        $request->validate([
            'full_name' => 'required',
            'phone' => [
                'required',
                'digits:11',
                Rule::unique('addresses')->ignore($id),
            ],
            'town_city' => 'required',
            'postal_code' => 'required|digits:4',
            'address_line' => 'required',
            'address_line_2' => 'nullable',
        ]);
        $address->update($request->all());
        return back()->with('success', 'Address updated successfully');
    }
}
