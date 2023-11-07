@extends('adminlte::page')
@section('content_header') 
@section('content')
@section('title', 'Manage Staff')
<section class="content">
        <div class="container-fluid">
            <div class="card mt-4">
                <div class="card-header bg-info">

                    <h1 class="card-title ">Manage Staff</h1>
                    
                    <a href="{{route('staff.add')}}" class="btn btn-success" style="float:right;">+ Add Staff</a>
                </div>
                
                <div class="card-body table-responsive">
                   
                    <table  id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone.No</th>
                                <th>Courses Assigned</th>
                                <th>Address</th>
                                <th>Image</th>
                                <th>Action</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                       
                        @foreach($staff as $staff)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$staff->name??'NA'}}</td>
                        <td>{{$staff->email??'NA'}}</td>
                        <td>{{$staff->phone??'NA'}}</td>
                        <td>{{$staff->course??'NA'}}</td>
                        <td>{{$staff->address??'NA'}}</td>
                        
                        <td><a href="{{asset('staff_image')}}/{{$staff->image}}" class="btn" target="_blank"> <i class="fa fa-eye"></i></a> </td>
                        <td class="d-flex"> <a href="{{route('staff.edit',[Crypt::encrypt($staff->id)])}}"  class="btn text-success mr-2"><i class="fa fa-edit"></i></a>
                        <a onclick="deletestaff('{{Crypt::encrypt($staff->id)}}')" class="btn text-danger"><i class="fa fa-trash"></i></a></td>

                    </tr>

                    @endforeach

                           
                        </tbody>
                    </table>
                </div>
                  
            </div>
        </div>
    </section>


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
    function deletestaff(id){
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
    url:"{{route('delete.staff')}}",
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
@ensection
@endsection