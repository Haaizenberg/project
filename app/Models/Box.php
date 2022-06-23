<?php

namespace App\Models;

use Database\Factories\BoxFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->hasMany(Item::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function newFactory()
    {
        return BoxFactory::new();
    }
}
