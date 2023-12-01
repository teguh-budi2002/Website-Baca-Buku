<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

     /** 
     * Getter : Convert JSON Into Array
     * 
     * Setter : Convert Array Into JSON
    */
    protected function imgBanner() : Attribute 
    {
        return Attribute::make(
            get: fn($val) => json_decode($val, true),
            set: fn($val) => json_encode($val)
        );
    }
}
