<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pais extends Model
{
    protected $table='country';
    protected $fillable=['Name','Code'];
}
