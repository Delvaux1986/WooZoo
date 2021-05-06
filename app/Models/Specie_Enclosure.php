<?php

namespace App\Models;


use App\Models\Specie;
use App\Models\Enclosure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specie_Enclosure extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'enclosure_id',
        'specie_id'
    ];

    protected $table = 'specie_enclosure';

    public function specie()
    {
        return $this->belongsTo(Specie::class);
    }
    public function enclosure()
    {
        return $this->belongsTo(Enclosure::class);
    }
}

