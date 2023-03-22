<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatepatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->increments('patient_id');
            $table->string('patient_fname',30);
            $table->string('patient_lname',15);
            $table->integer('patient_dob')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->integer('patient_gender')->comment('1=>Male.2=>Female');
            $table->string('patient_number', 100);
            $table->tinyInteger('is_active')->default(0);
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
        Schema::dropIfExists('patient');
    }
}
