<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
const UPDATED_AT = false;
class slider extends Model
{
    public $timestamps = false;
    protected $table = "tble_slider";
    protected $primaryKey = "shlideID";
}
