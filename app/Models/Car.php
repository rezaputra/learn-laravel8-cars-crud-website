<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    protected $primaryKey = 'id';
    
    protected $fillable = ['name', 'founded', 'description'];

    // the output are same between toArray() and toJson() 

    // hidden data
    // protected $hidden = ['password', 'token'];

    //show only data
    protected $visible = ['id', 'name', 'founded', 'description'];
}
