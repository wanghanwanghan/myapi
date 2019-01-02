<?php

namespace App\model;

use App\Traits\CompositePrimaryKey;
use App\Traits\TableSuffix;
use Illuminate\Database\Eloquent\Model;

class AESModel extends Model
{
    use CompositePrimaryKey;
    use TableSuffix;

    protected $table='aes_';
    protected $primaryKey=['decode','key'];
    protected $guarded=[];
}
