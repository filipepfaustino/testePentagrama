<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_name',
        'city_state',
        'foundation_date',
    ];
    protected $casts = [
        'foundation_date'  => 'date:Y-m-d',
    ];

    public function neighborhoods(){
        return $this->hasMany('App\Models\Neighborhood');
    }
}
