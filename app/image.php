<?php

namespace App;
const UPDATED_AT = false;
use Illuminate\Database\Eloquent\Model;
class image extends Model
{
    public $timestamps = false;
    protected $table = "tbl_image";
    protected $primaryKey = "imgID";
}
