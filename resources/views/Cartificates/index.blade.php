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
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <h3 class="p-2"><i class="fa fa-certificate"></i> Cartificates</h3>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        
                    <div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Cartificates Types
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Summer Training</a></li>
                        <li><a class="dropdown-item" href="#">Winter Training</a></li>
                        <li><a class="dropdown-item" href="#">Intership </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Apprenticeship</a></li>
                        <li><a class="dropdown-item" href="#">Workshop</a></li>
                    </ul>
                    </div>
                    <div class="btn-group">
                    <button type="button" class="btn btn-waring dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Cartificates Types
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Summer Training</a></li>
                        <li><a class="dropdown-item" href="#">Winter Training</a></li>
                        <li><a class="dropdown-item" href="#">Intership </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Apprenticeship</a></li>
                        <li><a class="dropdown-item" href="#">Workshop</a></li>
                    </ul>
                    </div>
                        
                    </ul>
                   
                    </div>
                </div>
                </nav>
                  
            </div>
        </div>
    </section>


@stop
@endsection