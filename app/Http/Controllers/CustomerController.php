<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Customer";
        // $customers = Customer::all();
        $customers = Customer::all();
        return view('pages.customer.index', ['title' => $title, 'customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Customer";
        return view('pages.customer.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);
        $data["active"] = 1;
        if ($request->file('image') != null) {
            $data['image'] = $request->file('image')->store('images/customer', 'public');
        }
        Customer::create($data);
        return redirect(route('customer.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $title = "Edit Customer";
        return view('pages.customer.edit', ['title' => $title, 'customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $customer = Customer::findOrFail($customer->id);
        // dd($request->file('image'), $customer);
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'active' => 'required',
        ]);
        if ($request->file('image')) {
            Storage::delete($customer->image);
            $data['image'] = $request->file('image')->store('images/customer', 'public');
        } else {
            $data['image'] = $customer->image;
        }

        $customer->update($data);
        return redirect(route('customer.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer = Customer::findOrFail($customer->id);
        Customer::destroy($customer->id);
        return redirect(route('customer.index'));
    }
}
