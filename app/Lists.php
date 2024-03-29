<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Lists extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }    
}
