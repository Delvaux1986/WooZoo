<?php

namespace App\Models;

use App\Models\Pet;
use App\Models\Specie_Enclosure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specie extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'specie',
        'food_type',
        'family',
        'lunchtime',
        'lunchtimeTwo',
        'feedSpecie',
        'feedSpecieTwo',
        'specie_enclosure.enclosure'
    ];

    protected $table = 'species';
    // Species that can hav Many enclosure
    public function enclosure()
    {
        return $this->belongsToMany(Enclosure::class);
    }
    // Species that can hav many animals 
    public function specie_enclosure()
    {
        return $this->hasMany(Specie_Enclosure::class);
    }
    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}
