<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $table = 'subcategory';

    protected $fillable = [

        'subcategory_name',
        'category_id',
        'image',
        'is_active',
        'is_deleted',
    ];

    public $timestamps = false;
}
