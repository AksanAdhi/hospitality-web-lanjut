<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'doctors';

    protected $fillable = [
        'name',
        'specialty',
        'phone'
    ];

    // If you want to use timestamps (created_at, updated_at)
    protected $timestamps = true;
}