<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'sliders';

    protected $fillable = [

        'title',
        'subtitle',
        'description',
        // 'link',
        'is_active',
        'is_deleted',
        'image',
        'category_id'
    ];

    public $timestamps = false;
}
