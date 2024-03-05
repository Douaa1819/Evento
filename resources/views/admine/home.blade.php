<x-doashboardAdmin></x-doashboardAdmin>
            <div class="h-screen px-4 pb-24 overflow-auto md:px-6">
                <h1 class="text-4xl font-semibold text-gray-800 dark:text-white">
                    Good afternoom, Charlie
                </h1>
               
            
                    <div class="w-full md:w-6/12">
                        <div class="relative w-full overflow-hidden bg-white shadow-lg dark:bg-gray-700">
                           
                          
                            
                        </div>
                    </div>
                    <div class="flex items-center mt-8 w-full space-x-14 md:w-1/2flex justify-start">
                        <!-- Première colonne pour les evenment -->
                        <div class="w-1/2">
                            <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700">
                                <p class="text-2xl font-bold text-black dark:text-white">
                                    {{ $nombreEvenments }}
                                </p>
                                <p class="text-sm text-gray-400">
                                    nombre des évenments
                                </p>
                                <span class="absolute p-4 bg-red-500 rounded-full top-2 right-4">
                            </div>
                        </div>
                        <!-- Deuxième colonne pour les utilisateurs -->
                        <div class="w-1/2">
                            <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700">
                                <p class="text-2xl font-bold text-black dark:text-white">
                                   {{ $nombreUtilisateurs }}
                                 
                                </p>
                                <p class="text-sm text-gray-400">
                                   nombre d'utilisateurs
                                </p>
                                <span class="absolute p-4 bg-red-500 rounded-full top-2 right-4">
                                  
                                    
                                    <svg width="40" fill="currentColor" height="40" class="absolute h-4 text-white transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                        <path d="Votre chemin SVG ici"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>

                          <!-- Troisiemme  colonne pour categorie -->
                          <div class="w-1/2">
                            <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700">
                                <p class="text-2xl font-bold text-black dark:text-white">
                                   {{ $nombreCatégorie }}
                                 
                                </p>
                                <p class="text-sm text-gray-400">
                                   nombre de Catégories
                                </p>
                                <span class="absolute p-4 bg-red-500 rounded-full top-2 right-4">
                                  
                                    
                                    <svg width="40" fill="currentColor" height="40" class="absolute h-4 text-white transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                        <path d="Votre chemin SVG ici"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div></div>
              
       
</main>
