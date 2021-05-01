<?php

namespace App\Models;

use App\Models\Specie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enclosure extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    protected $fillable = [
        'name', 'description', 'occupy' , 'pet_id'
    ];
    
    protected $table = 'enclosures';


    public function species()
    {
        $this->belongsTo(Specie::class);
    }
}
