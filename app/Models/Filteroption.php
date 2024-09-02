<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filteroption extends Model
{
    use HasFactory;

    protected $table = 'filter_options';

     protected $guarded = [];


    public $timestamps = false;
}
