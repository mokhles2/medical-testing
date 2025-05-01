<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('age');
            $table->integer('weight');
            $table->integer('temperature');
            $table->integer('blood_pressure');
            $table->integer('sugar_level');
            $table->string('blood_type');
            $table->string('blood_test');
            $table->text('prescription');
            $table->string('status');
            $table->foreignId('user_id');
            $table->foreignId('hospital_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_histories');
    }
}
