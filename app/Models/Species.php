<?php

namespace App\Models;

use App\Models\Enclosure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Species extends Model
{
    use HasFactory;

    public function enclosure()
    {
        return $this->hasOne(Enclosure::class, 'foreign_key');
    }

    public function pet()
    {
        return $this->belongsToMany(Pet::class , 'foreign_key');
    }
}
