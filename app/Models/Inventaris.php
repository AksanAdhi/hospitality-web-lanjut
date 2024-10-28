<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $table = 'inventory';

    protected $fillable = [
        'name',
        'type',
        'quantity',
        'location',
        'status',
        'expiration_date'
    ];

    protected $casts = [
        'expiration_date' => 'date'
    ];

    // If you want to use timestamps (created_at, updated_at)
    protected $timestamps = true;
}