@extends('adminlte::page')
@section('content_header')
@section('content')
@section('title', 'Manage Cartificates')
<section class="content">
        <div class="container-fluid">
            <div class="card mt-4">
                <div class="card-header bg-info">

                    <h1 class="card-title ">Manage Cartificates</h1>
                    <!-- <button type="submit" class="btn btn-success" style="float:right;" data-toggle="modal" data-target="#exampleModal">+ Add Cartificates</button> -->
                </div>
                
                <table class=" table-success table-hover text-center border table-bordered">
                    <thead class="table-dark p-4">
                    <tr>
                    <th>Sr.No</th>
                    <th>Student Id</th>
                    <th>Cartificate Id</th>
                    <th>Course Start Date</th>
                    <th>Course End Date</th>
                    <th>Course Type</th>
                    <th>Course</th>
                    <th>Status</th>
                    <th>Action</th>

                    </tr>
                    </thead>
                @foreach( $cartificates as  $cartificate)
        

                <tbody class="p-4">
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$cartificate->student_id}}</td>
                    <td>{{$cartificate->certificate_id}}</td>
                    <td>{{$cartificate->course_start}}</td>
                    <td>{{$cartificate->course_end}}</td>
                    <td>{{$cartificate->course_type}}</td>
                    <td>{{$cartificate->course}}</td>
                    <td><span class="badge {{$cartificate->status==1?'badge-success':'badge-danger'}}">{{$cartificate->status==1?'Active':'Blocked'}}</span></td>
                    <td>
                    <a href="{{url('view-certificate',Crypt::encrypt($cartificate->id))}}"  class="btn btn-warning sm m-1 btn-sm">View</a>
                   
                  
                    <a href="{{url('block-certificate',Crypt::encrypt($cartificate->id))}}"  class="btn btn-danger btn-sm m-1">
                    {{$cartificate->status==2?'Active':'Block'}}
                    </a>
                    </td>
                    
                </tr>

                </tbody>
                  
                @endforeach
                </table>
      
        </div>
    </section>


@stop
@endsection