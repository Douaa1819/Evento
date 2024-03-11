<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Carbon\Carbon;

        
    class ClientController extends Controller
        {
     
        public function index()
        {
            $categories= Category::all();
            $evenements = Evenement::where('admin_validation', 1)->paginate(3);
            foreach ($evenements as $evenement) {
                $evenement->is_in_future = Carbon::parse($evenement->date)->isFuture();
            }
            return view ('client.index' , compact('evenements','categories'));
            
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
        public function show(Evenement $evenement)
        {
            return view ('client.evenement' , compact('evenement'));
        }



        /**
         * Show the form for editing the specified resource.
         */
        public function edit(Client $client)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, Client $client)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Client $client)
        {
            //
        }
    }
