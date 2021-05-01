<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    public function species()
    {
        $this->hasOne(Species::class , 'foreign_key');
    }
    public function healer()
    {
        $this->hasOne(User::class , 'foreign_key');
    }
}
