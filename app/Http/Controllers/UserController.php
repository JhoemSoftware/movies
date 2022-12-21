<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        /* return [
            "Hola Usuario"
        ]; */
        return User::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => ['required'],
            'alias'    => ['required'],
            'email'    => ['required'],
            'password' => ['required'],
            /* 'roleUserForm'     => ['required'] */
        ]);

        $user = new User;
        $user->name     = $request->input('name');
        $user->alias    = $request->input('alias');
        $user->email    = $request->input('email');
        $user->password = $request->input('password');
        /* $user->roleUser     = $request->input('roleUserForm'); */
        $user->save();

        return $user;
    }

    public function show(User $user)
    {
        return $user;
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => ['required'],
            'alias'    => ['required'],
            'email'    => ['required'],
            'password' => ['required'],
        ]);

        $user->name     = $request->input('name');
        $user->alias    = $request->input('alias');
        $user->email    = $request->input('email');
        $user->password = $request->input('password');
        /* $user->roleUser     = $request->input('roleUserForm'); */
        $user->save();

        return $user;
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->noContent();
    }
}
