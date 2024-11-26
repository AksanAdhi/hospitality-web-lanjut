<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    // Specify the table name since it's not the default plural form
    protected $table = 'patients';

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    // Define the mass assignable fields that correspond to the table columns
    protected $fillable = [
        'nama',
        'nik',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'telepon',
        'riwayat_penyakit',
    ];
}
