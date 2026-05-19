<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Dokter extends Model
{
    use HasFactory, Searchable;

    protected $guarded = ['id'];
    
    public function ahli(){
        return $this->belongsTo(Ahli::class);
    }

    public function toSearchableArray()
    {
        return [
            'nmdokter' => $this->nmdokter,
            'kd_dokter' => $this->kd_dokter,
        ];
    }
}