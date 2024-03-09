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
        $categories=Category::all();
      // construire la requête pour retourne une instance
      $query = Evenement::where('admin_validation', 1);
        if ($search = request('search')) {
            $query->where('titre', 'like', '%' . $search . '%');
     
        }
        $evenements = $query->get();
        if ($evenements->isEmpty()) {
            return back()->with('alert', 'Aucun événement trouvé pour ce titre.');
        }
    
        return view("client.index", compact('evenements','categories'));
    }


    public function filtreParCatégorie(Category $category)
    {
        $categories=Category::all();
        $evenements = $category->evenements()->where('admin_validation', 1)->get();
        return view("client.index", compact('evenements','categories','category'));
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
            $validatedData = $request->validated();
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/images');
                $imageName = basename($imagePath);
                $validatedData['image'] = $imageName;
            }
    //Create the event with the validated data (including the image)
        Evenement::create($validatedData);
        return redirect()->back()->with('success', 'L\'événement a été ajouté avec succès.');
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
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            // Store the new image and get its path
            $imagePath = $request->file('image')->store('public/images');
            // Extract the filename
            $imageName = basename($imagePath);
            // Add or update the image name in the validated data
            $validatedData['image'] = $imageName;
        }
    
        // Update the event with the new data (including possibly a new image)
        $evenment->update($validatedData);
           
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
