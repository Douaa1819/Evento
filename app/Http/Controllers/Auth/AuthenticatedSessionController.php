<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user(); 
        if ($user->role == 'client') {
            if($user->client->is_banned='1'){
                abort('403','unauthorized');
            }else{
            return redirect('/index');
        }
        } elseif ($user->role == 'organisateur') {
            if($user->organisateur->is_banned='1'){
                abort('403','unauthorized');
            }else{
            return redirect('/Home');
        }
        } elseif ($user->role == 'admine') {
            return redirect('/Admine');
            ;}

        return redirect('/');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
