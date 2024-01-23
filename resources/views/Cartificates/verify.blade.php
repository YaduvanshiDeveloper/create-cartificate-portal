
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Softflew Technologies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
   
    <div class="container">

        <img src="{{asset('certificate/img/background.png')}}" height="100%" width="100%" alt="" srcset="" class="img-fluid">
    </div>
    
    <div class="modal top fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog" style="margin-top: 10%;" role="document">
            <div class="modal-content ">
                <div class="modal-body p-4 " >
               
                    <img src="https://softflew.com/wp-content/uploads/2022/09/softflew-mobile-logo.png" alt="avatar" class=" position-absolute top-0 start-50 translate-middle " height="35%" style="bg-warning" />
                    <form action="{{url('verify-certificate')}}" method="post">
                        @csrf
                        <div>
                            <h4 class="pt-5 my-3 text-center">Verify Your Certificate</h4>
    
                            <!-- password input -->
                            <div class="form-outline mb-4 ">
                                <label for="">Student Id: <small class="text-danger">*</small></label>
                            <input type="text" class="form-control " name="student_id">
                            <br>
                            <label for="">Certificate Id: <small class="text-danger">*</small></label>
                            <input type="text" class="form-control " name="certificate_id">
                                    </div>
    
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      
      <script>
          $(function(){
              $('#exampleModal').modal('toggle');
          });
        
      </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>