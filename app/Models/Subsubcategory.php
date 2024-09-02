<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsubcategory extends Model
{
    use HasFactory;

    protected $table = 'sub_subcategory';

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'sub_subcategory_name',
        'image',
        'is_active',
        'is_deleted',
    ];

    public $timestamps = false;
}
