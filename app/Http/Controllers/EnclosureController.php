<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
use Inertia\Inertia;
use App\Models\Specie;
use App\Models\Enclosure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class EnclosureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enclosures = Enclosure::with('specie')->get();
        $user = Auth::user();

        return Inertia::render('Enclosure/Index',[
            'enclosurelist' => $enclosures,
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
        $species = Specie::all();

        return Inertia::render('Enclosure/Create',[
            'specieslist' => $species
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
        $enclosure = new Enclosure();
        $now = new DateTime();
        $now->add(new DateInterval("PT2H"));
        $enclosure->name = $request->request->get('newEnclosName');
        $enclosure->description = $request->request->get('newEnclosDescription');
        $enclosure->occupy = $request->request->get('newEnclosOccupy');
        $enclosure->specie_id = $request->request->get('newEnclosSpecieId');
        $enclosure->created_at = $now ;

        $enclosure->save();

        return Redirect::route('enclosures');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enclosure  $enclosure
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enclosure = Enclosure::with('specie')->find($id);
        $user = Auth::user();

        return Inertia::render('Enclosure/Show', [
            'enclosure' => $enclosure,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enclosure  $enclosure
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enclosure = Enclosure::with('specie')->find($id);
        $species = Specie::all();
        
        return Inertia::render('Enclosure/Edit', [
            'enclosure' => $enclosure,
            'specieslist' => $species,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enclosure  $enclosure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $enclosure = Enclosure::with('specie')->find($id);
        $now = new DateTime();
        $now->add(new DateInterval("PT2H"));
        $enclosure->name = $request->request->get('enclosName');
        $enclosure->description = $request->request->get('enclosDescription');
        $enclosure->occupy = $request->request->get('enclosOccupy');
        $enclosure->specie_id = $request->request->get('enclosSpecie');
        $enclosure->updated_at = $now;
        $enclosure->save();

        return Redirect::route('enclosures');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enclosure  $enclosure
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enclos = Enclosure::with('specie')->find($id);
        $specie = Specie::find($enclos->specie_id);
        $specie->enclosure_id = NULL;
        $specie->save();

        Enclosure::destroy($id);


        return Redirect::route('enclosures');
    }
}
