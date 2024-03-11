<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $utilisateur = User::where('role', 'client')
    ->orWhere('role', 'organisateur')->get();
      return view('admine.utilisateur',compact('utilisateur'));
    }

    


    public function block(User $user){
        if($user->client){
    $user->client->is_banned='1';
    $user->client->save();}
    elseif($user->organisateur){
        $user->organisateur->is_banned='1';
        $user->organisateur->save();
    }
    return back()->with('success', 'Utilisateur est  bloqué avec succès.');
    }


    public function unblock(User $user){
        if($user->client){
        $user->client->is_banned='0';
        $user->client->save();}
        elseif($user->organisateur){
            $user->organisateur->is_banned='0';
            $user->organisateur->save();
        }
        return back()->with('success', 'Utilisateur débloqué avec succès.');

    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
