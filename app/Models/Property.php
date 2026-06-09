<?php

namespace App\Models;
use App\Models\User;
use App\Models\Bedroom;
use App\Models\Bathroom;

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
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bedrooms()
    {
        return $this->hasMany(Bedroom::class);
    }

    public function bathrooms()
    {
        return $this->hasMany(Bathroom::class);
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }
}