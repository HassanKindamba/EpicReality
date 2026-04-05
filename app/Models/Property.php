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
}
