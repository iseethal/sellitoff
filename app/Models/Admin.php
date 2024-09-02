<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';

    protected $fillable = [
        'id',
        'role',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'user_name',
        'password',
        'status',
        'created_at',
    ];

    public $timestamps = false;
}
