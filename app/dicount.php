<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
const UPDATED_AT = false;
class dicount extends Model
{
    public $timestamps = false;
    protected $table = "tbl_discount";
    protected $primaryKey = "discountID";
}
