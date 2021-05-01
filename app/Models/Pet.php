<?php

namespace App\Models;

use App\Models\User;
use App\Models\Species;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pet extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    protected $fillable = [
        'specie_id', 'user_id', 'name' , 'lunchtime' , 'feeds'
    ];

    protected $table = 'pets';
    
    public function species()
    {
        $this->hasOne(Species::class);
    }
    
    public function healer()
    {
        $this->hasOne(User::class);
    }
}
