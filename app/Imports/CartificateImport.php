<?php

namespace App\Imports;
use Carbon\Carbon;
use App\Models\Cartificates;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Imports\CartificateImport;

class CartificateImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        $row = str_replace(' ','_',$row);
        
        return new Cartificates([
            'certificate_id'=>$row['certificate_number'],
            'course_start'=>Carbon::parse($row['course_start'])->format('Y-m-d'),
            'course_end'=>Carbon::parse($row['course_end'])->format('Y-m-d'),
            'course_type'=>$row['course_type'],
            'course'=>$row['course'],
            'student_id'=>$row['student_name'],
            'issue_date'=>Carbon::parse($row['issue_date'])->format('Y-m-d'),
        ]);
    }
}
