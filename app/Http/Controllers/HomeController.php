<?php

namespace App\Http\Controllers;

use App\Models\Pet;
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
        $pets = Pet::all()->with('species');
        // dd($pets);
        return Inertia::render('Home/Index' , compact('pets'));
    }
}
