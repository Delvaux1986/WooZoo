<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Specie;
use App\Models\Enclosure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SpeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $species = Specie::with('enclosure','pets')->get();
        $user = Auth::user();
        // dd($species);
        return Inertia::render('Species/Index', [
            'species' => $species,
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
        $enclosurelist = Enclosure::all();
        return Inertia::render('Species/Create',[
            'enclosurelist' => $enclosurelist
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newSpecie = new Specie();
        $newSpecie->specie = $request->request->get('newSpecieName');
        $newSpecie->family = $request->request->get('newSpecieFamily');
        $newSpecie->food_type = $request->request->get('newSpecieFoodType');
        $newSpecie->lunchtime = $request->request->get('newSpecieLunchtime');
        $newSpecie->enclosure_id = $request->request->get('newSpecieEnclosureId');
        $newSpecie->save();
        $user = Auth::user();

        $specie = Specie::with('enclosure','pets')->find($newSpecie->id);
        // dd($specie);
        return Redirect::route('species');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function show(Specie $specie)
    {
        $specie = Specie::with('enclosure','pets')->find($specie->id);
        $user = Auth::user();

        return Inertia::render('Species/Show', [
            'specie' => $specie,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $specie = Specie::with('enclosure','pets')->find($id);
        $user = Auth::user(); // for check if user hav right
        $users = User::all(); // get all user for select list
        $species = Specie::all(); // GET ALL SPECIES FOR SELECT LIST
        $enclosures = Enclosure::all();

        return Inertia::render('Species/Edit', [
            'specie' => $specie,
            'user' => $user,
            'specieslist' => $species,
            'userslist' => $users,
            'enclosurelist' => $enclosures
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Specie $specie)
    {
        $specie->specie = $request->request->get('specieName');
        $specie->family = $request->request->get('specieFamily');
        $specie->food_type = $request->request->get('specieFoodType');
        $specie->lunchtime = $request->request->get('specieLunchtime');
        $specie->enclosure_id = $request->request->get('specieEnclosure');

        $enclos = Enclosure::find($specie->enclosure_id);
        $enclos->occupy = 1;
        $enclos->save();
        $specie->save();
        
        return Redirect::route('species.show', $specie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specie $specie)
    {
        //
    }
}
