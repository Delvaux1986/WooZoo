<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use Carbon\Carbon;
use App\Models\Pet;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Specie;
use App\Models\Enclosure;
use App\Models\Specie_Enclosure;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    // LANDING PAGE
    public function index()
    {  
        $now = new DateTime();
        $now->setTimezone(new DateTimeZone('Europe/Brussels'));

        // $robinright = User::find(3);
        // $robinright->role = 'Admin';
        // $robinright->save();
        // dd($robinright);
        
        $animals = Pet::with('specie')->get();
        if ($now->format('Hi') < 1300 && $now->format('Hi') > 0000) { // IF ITS THE MORNING
            $species = Specie::with('specie_enclosure.enclosure')
                ->where('lunchtime', '<', $now->format('H:i'))
                ->orWhere('lunchtime', '>', $now->format('H:i'))
                ->get();
        } else if ($now->format('Hi') > 1301 && $now->format('Hi') < 2359) {
            $species = Specie::with('specie_enclosure.enclosure')
                ->where('lunchtimeTwo', '<', $now->format('H:i'))
                ->orWhere('lunchtimeTwo', '>', $now->format('H:i'))
                ->get();
        }
        // $species = Specie::with('enclosure' , 'pets')->get();
        $userLog = Auth::user();
        $users = User::all();
        $enclosures = Enclosure::with('specie_enclosure.specie')->get();
        // dd($animals);
        return Inertia::render('Home/Index', [
            'animals' => $animals,
            'users' => $users,
            'enclosures' => $enclosures,
            'species' => $species,
            'userlog' => $userLog
        ]);
    }

}
