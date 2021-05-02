<?php

namespace App\Http\Controllers;

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
        $animals = Pet::with('specie')->get();
        $users = User::all();

        return Inertia::render('Home/Index' , [
            'animals' => $animals,
            'users' => $users
        ]);
    }
}
