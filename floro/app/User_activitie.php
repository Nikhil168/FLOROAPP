<?php

namespace App;

use User;
use Illuminate\Database\Eloquent\Model;

class User_activitie extends Model
{
    public function users()
    {
       return $this->belongsTo(User::class);
    }
}