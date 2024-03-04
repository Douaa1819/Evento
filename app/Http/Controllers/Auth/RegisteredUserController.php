<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Organizateur; // Assuming this is the correct namespace
use App\Models\Client ; // Assuming this is the correct namespace
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'], // Note: 'users,email' assumes the users table and email column for uniqueness.
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role'=>['required' , 'in:organisateur,client'],
        ]);

        // Lowercase email before creating the user
        $request->merge(['email' => strtolower($request->email)]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=> $request->role,
        ]);
        
        if ($request->role === 'organisateur') { 
            Organizateur::create([
                'user_id' => $user->id,
            ]);
        }

        if ($request->role === 'client') {
            Client ::create([ 
                'user_id' => $user->id,
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        if ($request->role === 'client') { 
            return redirect('/index');
        } elseif ($request->role === 'organisateur') { 
            
            return redirect('/Home');
        } else {
            return redirect('/register');
        }
    }
}
