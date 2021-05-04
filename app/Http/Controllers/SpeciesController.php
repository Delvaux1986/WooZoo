<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
use App\Models\Pet;
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
        $now = new DateTime();
        $now->add(new DateInterval("PT2H"));
        $newSpecie->specie = $request->request->get('newSpecieName');
        $newSpecie->family = $request->request->get('newSpecieFamily');
        $newSpecie->food_type = $request->request->get('newSpecieFoodType');
        $newSpecie->lunchtime = $request->request->get('newSpecieLunchtime');
        $newSpecie->enclosure_id = $request->request->get('newSpecieEnclosureId');
        $newSpecie->created_at = $now ;
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
        $oldSpecie = Specie::with('enclosure')->find($specie->id);
        $now = new DateTime();
        $now->add(new DateInterval("PT2H"));

        $oldSpecie->specie = $request->request->get('specieName');
        $oldSpecie->family = $request->request->get('specieFamily');
        $oldSpecie->food_type = $request->request->get('specieFoodType');
        $oldSpecie->lunchtime = $request->request->get('specieLunchtime');
        $oldSpecie->updated_at = NULL;

        if($oldSpecie->getOriginal('enclosure_id') && !$request->request->get('specieEnclosure')){// WE GET OUT THE SPECIE OF ENCLOSURE
            $enclos = Enclosure::find($oldSpecie->getOriginal('enclosure_id'));
            $oldSpecie->enclosure_id = NULL;
            $enclos->occupy = 0;
            $enclos->specie_id = NULL;
            $enclos->save();
            
        }else if(!$oldSpecie->getOriginal('enclosure_id') && $request->request->get('specieEnclosure')){ // GET IN ENCLOSURE THE SPECIE 
            $oldSpecie->enclosure_id = $request->request->get('specieEnclosure');
            $enclos = Enclosure::find($oldSpecie->enclosure_id);
            $enclos->occupy = 1;
            $enclos->specie_id = $oldSpecie->id;
            $enclos->save();    
        }else{
            $oldEnclos = Enclosure::find($oldSpecie->getOriginal('enclosure_id'));
            $newEnclos = Enclosure::find($request->request->get('specieEnclosure'));
            $oldSpecie->enclosure_id = $request->request->get('specieEnclosure');
            $oldEnclos->occupy = 0;
            $oldEnclos->specie_id = NULL;
            $newEnclos->occupy = 1;
            $newEnclos->specie_id = $oldSpecie->id;
            $newEnclos->save();
            $oldEnclos->save();
        }
        $oldSpecie->save();
        
        
        return Redirect::route('species');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $specie = Specie::with('enclosure','pets')->find($id);
        // dd($specie->pets);
        if($specie->enclosure){
            $enclos = Enclosure::find($specie->enclosure->id);
            $enclos->specie_id = null;
            $enclos->occupy = 0;
            $enclos->save();
        }
        if($specie->pets){
            foreach ($specie->pets as $pet){
                $thisPet = Pet::find($pet->id);
                $thisPet->specie_id = null;
                $thisPet->save();
            }
        }
           
        Specie::destroy($id);
        

        return Redirect::route('species');
    }
}
