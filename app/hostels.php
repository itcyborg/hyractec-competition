<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hostels extends Model
{
    //
    public function hostel_booking()
    {
        return $this->belongsToMany(hostel_booking::class);
    }
}
