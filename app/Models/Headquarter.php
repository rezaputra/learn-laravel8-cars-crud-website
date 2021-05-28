<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headquarter extends Model
{
    use HasFactory;

    //for get data from headquarter table(join)
    public function car()
    {
        return $this->belongsTo(Cas::class);
    }
}
