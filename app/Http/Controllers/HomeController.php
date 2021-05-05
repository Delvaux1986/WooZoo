<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Specie;
use App\Models\Enclosure;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // LANDING PAGE
    public function index()
    {
        $animals = Pet::with('specie.enclosure')->get();
        $users = User::all();
        $enclosures = Enclosure::with('specie')->get();
        $species = Specie::with('enclosure')->get();

        return Inertia::render('Home/Index' , [
            'animals' => $animals,
            'users' => $users,
            'enclosures' => $enclosures,
            'species' => $species
        ]);
    }
}
