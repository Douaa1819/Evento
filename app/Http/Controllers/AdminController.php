<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Evenement;

    class AdminController extends Controller
    {
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $nombreUtilisateurs = User::count();
        $nombreCatégorie=Category::count();
        $nombreEvenments = Evenement::count();
        return view('admine.home', compact('nombreUtilisateurs', 'nombreEvenments','nombreCatégorie'));
    }


    public function improve(Evenement $evenements){
        $evenements=Evenement::all();
        return view('admine.validerEvenment',compact('evenements'));
    }


   
        public function valider(Evenement $evenement)
    {
        if($evenement->admin_validation =='0')
        $evenement->admin_validation = '1';
        $evenement->save();
        return redirect()->back()->with('success', 'L\'événement a été validé avec succès');
    }

    public function invalider(Evenement $evenement){
        if($evenement->admin_validation =='1')
        $evenement->admin_validation = '0';
        $evenement->save();
        return redirect()->back()->with('success', 'L\'événement a été invalidé avec succès');
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
    public function show(Evenement $evenement)
    {
        return view('admine.detail',compact('evenement'));
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
