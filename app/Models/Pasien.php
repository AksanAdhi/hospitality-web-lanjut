<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'patients';

    protected $fillable = [
        'name',
        'age',
        'gender',
        'address',
        'phone'
    ];

    protected $casts = [
        'age' => 'integer',
        'gender' => 'string'
    ];

    // If you want to use timestamps (created_at, updated_at)
    protected $timestamps = true;

    // Constants for gender options
    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';

    // Get available gender options
    public static function getGenderOptions()
    {
        return [
            self::GENDER_MALE => 'Laki-laki',
            self::GENDER_FEMALE => 'Perempuan'
        ];
    }
}