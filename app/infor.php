<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
const UPDATED_AT = false;
class infor extends Model
{
    public $timestamps = false;
    protected $table = "tbl_info";
    protected $primaryKey = "infoID";
}
