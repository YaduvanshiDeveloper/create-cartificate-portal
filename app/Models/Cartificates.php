<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseType;
use App\Models\Student;
use App\Models\Course;

class Cartificates extends Model
{
    use HasFactory;
    protected $fillable = ['certificate_id','course_start','course_end','course_type','course',
    'student_id','issue_date'];

    public function getCourseTypeAttribute(){
        $id = $this->attributes['course_type'];
        return CourseType::findorFail($id)->course_type;
    }

    public function getStudentIdAttribute(){
        $id = $this->attributes['student_id'];
        return Student::findorFail($id)->name;
    }

    public function getCourseAttribute(){
        $id = $this->attributes['course'];

        $data = Course::where('id',$id)->first()->course_name??'NA';
       return $data; 
    }
}
