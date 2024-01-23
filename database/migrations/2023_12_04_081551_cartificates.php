<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cartificates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartificates', function (Blueprint $table) {
                $table->id();
                $table->string('certificate_id');
                $table->date('course_start');
                $table->date('course_end');
                $table->integer('course_type');
                $table->integer('course');
                $table->integer('student_id');
                $table->date('issue_date');
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
        //
    }
}
