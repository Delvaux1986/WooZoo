<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Specie;
use App\Models\Enclosure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Redirect;

class PetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = Pet::with('specie')->get();
        $user = Auth::user();

        return Inertia::render('Animals/Index',[
            'animals' => $pets,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        
        $pet = Pet::with('specie')->find($pet->id);
        $user = Auth::user();
        
        return Inertia::render('Animals/Show', [
            'animal' => $pet,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = Pet::with('specie')->find($id); // LOOK AFTER PET REQUEST
        $user = Auth::user(); // for check if user hav right
        $users = User::all(); // get all user for select list
        $species = Specie::all(); // GET ALL SPECIES FOR SELECT LIST
        $enclosures = Enclosure::all(); // SAME FOR SELECT
        // dd($animal);
        return Inertia::render('Animals/Edit', [
            'animal' => $animal,
            'user' => $user,
            'userslist' => $users,
            'specieslist' => $species ,
            'enclosurelist' => $enclosures
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet $pet)
    {
        $animal = Pet::with('specie')->find($request->request->get('id')); // GET THE GOOD ANIMAL WITH IS ID
        // dd($request->request);
        $animal->name = $request->request->get('petName');
        $animal->specie_id = $request->request->get('petSpecie');
        $animal->user_id = $request->request->get('petHealer');
        $animal->updated_at = NULL;
        $animal->special_diet = $request->request->get('petSpecialDiet');
        $animal->lunchtime = $request->request->get('petLunchtime');
        $animal->feeds = $request->request->get('petFeeds');
        $animal->specie->specie = $request->request->get('petFamily');
        $animal->specie->enclosure_id = $request->request->get('petEnclosure');
        // dd($animal);
        $animal->save();

        return Redirect::route('animals.show', $animal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        //
    }
}
