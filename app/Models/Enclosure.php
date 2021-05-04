<?php

namespace App\Models;

use App\Models\Pet;
use App\Models\Specie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enclosure extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    protected $fillable = [
        'name',
        'description',
        'occupy',
        'specie_id',
        'updated_at',
        'created_at'
    ];
    
    protected $table = 'enclosures';

    public function specie()
    {
        return $this->belongsTo(Specie::class);
    }
    
}
