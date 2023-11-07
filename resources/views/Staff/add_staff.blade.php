@extends('adminlte::page')
@section('content_header')
@section('content')
@section('title', 'Add new Staff')



      <div class="container-fluid mt-4">
        
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Staffs</h3>
              </div>
           
              <form action="{{route('save.staff')}}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Name: <small class="text-danger">*</small></label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                    @error('name') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>
                    <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Email: <small class="text-danger">*</small></label>
                    <input type="Email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                    @error('email') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>
                    <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Phone Number: <small class="text-danger">*</small></label>
                    <input type="number" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone number">
                    @error('phone') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>
                    <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Qualification: <small class="text-danger">*</small></label>
                    <input type="text" name="qualification" class="form-control" id="exampleInputEmail1" placeholder="Enter qualification">
                    @error('qualification') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>
                    <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Courses: <small class="text-danger">*</small></label>
                    
                    <select name="courses[]" id="" class="form-control selectpikker " multiple="multiple">
                        <option value="">Please Select</option>
                        @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->course_name}}/{{$course->duration}}</option>
                        
                        @endforeach
                    </select>
                    
                    @error('courses') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>
                    <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Age: <small class="text-danger">*</small></label>
                    <input type="number" name="age" class="form-control" id="exampleInputEmail1" placeholder="Enter Age">
                    @error('age') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>
                    <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Address: <small class="text-danger">*</small></label>
                    <textarea name="address" id=""  rows="3" class="form-control"></textarea>
                    @error('address') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>
                    
                    <div class="form-group col-sm-6">
                      <label for="exampleInputFile"> Image <i class="fas fa-images"></i><small class="text-danger">*</small></label>
                      
                    <div class="input-group">
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    @error('image') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>
                    </div>
                        </div>
                    </div>
                
                  
                  
                </div>
               
                <div class="card-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                  <button type="reset" class="btn btn-danger">Clear</button>
                </div>
              </form>
            </div>
         
            </div>
          


@stop
@section('js')
<script>
  $(document).ready(function() {
    $('.selectpikker').select2();
});
  </script>

@endsection
@endsection