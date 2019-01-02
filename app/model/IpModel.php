<?php

namespace App\model;

use App\Traits\TableSuffix;
use Illuminate\Database\Eloquent\Model;

class IpModel extends Model
{
    use TableSuffix;

    protected $table='IP_address_';
    protected $primaryKey='ip2long';
    protected $guarded=[];
}
