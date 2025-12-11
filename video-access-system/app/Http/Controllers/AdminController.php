<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $customers = \App\Models\User::where('role', 'customer')->get();
        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'role' => 'customer',
        ]);

        return redirect()->route('admin.customers.index')->with('success', 'Customer created successfully.');
    }

    public function edit(\App\Models\User $user)
    {
        return view('admin.customers.edit', compact('user'));
    }

    public function update(Request $request, \App\Models\User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);
            $user->update([
                'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            ]);
        }

        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(\App\Models\User $user)
    {
        $user->delete();
        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully.');
    }
}
