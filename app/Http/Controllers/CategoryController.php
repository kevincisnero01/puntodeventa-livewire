<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Throwable;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::latest()->paginate(5);

        return view('admin.category.index', ['categories' => $categories]);
    }


    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $validatedData  = $request->validate([
            'name' => ['required','unique:categories','max:50'],
            'slug' => ['required','unique:categories','max:50'],
            'icon' => ['nullable'],
            'description' => ['nullable'],
        ]);
        
        $category = Category::create($validatedData);

        return redirect()->route('categories.index')->with('success', '¡Categoría creada con éxito!');

    }


    public function show(Category $category)
    {
        return view('admin.category.show', ['category' => $category]);
    }


    public function edit(Category $category)
    {
        return view('admin.category.edit', ['category' => $category]);
    }


    public function update(Request $request, Category $category)
    {
        $validatedData  = $request->validate([
            'name' => ['required','max:50', Rule::unique('categories')->ignore($category->id)],
            'slug' => ['required','max:50', Rule::unique('categories')->ignore($category->id)],
            'icon' => ['nullable'],
            'description' => ['nullable'],
        ]);

        $category->update($validatedData);

        return redirect()->route('categories.index')->with('success', '¡Categoría actualizada con éxito!');
    }


    public function destroy(Category $category)
    {
        try {
            $category->delete();
        } catch (Throwable $e) {
            return redirect()->back()->with('error', '¡La categoría tiene productos asociados!');
        }

        return redirect()->route('categories.index')->with('success', '¡Categoría eliminada con éxito!');
    }
}
