<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hostel_booking extends Model
{
    //
    public function hostels()
    {
        return $this->belongsToMany(hostels::class);
    }
}
