<?php

namespace App\Http\Controllers;
use App\Models\Category; 
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;

    class CategoryController extends Controller
    {
  
    public function index()
    {
    $categorie = Category::all();

      return view('admine.categorie',compact('categorie'));
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
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category;
        $category->nom = $request->nom;
        $category->save();
        return redirect()->back()->with('success', 'Catégorie ajoutée avec succès.');
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
    public function edit()
    {

    }
    

    //DRY (Don't Repeat Yourself)
    public function update(StoreCategoryRequest $request, Category $categorie)
    {
        $categorie->nom = $request->nom;
        $categorie->save();
        return redirect()->back()->with('success', 'Catégorie mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id) {
        $category = Category::findOrFail($id);
        $category->delete(); 
    
        return redirect()->back()->with('success', 'Catégorie supprimée avec succès.');
    }
    
}
