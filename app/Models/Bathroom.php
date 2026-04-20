<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bathroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'bedroom_id',
        'number',
        'type',
        'shower',
        'doors',
        'image',
        'bathroom',
        'area',
        'description'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function bedroom()
    {
        return $this->belongsTo(Bedroom::class);
    }
}