@extends('adminlte::page')
@section('content_header')
@section('content')
@section('title', 'Add new course')
<div class="conatiner-fluid">
    <div class="card">
        <div class="card-header bg-danger text-white">
            <h5 class="card-title">Create New Course</h5>
        </div>
        <div class="card-body">
            <form action="{{route('save.course')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Course Name: <small class="text-danger">*</small></label>
                    <input type="text" class="form-control @error('course_name') is-invalid @enderror" name="course_name">
                    @error('course_name') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="">Course Duration: <small class="text-danger">*</small></label>
                    <select name="duration" id="" class="form-control">
                        <option value="">Please Select</option>
                        <option value="45 days">45 days</option>
                        <option value="1 Month">1 Month</option>
                        <option value="2 Months">2 Months</option>
                        <option value="3 Months">3 Months</option>
                        <option value="6 Months">6 Months</option>
                    </select>
                    @error('duration') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="">Course Fee: <small class="text-danger">*</small></label>
                    <input type="number" class="form-control" name="fee">
                    @error('fee') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="">Course Image: <small class="text-danger">*</small></label>
                    <input type="file" class="form-control" name="file">
                    @error('file') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="">Course Trainer: <small class="text-danger">*</small></label>
                   <select name="trainer" id="" class="form-control">
                    <option value="">Please Choose Trainer</option>
                    <option value="1">Nirbhay Singh</option>
                    <option value="2">Shah Fahad</option>
                   </select>
                   @error('trainer') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                </div>
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="reset" class="btn btn-danger">Clear</button>
            </form>
        </div>
    </div>
</div>


@stop
@endsection