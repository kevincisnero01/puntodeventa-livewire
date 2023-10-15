<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
// use Caffeinated\Shinobi\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Client\ChangePasswordRequest;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        
        $users = User::with('roles')->paginate(10);

        return view('admin.user.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::get();

        return view('admin.user.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $validatedData  = $request->validate([
            'name' => ['required','max:255'],
            'email' => ['required','email','unique:users','max:255'],
            'password' => ['required','max:255','confirmed'],
            'role' => ['required']
        ]);
        
        $user = User::create($validatedData);

        $user->update(['password'=> Hash::make($request->password)]);

        $user->roles()->sync($request->get('role'));

        return redirect()->route('users.index')->with('success', '¡Usuario creado con éxito!');
    }

    public function show(User $user)
    {
        return view('admin.user.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        $roles = Role::get();

        return view('admin.user.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, User $user)
    {
        $validatedData  = $request->validate([
            'name' => ['required','max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id)
                
            ],
        ]);

        $user->update($validatedData);

        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.index')->with('success', '¡Usuario actualizado con éxito!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('success', '¡Usuario eliminado con éxito!');
    }
    
}

