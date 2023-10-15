<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;


class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = Role::paginate(10);
        return view('admin.role.index', ['roles' => $roles]);
    }

    public function create()
    {
        $permissions = Permission::get();
        return view('admin.role.create', ['permissions' => $permissions]);
    }

    public function store(Request $request)
    {
        $validatedData  = $request->validate([
            'name' => ['required','max:255'],
            'permissions' => ['required','min:2']
        ]);

        $role = Role::create($validatedData);

        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('roles.index')->with('success', '¡Rol creado con éxito!');
    }

    public function show(Role $role)
    {
        return view('admin.role.show', ['role' => $role]);
    }

    public function edit(Role $role)
    {
        $permissions = Permission::get();

        return view('admin.role.edit', ['role' => $role, 'permissions' => $permissions]);
    }

    public function update(Request $request, Role $role)
    {
        $validatedData  = $request->validate([
            'name' => ['required','max:255'],
            'permissions' => ['required','min:3']
        ]);

        $role->update($validatedData);

        $role->permissions()->sync($request->get('permissions'));
        
        return redirect()->route('roles.index')->with('success', '¡Rol actualizado con éxito!');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->back()->with('success', '¡Rol eliminado con éxito!');
    }
}
