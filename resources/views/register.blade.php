@extends('welcome')
@section('content')
<div class="container">
    <div class="container-flude p-4">
    
<form class="row g-3">
<div class="col-md-12">
    <label for="inputPassword4" class="form-label">Name</label>
    <input type="text" class="form-control" id="inputPassword4">
  </div>
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-0/">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword4">
  </div>

  <div class="col-3">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</div>
</div>
@endsection('content')