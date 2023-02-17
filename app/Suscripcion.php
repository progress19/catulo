<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Suscripcion extends Model
{
    
    protected $table = "suscripciones";

    protected $fillable = ['id','email'];

}
