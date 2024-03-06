<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Requests\EvenmentRequest;
use App\Models\Category;
use App\Models\Evenement;

class EvenmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $organisateurId = auth()->id();
     $categorie=Category::all();
      return view('organisateur.ajouterEvenment',compact('categorie' ,'organisateurId'));
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
    public function store(EvenmentRequest $request)
    {
        try {

        $organisateurId = auth()->id();
        $evenment = new Evenement();
        $evenment->organizateur_id = $organisateurId  ;
        $evenment->titre=$request->titre;
        $evenment->description=$request->description;
        $evenment->category_id=$request->category_id;
        $evenment->lieu=$request->lieu;
        $evenment->place_disponible=$request->place_disponible;
        $evenment->date = $request->date;
        if ($request->hasFile('image')) {
            // Stockez l'image dans le dossier 'public/images' et récupérez le chemin
            $imagePath = $request->image->store('images', 'public');
            // Stockez le chemin de l'image dans la base de données
            $evenment->image = $imagePath;
        }
        $evenment->validation=$request->validation;
        $evenment->save();
        return redirect()->back()->with('success', 'Le évenment ajoutée avec succès.');
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return redirect()->back()->withErrors('Une erreur est survenue lors de l’ajout de l’événement.');
    }

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
    public function update(EvenmentRequest $request, Evenement $evenment)
    {
        $evenment = new Evenement();
        $evenment->titre=$request->titre;
        $evenment->description=$request->description;
        $evenment->category_id=$request->category_id;
        $evenment->lieu=$request->lieu;
        $evenment->organisateur_id = $request->organisateur_id;
        $evenment->place_disponible=$request->place_disponible;
        $evenment->date=$request->date;
        $evenment->image=$request->image;
        $evenment->validation=$request->validation;
        $evenment->save();
        return redirect()->back()->with('success', 'Le évenment mis a jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $evenment=Evenement::findOrFail($id);
       $evenment->delete();
       return redirect()->back()->with('success' ,'Le évenment supprimer avec succès');
    }
}
