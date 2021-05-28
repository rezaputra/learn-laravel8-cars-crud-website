<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $table = 'cars_models';
    protected $primaryKey = 'id';

    // protected $visible = ['id', 'car_id', 'model_name'];

    public function car(){
        return $this->belongTo(Car::class);
    }
}
