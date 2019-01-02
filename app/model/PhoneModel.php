<?php

namespace App\model;

use App\Traits\TableSuffix;
use Illuminate\Database\Eloquent\Model;

class PhoneModel extends Model
{
    use TableSuffix;

    protected $table='Phone_';
    protected $primaryKey='phone';
    protected $guarded=[];
}
