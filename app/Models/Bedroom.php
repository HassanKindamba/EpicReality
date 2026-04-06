<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bedroom extends Model
{
    protected $fillable = ['property_id', 'name', 'area', 'size', 'image', 'no_of_doors', 'no_of_windows', 'price'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
