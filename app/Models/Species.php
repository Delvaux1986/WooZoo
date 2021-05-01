<?php

namespace App\Models;

use App\Models\Pet;
use App\Models\Enclosure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Species extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    protected $fillable = [
        'specie', 'food_type', 'enclosure_id'
    ];
    
    protected $table = 'species';

    public function enclosure()
    {
        return $this->hasOne(Enclosure::class);
    }

    public function pet()
    {
        return $this->belongsToMany(Pet::class);
    }
}
