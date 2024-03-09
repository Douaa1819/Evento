<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Evenement;
use App\Models\Organizateur;
use App\Models\Reservation;
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

    public function doashbord(){

        return view('organisateur.doashbord');
    }

    public function add(){
        $organisateurId = auth()->id();
        $categorie=Category::all();
        return view('organisateur.ajouterEvenment',compact('categorie' ,'organisateurId'));
    }

    /**
     * Show the form for creating a new resource.
     */


     public function Reservation(Evenement $evenment)
     {
        $reservations = $evenment->reservation()->where('status', 1)->get();
//le chargement eager sur une instance de modèle
        $reservations->load('client');
        return view('organisateur.reservation',compact('evenment' ,'reservations'));
     }

     public function accept(Reservation $reservation)
{
    $reservation->update(['status' => 0]);
    return back()->with('success', 'La réservation a été acceptée avec succès.');
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
