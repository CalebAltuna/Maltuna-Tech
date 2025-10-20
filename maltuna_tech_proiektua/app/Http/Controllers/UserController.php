<?php

namespace app\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use app\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller{
   public function index(){
        $users = User::all();
        return Inertia::render('Users/Index', compact('users'));
    }

    public function destroy(User $user){
        $user -> delete();
        return redirect()->route('users.index') -> with('message','User deleted succesfuly');
    }
    public function create(): Response
    {
        return Inertia::render('Users/register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
   public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));



        return redirect()->route('users.index')->with('message', 'User created successfully');
    }
}


