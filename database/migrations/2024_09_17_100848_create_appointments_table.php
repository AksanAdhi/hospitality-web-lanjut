<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Check if the 'appointments' table already exists
        if (!Schema::hasTable('appointments')) {
            Schema::create('appointments', function (Blueprint $table) {
                $table->id(); 
                $table->unsignedBigInteger('patient_id'); 
                $table->unsignedBigInteger('doctor_id'); 
                $table->dateTime('appointment_date');
                $table->text('reason')->nullable(); 
                $table->timestamps();

                // Foreign keys with cascade on delete
                $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
                $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the table if it exists
        Schema::dropIfExists('appointments');
    }
}
