<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        return Customer::select(['id', 'name', 'nip'])->get();
    }

    public function show(Customer $customer)
    {
        return $customer;
    }

    public function store(Request $request)
    {
        $customer = new Customer();

        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->nip = $request->nip;
        $customer->user_id = auth()->id();

        $customer->save();

        return $customer;
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);

        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->nip = $request->nip;
        $customer->user_id = auth()->id();

        $customer->save();

        return $customer;
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->noContent();
    }
}
