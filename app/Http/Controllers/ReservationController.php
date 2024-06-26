<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Evenement $evenement)
    {
            if ($evenement->place_disponible <= 0) {
                return back()->with('alert', 'Plus de places disponibles pour cet événement.');
            }
            if ($evenement->validation == 0) {
                $reservation = new Reservation([
                    'client_id' => auth()->user()->client->id,
                    'evenement_id' => $evenement->id,
                    'status' => 0,
                ]);
                $reservation->save();
                $evenement->place_disponible -= 1;
                $evenement->save();
                return back()->with('success', 'Votre réservation a été effectuée avec succès. Cliquez sur le bouton ci-dessous pour générer votre ticket');
            } elseif ($evenement->validation == 1) {
                $reservation = new Reservation([
                    'client_id' => auth()->user()->client->id,
                    'evenement_id' => $evenement->id,
                    'status' => 1, 
                ]);
                $reservation->save();
                $evenement->place_disponible -= 1;
                $evenement->save();
                return back()->with('error', 'Votre réservation est en attente de validation par l\'organisateur.');
            }
        }


    public function ticket(Evenement $evenement){

       return view ('client.ticket' , compact('evenement'));

        }

    public function accept(Request $request, Reservation $reservation)
        {
            $reservation->status = 0;
            $reservation->save();
            return back()->with('success', 'La réservation a été acceptée.');
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
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
