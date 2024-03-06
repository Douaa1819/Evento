<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Evenement;
use App\Models\Organizateur;
use Illuminate\Http\Request;

class OrganizateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evenement =Evenement::all();
        $organisateurId = auth()->id();
        $categorie=Category::all();
       return view('organisateur.home',compact('categorie' ,'evenement','organisateurId'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
    public function show(Organizateur $organizateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organizateur $organizateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organizateur $organizateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organizateur $organizateur)
    {
        //
    }
}
