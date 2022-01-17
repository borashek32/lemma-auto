<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateAddressForm;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        $user    = Auth::user();
        $address = Address::where('user_id', $user->id)->first();

        return view('profile.addresses.index', compact('address'));
    }

    public function create()
    {
        return view('profile.addresses.create');
    }

    public function store(ValidateAddressForm $request)
    {
        $address = new Address();
        $address->shipping_fullname      =   $request->shipping_fullname;
        $address->shipping_city          =   $request->shipping_city;
        $address->shipping_postcode      =   $request->shipping_postcode;
        $address->shipping_address       =   $request->shipping_address;
        $address->shipping_phone         =   $request->shipping_phone;
        $address->user_id                =   auth()->id();

        $address->save();

        return redirect('/addresses')
            ->with('success', 'Новый адрес был успешно добавлен');
    }

    public function update(ValidateAddressForm $request, Address $address)
    {
        $address->shipping_fullname = $request->shipping_fullname;
        $address->shipping_city     = $request->shipping_city;
        $address->shipping_postcode = $request->shipping_postcode;
        $address->shipping_address  = $request->shipping_address;
        $address->shipping_phone    = $request->shipping_phone;
        $address->user_id           = $request->user_id;

        $address->save();

        return redirect('/addresses')
            ->with('success', 'Новый адрес был успешно обновлен');
    }

    public function show($id)
    {
        //
    }

    public function edit(Address $address)
    {
        return view('profile.addresses.edit', compact('address'));
    }

    public function destroy(Address $address)
    {
        $address->delete();

        return redirect('/addresses')
            ->with('success', 'Адрес был успешно удален');
    }
}
