@extends('adminlte::page')
@section('content_header')
@section('content')
@section('title', 'Manage Student')
<section class="content">
        <div class="container-fluid">
            <div class="card mt-4">
                <div class="card-header bg-info">

                    <h1 class="card-title ">Manage Student</h1>
                    <a href="{{route('create.student')}}" class="btn btn-success" style="float:right;">+ Add Student</a>
                  
                    <div class="dropdown" style="float:right;">
            <button class="btn btn-success mr-2 dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" style="float: right;">
              Manage Students
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#" onclick="courseCompletion()">Mark Course Completed</a>
              <a class="dropdown-item" href="#" onclick="generate_certificate()">Generate Certificate</a>
            </div>
          </div>
        </div>
                </div>
                
                <div class="card-body table-responsive">
                   
                    <table  id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th> <input type="checkbox" name="student_id"  onclick="bs_checkboxes(this.checked)"></th>
                            <th>S.no</th>
                                
                                <th>Reg_no</th>
                                <th>Stu.Name</th>
                                <th>Details</th>
                                <th>status</th>
                                <th>Action</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                       
                               @foreach($student as $student)
                                    <tr>
                                    <td> <input type="checkbox" name="student_id" id="" data-checkboxvalue="{{$student->id}}"></td>
                                        <td>{{$loop->iteration}}</td>
                                        
                                        <td>{{$student->reg_no??'NA'}}</td> 
                                        <td>{{$student->name??'NA'}}</td>
                                        <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Details</button> </td>
                                        <td>{!!$student->is_completed==2?'<span class="badge badge-info">Completed</span>':'<span class="badge badge-success">Inprogress</span>'!!}</td>
                                        <td>
                                        <a href="{{route('student.edit',[Crypt::encrypt($student->id)])}}" class="btn text-success mr-2"><i class="fa fa-edit"></i></a>
                                         <a onclick="deletestudent('{{Crypt::encrypt($student->id)}}')" class="btn text-danger"><i class="fa fa-trash"></i></a>
                                        </td>

                                    </tr>
                                      @endforeach
                           
                        </tbody>
                    </table>
                </div>
                  
            </div>
        </div>
    </section>
   


<!-- Modal -->

<div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title text-center bg-warning" id="exampleModalLabel">Student Details</h1>
        
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <div>
      <h5 class="card-title text-danger">Registration No:{{$student->reg_no}}</h5>
      <br>
    <div class="profile-card-4 text-center"><img src="{{asset('student_image')}}/{{$student->image}}" class="img img-responsive" width="100px">
        <div class="profile-content">
            <div class="profile-name">{{$student->name}}
                <p>{{$student->email}}</p>
            </div>
            
            <div class="profile-description p-4">
                <h3>Educational Background:</h3>
                {{$student->qualification}}.</div>
            <div class="row bg-info">
                <div class="col-sm-4">
                    <div class="profile-overview">
                        <p>Course</p>
                        <h4>{{$student->course}}</h4></div>
                </div>
                <div class="col-sm-4">
                    <div class="profile-overview">
                        <p>Trainer</p>
                        <h4>{{$student->trainer}}</h4></div>
                </div>
                <div class="col-sm-4">
                    <div class="profile-overview">
                        <p>Time Duration</p>
                        <h4>{{$student->duration}}</h4>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

         <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Save</button>

      </div>
      
      </div>
      
    </div>
  </div>


  @stop
@section('js')
@if(Session::has('success'))
<script>
    Swal.fire({
  icon: 'success',
  title: 'Congratulations',
  text: '{{Session::get("success")}}',
  
});
   

</script>
@endif
<script> 
    function deletestudent(id){
    Swal.fire({
  title: 'Do you want to save the changes?',
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: 'YES',
  denyButtonText: `Don't Delete`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
   $.ajax({
    type:'post',
    url:"{{route('delete.student')}}",
    data:{id:id,_token:"{{csrf_token()}}"},
    success:function (data) {
        if(data=="false"){
            Swal.fire('something went wrong');
        }else{
            Swal.fire('Operation Executed Seccessfully');
            location.reload()  ;
        }
    }
    
   });
  }
});
}
</script>


    <script>
        // for selecting all checkboxes
        function bs_checkboxes(isChecked) {
            if (isChecked) {
                $('input[name="student_id"]').each(function() {
                    this.checked = true;
                });
            } else {
                $('input[name="student_id"]').each(function() {
                    this.checked = false;
                });
            }
        }
        function generate_certificate()
        {
            
            Swal.fire({
                icon: "warning",
            title: "Are You Sure To Generate Certificates",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Yes",
            denyButtonText:" Don't Yes ",
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                var checked = [];
                $("input:checkbox[name=student_id]:checked").each(function() {
                                checked.push($(this).data('checkboxvalue'));
                                console.log(checked);
                            });
                console.log(checked);            
            if(checked.length==0)
            {  
                
                Swal.fire({
                icon: "error",
                title: "Denied",
                text: "Pleaase Select at least one student",

                });
            }
            else{
                $.ajax({
                        type:'post',
                        url:"{{route('ganreate.certificats')}}",
                        data:{students:checked,_token:'{{csrf_token()}}'},
                        success:function(data){
                           if(data==true)
                           {
                            window.location.href= '{{url("Manage/Cartificates")}}';
                           }
                        }
                    });
            }
            } else if (result.isDenied) {

            }
            });
        }


        function courseCompletion()
        {
            Swal.fire({
                icon: "warning",
            title: "Are You Sure Mark Student course is completed ??",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Save",
            denyButtonText: "Don't save",
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                var checked = [];
                $("input:checkbox[name=student_id]:checked").each(function() {
                                checked.push($(this).data('checkboxvalue'));

                            });
                if(checked.length==0)
                {
                    Swal.fire({
                    icon: "error",
                    title: "Denied",
                    text: "Pleaase Select at least one student",

                    });
                }else{
                    $.ajax({
                        type:'post',
                        url:'{{route("course-completion")}}',
                        data:{students:checked,_token:'{{csrf_token()}}'},
                        success:function(data){
                           if(data==true)
                           {
                            Swal.fire({
                                title: "Success",
                                text: "Now You can generate Certificates",
                                icon: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#3085d6",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "okay"
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                                });
                           }
                        },



                    });
                }
            } else if (result.isDenied) {

            }
            });
        }
    </script>
@ensection
@endsection