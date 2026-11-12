<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('users.index', ['users' => User::latest()->get()]);
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'username' => ['required', 'string', 'max:50', 'unique:users,username'],
            'full_name' => ['required', 'string', 'max:255'],
        ]);

        $user = new User();
        $user->forceFill($data)->save();

        return to_route('users.index')->with('success', 'User account added.');
    }

    public function show(User $user): View
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'username' => ['required', 'string', 'max:50', 'unique:users,username,' . $user->id],
            'full_name' => ['required', 'string', 'max:255'],
        ]);

        $user->forceFill($data)->save();

        return to_route('users.index')->with('success', 'User account updated.');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return to_route('users.index')->with('success', 'User account deleted.');
    }
}
