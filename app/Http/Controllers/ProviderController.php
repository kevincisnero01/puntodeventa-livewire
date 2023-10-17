<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::latest()->paginate(10);
        return view('admin.provider.index', ['providers' => $providers]);
    }

    public function create()
    {
        return view('admin.provider.create');
    }

    public function store(Request $request)
    {
        $validatedData  = $request->validate([
            'name' => ['required','max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:providers'
            ],
            'rif' => [
                'required',
                'min:10',
                'max:12',
                'regex:/^J([0-9,-]){9,11}/i',
                'unique:providers'
            ],
            'address' => ['nullable','string','min:3','max:255'],
            'phone' => [
                'nullable',
                'min:10',
                'max:15',
                'unique:providers'
            ]
        ]);

        Provider::create($validatedData);

        return redirect()->route('providers.index')->with('success', '¡Proveedor registrado con éxito!');
    }

    public function show(Provider $provider)
    {
        return view('admin.provider.show', ['provider' => $provider]);
    }

    public function edit(Provider $provider)
    {
        return view('admin.provider.edit', ['provider' => $provider]);
    }

    public function update(Request $request, Provider $provider)
    {
        $validatedData  = $request->validate([
            'name' => ['required','max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('providers')->ignore($provider->id)
            ],
            'rif' => [
                'required',
                'min:10',
                'max:12',
                'regex:/^J([0-9,-]){9,11}/i',
                Rule::unique('providers')->ignore($provider->id)
            ],
            'address' => ['nullable','string','min:3','max:255'],
            'phone' => [
                'nullable',
                'min:10',
                'max:15',
                Rule::unique('providers')->ignore($provider->id)
            ]
        ]);

        $provider->update($request->all());

        return redirect()->route('providers.index')->with('success', '¡Proveedor actualizado con éxito!');
    }
    
    public function destroy(Provider $provider)
    {
        $provider->delete();

        return redirect()->back()->with('success', '¡Proveedor eliminado con éxito!');
    }
}
