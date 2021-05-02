<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'animals' => compact('pets'),
            'user' => compact('user')
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
            'pet' => compact('pet'),
            'user' => compact('user')
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

        return Inertia::render('Animals/Edit', [
            'animal' => compact('animal'),
            'user' => compact('user'),
            'userslist' => compact('users')
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
        //
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
