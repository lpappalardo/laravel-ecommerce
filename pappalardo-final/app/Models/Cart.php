<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne('App\Models\User','id','user_fk');
    }

    public function book()
    {
        return $this->hasOne('App\Models\Book','id','book_fk');
    }
}