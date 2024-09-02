<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFilterOptions extends Model
{
    use HasFactory;
    protected $table = 'product_filter_options';

    protected $guarded = [];
}
