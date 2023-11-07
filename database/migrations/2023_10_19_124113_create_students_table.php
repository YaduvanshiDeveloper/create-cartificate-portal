<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('name');
            $table->date('dob');
            $table->string('email');
            $table->string('phone');
            $table->string('emergency_phone');
            $table->string('id_type');
            $table->string('id_no');
            $table->string('designation');
            $table->string('clg');
            $table->string('clg_add');
            $table->longText('course');
            $table->string('trainer');
            $table->string('total_fee');
            $table->string('paid_amt');
            $table->string('due_amt');
            $table->date('reg_date');
            $table->string('address');
            $table->string('image');
            $table->softdeletes();
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
        Schema::dropIfExists('students');
    }
}
