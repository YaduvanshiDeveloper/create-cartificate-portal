@extends('adminlte::page')
@section('content_header')
@section('content')
@section('title', 'Register_Details')


<section class="content">
        <div class="container-fluid">
            <div class="card mt-4">
                <div class="card-header bg-info">

                    <h1 class="card-title text-center ">Register_Details</h1>
                    
                  
                </div>
                
                <div class="card-body table-responsive" id="coursetable">
                   
                    <table  id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Course Type</th>
                                <th>Technology</th>
                                <th>Education</th>
                                
                                <th>Merchant_Transaction_id</th>
                                <th>Action</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($RegisterDetails as $RegisterDetails)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$RegisterDetails->full_name}}</td>
                        <td>{{$RegisterDetails->course_type}}</td>
                        <td>{{$RegisterDetails->technology}}</td>
                        <td>{{$RegisterDetails->branch}}/{{$RegisterDetails->semester}}</td>
                     
                        <td>{{$RegisterDetails->	merchant_transaction_id}}</td>
                        <td> <button class="btn btn-success mr-2">Edit</button>
                        <button  class="btn btn-danger">Delete</button></td>

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