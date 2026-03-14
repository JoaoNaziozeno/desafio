<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('profile.index', ['users' => $model->paginate(15)]);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        return view('profile.edit', compact('user'));
    }

    public function store(UserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->withStatus(__('User successfully created.'));
    }
}
