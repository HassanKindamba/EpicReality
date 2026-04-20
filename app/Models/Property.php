<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'title',
        'link',
        'description',
        'availability_status',
        'property_type',
        'visibility_status',
        'price',
        'image',
        'user_id', // Add user_id to fillable
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

     // Hii ndio method ya bedrooms
    public function bedrooms()
    {
        return $this->hasMany(Bedroom::class);
    }

    //Hii ndio method ya bathroom
    public function bathrooms()
    {
        return $this->hasMany(Bathroom::class);
    }
}
