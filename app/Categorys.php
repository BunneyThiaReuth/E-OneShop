<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
const UPDATED_AT = false;
class Categorys extends Model
{
    public $timestamps = false;
    protected $table = "tbl_category";
    protected $primaryKey = "cateID";
}
