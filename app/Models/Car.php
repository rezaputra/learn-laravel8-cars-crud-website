<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    protected $primaryKey = 'id';
    
    protected $fillable = ['name', 'founded', 'description', 'image_path', 'user_id'];

    // the output are same between toArray() and toJson() 

    // hidden data
    // protected $hidden = ['password', 'token'];

    //show only data
    protected $visible = ['id', 'name', 'founded', 'description'];

    //one to many
    public function carModels(){
        return $this->hasMany(CarModel::class);
    }

    //one to one
    public function headquarters(){
        return $this->hasOne(Headquarter::class);
    }

    //define a has many relationship
    public function engines(){
        return $this->hasManyThrough(
            Engine::class, 
            CarModel::class, 
            'car_id',//foreign key car in cars_models table
            'model_id'//foreign key model in engines table
        );

    }

    //define has one through relationship
    public function productionDate()
    {
        return $this->hasOneThrough(
            CarProductionDate::class,
            CarModel::class,
            'car_id',
            'model_id' //foreign key model in car_production_date table
        );
    }

    //this for many to many
    public function products(){
        return $this->belongsToMany(Product::class);
    }

}
