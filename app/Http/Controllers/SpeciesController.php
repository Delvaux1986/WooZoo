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
use App\Models\Specie_Enclosure;
use Hamcrest\Type\IsInteger;
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
        $species = Specie::with('specie_enclosure.enclosure', 'pets')->get();
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
        return Inertia::render('Species/Create', [
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
        $newSpecie->lunchtimeTwo = $request->request->get('newSpecieLunchtimeTwo');
        $newSpecie->created_at = $now;
        $newSpecie->save();
        if($request->request->get('newSpecieEnclosureId')){
            $enclos = Specie_Enclosure::find(1)->where('specie_id' , $newSpecie->id);
            // dd($enclos);
            $enclos->update(['enclosure_id' => $request->request->get('newSpecieEnclosureId')]);

        }
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
        $specie = Specie::with('specie_enclosure.enclosure', 'pets')->find($specie->id);
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
        $specie = Specie::with('specie_enclosure.enclosure', 'pets')->find($id);
        $user = Auth::user(); // for check if user hav right
        $users = User::all(); // get all user for select list
        $species = Specie::all(); // GET ALL SPECIES FOR SELECT LIST
        $enclosures = Enclosure::with('specie_enclosure.specie')->get();

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
    public function update(Request $request, Specie $specie)
    {

        $specie = Specie::with('specie_enclosure.enclosure')->find($specie->id);
        $now = new DateTime();
        $now->add(new DateInterval("PT2H"));

        $specie->specie = $request->request->get('specieName');
        $specie->family = $request->request->get('specieFamily');
        $specie->food_type = $request->request->get('specieFoodType');
        $specie->lunchtime = $request->request->get('specieLunchtime');
        $specie->lunchtimeTwo = $request->request->get('specieLunchtimeTwo');
        $specie->enclosure_id = $request->request->get('specieEnclosure');
       
        
        

        if (is_int($specie->getOriginal('enclosure_id'))  && $specie->enclosure_id === 1 ) { // WE GET Specie out the OF ENCLOS 
            
            $specie_enclosure = Specie_Enclosure::find(1)->where('specie_id', $specie->id);
            $specie_enclosure->update([ 'enclosure_id' => $specie->enclosure_id]);
            

        }elseif(is_int($specie->getOriginal('enclosure_id')) && $specie->getOriginal('enclosure_id') != 0 && $specie->enclosure_id != 0 ){ // WE GET SPECIE OUT OF ENCLOS

            $specie_enclosure = Specie_Enclosure::where('specie_id', $specie->id)->first();
            $specie_enclosure->update(['enclosure_id' => $specie->enclosure_id ]);
        }elseif(is_int($specie->getOriginal('enclosure_id')) && is_int($specie->enclosure_id) && $specie->getOriginal('enclosure_id') != 0 && $specie->enclosure_id != 0){
            
            $specie_enclosure = Specie_Enclosure::where('specie_id', $specie->id)->first();
            $specie_enclosure->update(['enclosure_id' => $specie->enclosure_id]);

        }

        $specie->save();


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
        $specie = Specie::with('enclosure', 'pets')->find($id);
        // dd($specie->pets);
        if ($specie->enclosure) {
            $enclos = Enclosure::find($specie->enclosure->id);
            $enclos->specie_id = null;
            $enclos->occupy = 0;
            $enclos->save();
        }
        if ($specie->pets) {
            foreach ($specie->pets as $pet) {
                $thisPet = Pet::find($pet->id);
                $thisPet->specie_id = null;
                $thisPet->save();
            }
        }

        Specie::destroy($id);


        return Redirect::route('species');
    }
    public function updateFirstLunchtime($id, $state)
    {
        $feedingAnimals = Specie::find($id);
        $feedingAnimals->feedSpecie = $state;
        $feedingAnimals->save();
        return Redirect::route('home');
    }
    public function updateSecondLunchtime($id, $state)
    {
        $feedingAnimals = Specie::find($id);
        $feedingAnimals->feedSpecieTwo = $state;
        $feedingAnimals->save();

        return Redirect::route('home');
    }
}
