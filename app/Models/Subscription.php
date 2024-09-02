<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $table = 'subscription';

    protected $fillable = [
        'user_type',
        'user_type_category',
        'plan_name',
        'product_tag',
        'photo_count',
        'pricing_per_week',
        'pricing_per_month',
        'price_3months',
        'price_6months',
        'pricing_per_yr',
        'items',
        'is_active',
        'is_deleted',
    ];

    public $timestamps = false;

}
