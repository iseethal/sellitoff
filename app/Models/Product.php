<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    // protected $guarded = [];


    protected $fillable = [

        'category_id',
        'subcategory_id',
        'sub_subcategory_id',
        'product_name',
        'price',
        'description',
        'highlight',
        'urgent',
        'image',
        'support_image1',
        'support_image2',
        'support_image3',
        'support_image4',
        'support_image5',
        'support_image6',
        'support_image7',
        'support_image8',
        'support_image9',
        'support_image10',
        'is_active',
        'is_deleted',
        'subscription_id',
    ];

    public $timestamps = false;
}
