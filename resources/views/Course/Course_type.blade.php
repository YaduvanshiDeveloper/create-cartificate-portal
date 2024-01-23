@extends('adminlte::page')
@section('content_header')
@section('content')
@section('title', 'Course Type')

<div class="conatiner-fluid">
    <div class="card">
        <div class="card-header bg-danger text-white">
            <h5 class="card-title">Create Course Type</h5>
        </div>
        <div class="card-body">
            <form action="{{route('course.type')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <div class="form-group col-sm-6">
                    <label for=""> Enter Course Type: <small class="text-danger">*</small></label>
                    <input type="text" class="form-control" name="course_type">
                    @error('course_type') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                </div>
                </div>


                <button type="submit" class="btn btn-success">Submit</button>
                  <button type="reset" class="btn btn-danger">Clear</button>
            </form>
        </div>
    </div>
</div>
<section class="content">
        <div class="container-fluid">
            <div class="card mt-4">
              
                
                <div class="card-body table-responsive">
                   
                    <table  id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S.no</th>
                                <th>course_types</th>
                                <th>Action</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                       
                        @foreach($courseTypes as $course)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$course->course_type}}</td>
                                        <td>
                                        <a class="btn text-success mr-2"><i class="fa fa-edit"></i></a>
                                         <a  class="btn text-danger"><i class="fa fa-trash"></i></a>
                                        </td>

                                    </tr>
                                    @endforeach
                           
                        </tbody>
                    </table>
                </div>
                  
            </div>
        </div>
    </section>
   
@stop
@endsection