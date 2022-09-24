<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    use HasFactory;

    protected $fillable = [
        'neighborhood_name',
        'city_id',
    ];

    public function city(){
        return $this->belongsTo('App\Models\City');
    }
}
