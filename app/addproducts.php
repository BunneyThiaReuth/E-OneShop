<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
const UPDATED_AT = false;
class addproducts extends Model
{
    public $timestamps = false;
    protected $table = "tbl_products";
    protected $primaryKey = "proID";
}
