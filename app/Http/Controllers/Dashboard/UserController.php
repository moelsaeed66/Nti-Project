<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('dashboard.user.index',compact('users'));
    }
    public function create()
    {
        $users = User::all();
        $roleOptions = User::getRoleOptions();
        return view('dashboard.user.create',compact('users','roleOptions'));
    }
    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3',
            'email' => ['required','email',Rule::unique('users','email')],
            'password' => 'required',
            'role' => 'required|in:supervisor,admin,editor'
        ]);
        $attributes['password'] = Hash::make($attributes['password']);

        User::create($attributes);
        return redirect()->route('dashboard.users.index');
    }
    public function edit(User $user)
    {

        $roleOptions = User::getRoleOptions();
        return view('dashboard.user.edit',compact('user','roleOptions'));
    }
    public function update(Request $request ,User $user)
    {
        $attributes = request()->validate([
            'name' => 'required|min:3',
            'email' => ['required','email',Rule::unique('users','email')],
            'password' => 'required',
            'role' => 'required'
        ]);
        $attributes['password'] = Hash::make($attributes['password']);

        $user->update($attributes);
        return redirect()->route('dashboard.users.index')->with('message','User Updated');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard.users.index')->with('message','User Deleted');

    }
}
