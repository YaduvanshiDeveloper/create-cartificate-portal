<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CourseType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_types')->insert([
            'course_type'=>'Summer Training',
        ]);
        DB::table('course_types')->insert([
            'course_type'=>'Winter Training',
        ]);
        DB::table('course_types')->insert([
            'course_type'=>'Industrial Training',
        ]);
        DB::table('course_types')->insert([
            'course_type'=>'Appernsipp',
        ]);
        DB::table('course_types')->insert([
            'course_type'=>'Full stack',
        ]);
    }
}
