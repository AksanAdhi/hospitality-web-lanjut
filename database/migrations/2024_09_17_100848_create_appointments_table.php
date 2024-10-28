<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('patients') && Schema::hasTable('doctors')) {
            Schema::create('appointments', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('patient_id');
                $table->unsignedBigInteger('doctor_id');
                $table->dateTime('appointment_date');
                $table->text('reason')->nullable();
                $table->timestamps();

                $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
                $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
