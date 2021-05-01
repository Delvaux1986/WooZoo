<?php

namespace App\Models;

use App\Models\User;
use App\Models\Specie;
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
    // Pet that can hav only One Specie
    public function specie()
    {
        return $this->belongsTo(Specie::class);
    }
}
