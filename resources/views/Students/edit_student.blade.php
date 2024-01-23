@extends('adminlte::page')
@section('content_header')
@section('content')
@section('title', 'Edit Student')



      <div class="container-fluid mt-4">
        
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Student</h3>
              </div>
           
              <form action="{{route('update.student')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" value="{{crypt::encrypt($data->id)}}" name="token">
              @csrf
              <div class="card-body">
                  <div class="row">

                  <div class="form-group col-sm-4">
                    <label for="exampleInputEmail1">Reg No: <small class="text-danger">*</small></label>
                    <input type="text" name="Reg_no" class="form-control" value="{{$data->Reg_no}}" id="exampleInputEmail1" placeholder="">
                    @error('Reg_no') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                  <div class="form-group col-sm-4">
                    <label for="exampleInputEmail1"> Full Name: <small class="text-danger">*</small></label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$data->name}}" placeholder="Enter Name">
                    @error('name') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-4">
                    <label for="exampleInputEmail1">Date of birth: <small class="text-danger">*</small></label>
                    <input type="date" name="dob" class="form-control" value="{{$data->dob}}" id="exampleInputEmail1" >
                    @error('dob') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-4">
                    <label for="exampleInputEmail1">Student Email: <small class="text-danger">*</small></label>
                    <input type="Email" name="email" class="form-control" value="{{$data->email}}" id="exampleInputEmail1" placeholder="Enter Email">
                    @error('email') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-4">
                    <label for="exampleInputEmail1">Student Contact No: <small class="text-danger">*</small></label>
                    <input type="number" name="phone" class="form-control" value="{{$data->phone}}" id="exampleInputEmail1" placeholder="Enter Phone number">
                    @error('phone') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-4">
                    <label for="exampleInputEmail1">Student Emergency Contact No: <small class="text-danger">*</small></label>
                    <input type="number" name="emergency_phone" class="form-control" value="{{$data->emergency_phone}}" id="exampleInputEmail1" placeholder="Enter Phone number">
                    @error('emergency_phone') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-4">
                    <label for="exampleInputEmail1">Student ID Type: <small class="text-danger">*</small></label>
                    <select name="id_type" id="" class="form-control selectpikker " multiple="multiple">
                        <option value="{{$data->id_type}}">Please Select</option>
                        <option value="COLLEGE ID">COLLEGE ID</option>
                        <option value="AADHAAR NO">AADHAAR NO</option>
                    </select>
                    @error('id_type') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-4">
                    <label for="exampleInputEmail1">Enter ID No: <small class="text-danger">*</small></label>
                    <input type="text" name="id_no" value="{{$data->id_no}}" class="form-control" id="exampleInputEmail1" >
                    @error('id_no') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    
                    
                    <div class="form-group col-sm-4">
                    <label for="exampleInputEmail1">Designaton: <small class="text-danger">*</small></label>
                    <input type="text" name="designaton" class="form-control" value="{{$data->designaton}}" id="exampleInputEmail1" placeholder="Enter designaton">
                    @error('designaton') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Student Institute/College Name: <small class="text-danger">*</small></label>
                    <input type="text" name="clg" class="form-control" value="{{$data->clg}}" id="exampleInputEmail1" placeholder="Enter qualification">
                    @error('clg') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Student Institute/College Address: <small class="text-danger">*</small></label>
                    <input type="text" name="clg_add" class="form-control" value="{{$data->clg_add}}" id="exampleInputEmail1" placeholder="Enter qualification">
                    @error('clg_add') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <hr>
                    <div class="form-group col-sm-12">
                    <label for="exampleInputEmail1"> Choose Your Courses:<small class="text-danger">*</small></label>
                  <div class="row ml-5">
                  @foreach($courses as $course)
                  <div class="col-sm-2">
                    <input class="form-check-input" type="radio" name="courses" value="{{$course->id}}" onclick="getFee('{{$course->id}}')">
                   
                   <label class="form-check-label" for="flexCheckIndeterminate">
                   {{$course->course_name}}/{{$course->duration}}
                   </label>
                  </div>
                  @endforeach
                  </div>
                    
                    @error('courses') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-6">
                    
                    <label for="">Select Your Trainer: <small class="text-danger">*</small></label>
                   <select name="trainer" id="" class="form-control">
                    <option value="">Please Choose Trainer</option>
                    <option value="Nirbhay Singh">Nirbhay Singh</option>
                    <option value="Shah Fahad">Shah Fahad</option>
                   </select>
                    @error('trainer') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-6">
                    
                    <label for="">Total Fee: <small class="text-danger">*</small></label>
                   <input type="text" name="total_fee" class="form-control" value="{{$data->total_fee}}" id="total_fee" >
                    @error('total_fee') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-4">
                     <label for="">Paid Amount: <small class="text-danger">*</small></label>
                   <input type="text" name="paid_amt" class="form-control" value="{{$data->paid_amt}}" id="exampleInputEmail1" >
                    @error('paid_amt') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-4">
                     <label for="">Due Amount: <small class="text-danger">*</small></label>
                   <input type="text" name="due_amt" class="form-control" value="{{$data->due_amt}}" id="exampleInputEmail1" >
                    @error('due_amt') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-4">
                     <label for="">Reg Date: <small class="text-danger">*</small></label>
                   <input type="date" name="reg_date" class="form-control" value="{{$data->reg_date}}" id="exampleInputEmail1" >
                    @error('reg_date') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Student Address: <small class="text-danger">*</small></label>
                    <textarea name="address" id=""  rows="3"  class="form-control">{{$data->address}} </textarea>
                    @error('address') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>
                    
                    <div class="form-group col-sm-6">
                      <label for="exampleInputFile">Student Image <i class="fas fa-images"></i><small class="text-danger">*</small></label>
                      
                    <div class="input-group">
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" value="{{$data->image}}" name="image" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    @error('image') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>
                    </div>
                        </div>
                    </div>
                
                  
                  
                </div>
               
                <div class="card-footer">
                <button type="submit" class="btn btn-warning">Update</button>
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