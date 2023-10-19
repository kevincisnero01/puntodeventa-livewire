<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Enums\ProductStatusEnum;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with(['category','provider'])->latest()->paginate(10);

        return view('admin.product.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::pluck('name','id');

        $providers = Provider::pluck('name','id');

        $statuses = Arr::pluck(ProductStatusEnum::cases(), 'value','value');

        return view('admin.product.create', [
            'categories' => $categories, 
            'providers' => $providers, 
            'statuses' => $statuses
        ]);
    }

    public function store(Request $request)
    {
        $validatedData  = $request->validate([
            'name' => ['required','max:255','unique:products'],
            'stock' => ['nullable'],
            'sell_price'=> ['nullable','decimal:0,2'],
            'short_description' => ['nullable'],
            'long_description' => ['nullable'],
            'status' => ['required', new Enum(ProductStatusEnum::class)],
            'category_id' => ['required'],
            'provider_id'=> ['required'],
        ]);

        $code = Product::all()->count() + 1;
        $slug = Str::slug($request->name, '-');

        $product = Product::create($validatedData + ['code' => $code,'slug' => $slug ]);

        return redirect()->route('products.index')->with('success', '¡Producto registrado con éxito!');
    }

    public function show(Product $product)
    {
        $categories = Category::pluck('name','id');

        $providers = Provider::pluck('name','id');

        $statuses = Arr::pluck(ProductStatusEnum::cases(), 'value','value');

        return view('admin.product.show', [
            'product' => $product, 
            'categories' => $categories, 
            'providers' => $providers, 
            'statuses' => $statuses
        ]);
    }

    public function edit(Product $product)
    {
        $categories = Category::pluck('name','id');

        $providers = Provider::pluck('name','id');

        $statuses = Arr::pluck(ProductStatusEnum::cases(), 'value','value');

        return view('admin.product.edit', [
            'product' => $product, 
            'categories' => $categories, 
            'providers' => $providers,
            'statuses' => $statuses
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $validatedData  = $request->validate([
            'name' => ['required','max:255', Rule::unique('products')->ignore($product->id)],
            'stock' => ['nullable'],
            'sell_price'=> ['nullable','decimal:0,2'],
            'short_description' => ['nullable'],
            'long_description' => ['nullable'],
            'status' => ['required', new Enum(ProductStatusEnum::class)],
            'category_id' => ['required'],
            'provider_id'=> ['required'],
        ]);

        $slug = Str::slug($request->name, '-');

        $product->update($validatedData + ['slug' => $slug ]);

        return redirect()->route('products.index')->with('success', '¡Producto actualizado con éxito!');
    }
    
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('success', '¡Producto eliminado con éxito!');
    }

}
