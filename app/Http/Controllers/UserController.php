<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return [
            "Hola Usuario"
        ];
        /* return User::all(); */
    }

    public function store(Request $request)
    {
        $request->validate([
            'nameUserForm'     => ['required'],
            'aliasUserForm'    => ['required'],
            'emailUserForm'    => ['required'],
            'passwordUserForm' => ['required'],
            'roleUserForm'     => ['required']
        ]);

        $user = new User;
        $user->name     = $request->input('nameUserForm');
        $user->alias    = $request->input('aliasUserForm');
        $user->email    = $request->input('emailUserForm');
        $user->password = $request->input('passwordUserForm');
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
            'nameUserForm'     => ['required'],
            'aliasUserForm'    => ['required'],
            'emailUserForm'    => ['required'],
            'passwordUserForm' => ['required'],
            'roleUserForm'     => ['required']
        ]);

        $user->name     = $request->input('nameUserForm');
        $user->alias    = $request->input('aliasUserForm');
        $user->email    = $request->input('emailUserForm');
        $user->password = $request->input('passwordUserForm');
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
