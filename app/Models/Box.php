<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    public function items()
    {
        return $this->hasMany(Item::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
