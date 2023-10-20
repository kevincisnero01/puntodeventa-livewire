<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::latest()->paginate(10);

        return view('admin.customer.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData  = $request->validate([
            'type' => ['required'],
            'ci' => ['nullable', 'max:10', 'unique:customers', 'required_if:type,Natural'],
            'rif' => ['nullable', 'max:13','unique:customers', 'required_if:type,Juridico' ],
            'name' => ['required','max:255','unique:customers'],
            'address'=> ['nullable'],
            'phone' => ['required','max:20'],
            'email' => ['required','email'],
        ]);

        $product = Customer::create($validatedData);

        return redirect()->route('customers.index')->with('success', 'Cliente registrado con éxito!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('admin.customer.show', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('admin.customer.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {

        $validatedData  = $request->validate([
            'name' => ['required','max:255', Rule::unique('customers')->ignore($customer->id)],
            'address'=> ['nullable'],
            'phone' => ['required','max:20'],
            'email' => ['required','email'],
        ]);

        $customer->update($validatedData);

        return redirect()->route('customers.index')->with('success', '¡Cliente actualizado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->back()->with('success', '¡Cliente eliminado con éxito!');
    }
}
