@extends('adminlte::page')
@section('content_header')
@section('content')
@section('title', 'Import Students')



<div class="conatiner-fluid">
<div class="card mt-5">
        <div class="card-header bg-red">
            <h3 class="card-title">Import Data Here</h3>
        </div>
        <div class="card-body">
            <form action="{{url('import/students')}}" method="post" enctype="multipart/form-data" class="col-sm-4 mx-auto p-3">
                @csrf
                <div class="form-group">
                    <label for="">Choose Excel File</label>
                    <input type="file" class="form-control" name="file">
                </div>
            <button class="form-control btn btn-primary">Import and Generate</button>
            <a class="form-control btn btn-success mt-2" href="{{asset('demofile/certificate.xlsx')}}">Download Sample File</a>
            </form>
        </div>
    </div>
</div>


@stop
@endsection