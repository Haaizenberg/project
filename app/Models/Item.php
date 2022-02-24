<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $attributes = [
        'count' => 1,
    ];

    public function box()
    {
        return $this->belongsTo(Box::class);
    }
}
