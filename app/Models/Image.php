<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'image_path',
        'bathroom_id'
    ];

    public function bathroom()
    {
        return $this->belongsTo(Bathroom::class);
    }
}