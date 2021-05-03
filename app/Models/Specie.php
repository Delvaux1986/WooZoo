<?php

namespace App\Models;

use App\Models\Pet;
use App\Models\Enclosure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specie extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    protected $fillable = [
        'specie',
        'food_type',
        'enclosure_id',
        'family' ,
        'lunchtime',
    ];
    
    protected $table = 'species';
    // Species that can hav Many enclosure
    public function enclosure()
    {
        return $this->hasOne(Enclosure::class);
    }
    // Species that can hav many animals 
    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}
