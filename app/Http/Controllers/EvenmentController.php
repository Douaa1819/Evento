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

     public function search()
    {

        $query = Evenement::all(); 
        if ($search = request('search')) {
            $query->where('name', 'like', '%'. $search . '%');
        }
        $evenements = $query->get();
        return view("welcome", compact('evenment'));
    }
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
        Evenement::create($request->validated());    
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
    public function edit(Evenement $evenment)
    {
   
        $categorie=Category::all();

        return view('organisateur.modifierEvenment',compact('categorie','evenment'));
    }
    public function modifier(Evenement $evenmentId)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EvenmentRequest $request,Evenement $evenment)
    {   
       
         $evenment->update($request->validated());
           
         return redirect()->back()->with('success', 'L\'événement a été mis à jour avec succès.');
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
