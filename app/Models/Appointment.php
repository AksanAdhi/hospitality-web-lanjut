<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi
    protected $table = 'appointments';

    // Tentukan kolom mana yang boleh diisi
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'appointment_date',
        'notes',
    ];

    /**
     * Relasi ke model Patient.
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Relasi ke model Doctor (User).
     */
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}

