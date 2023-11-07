@extends('adminlte::page')
@section('css')
<style>
    .pagination {
        float:right;
        margin: 10px;
    }
</style>
@endsection
@section('content_header')
@section('content')
@section('title', 'Manage Course')

    <section class="content">
        <div class="container-fluid">
            <div class="card mt-4">
                <div class="card-header bg-info">

                    <h1 class="card-title ">Manage Course</h1>
                    <a href="{{route('course.add')}}" class="btn btn-success" style="float:right;">+ Add Course</a>
                  
                </div>
                
                <div class="card-body table-responsive" id="coursetable">
                   
                    <table  id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Course Name</th>
                                <th>Course Durations</th>
                                <th>Course Fee</th>
                                <th>Image</th>
                                
                                <th>Status</th>
                                <th>Action</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$course->course_name}}</td>
                        <td>{{$course->duration}}</td>
                        <td>{{$course->fee}}</td>
                        <td><a href="{{asset('course_image')}}/{{$course->image}}" class="btn btn-info" target="_blank">View</a> </td>
                     
                        <td>{!!$course->status==1?'<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">Disabled</span>'!!}</td>
                        <td> <button class="btn btn-success mr-2">Edit</button>
                        <button onclick="deletecourse('{{Crypt::encrypt($course->id)}}')" class="btn btn-danger">Delete</button></td>

                    </tr>

                    @endforeach
                </tbody>
                    </table>
                    {{$courses->links()}}
                </div>
                  
            </div>
        </div>
    </section>



@stop
@section('js')
<script>
    new DataTable('#coursetable');
</script>
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
    function deletecourse(id){
    Swal.fire({
  title: 'Do you want to save the changes?',
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: 'Save',
  denyButtonText: `Don't save`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
   $.ajax({
    type:'post',
    url:"{{route('delete.course')}}",
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

@endsection
@endsection