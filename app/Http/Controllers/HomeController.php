<?php

namespace App\Http\Controllers;

use App\Models\Enclosure;
use App\Models\Pet;
use App\Models\User;
use Inertia\Inertia;
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

        return Inertia::render('Home/Index' , [
            'animals' => $animals,
            'users' => $users,
            'enclosures' => $enclosures
        ]);
    }
}
