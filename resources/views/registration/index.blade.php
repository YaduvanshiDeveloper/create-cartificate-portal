
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Softflew - Certificate</title>
    
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
  </head>
  <body>
    <div class="container">
      <div class="title">Register Now</div>
      <form action="{{route('save.register')}}" method="post">
        @csrf
        <div class="user__details">
          <div class="input__box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter name"  name="full_name"/>
            @error('full_name')
                <span style="color:red">{{$message}}</span>
            @enderror
          </div>
          <div class="input__box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter email address"   name="email"/>
            @error('email')
                <span style="color:red">{{$message}}</span>
            @enderror
          </div>
          <div class="input__box">
            <span class="details">Phone Number</span>
            <input type="tel"  placeholder="Enter mobile number" name="phone"/>
            @error('phone')
                <span style="color:red">{{$message}}</span>
            @enderror
          </div>
          <div class="input__box">
            <span class="details">Select Course</span>
            <select name="course_type" id="">
              <option value="Website Design">Please Choose</option>
              <option value="Website Design">Website Design</option>
              <option value="Software Development">Software Development</option>
              <option value="Mobile APP Development">Mobile APP Development</option>
              <option value="Digital Marketing">Digital Marketing</option>
              <option value="Graphic Design">Graphic Design</option>
              <option value="NIELIT">NIELIT</option>
              <option value="IoT Training">IoT Training</option>
              <option value="Machine Learning">Machine Learning</option>
              <option value="Data Science">Data Science</option>
            </select>
            @error('course_type')
                <span style="color:red">{{$message}}</span>
            @enderror
          </div>

          <div class="input__box">
            <span class="details">Select Technology</span>
            <select name="technology" id="">
              <option value="Website Design">Please Choose</option>

              <option value="Java">Java</option>
              <option value=".NET">.NET</option>
              <option value="PHP">PHP</option>
              <option value="JavaScript">JavaScript</option>
              <option value="Python">Python</option>
              <option value="C/C++">C/C++</option>
              <option value="C#">C#</option>
            </select>
            @error('technology')
                <span style="color:red">{{$message}}</span>
            @enderror
          </div>

          <div class="input__box">
            <span class="details">Select Stream</span>
            <select name="branch" id="">
              <option value="Website Design">Please Choose</option>

              <option value="B-Tech">B-Tech</option>
              <option value="M-Tech">M-Tech</option>
              <option value="BCA">BCA</option>
              <option value="MCA">MCA</option>
              <option value="Diploma">Diploma</option>
              <option value="Others">Others</option>
            </select>
            @error('branch')
                <span style="color:red">{{$message}}</span>
            @enderror
          </div>
          <div class="input__box full">
            <span class="details">Select Semester</span>
            <select name="semester" id="">
              <option value="Website Design">Please Choose</option>

              <option value="Semester I">Semester I</option>
              <option value="Semester II">Semester II</option>
              <option value="Semester III">Semester III</option>
            </select>
            @error('semester')
                <span style="color:red">{{$message}}</span>
            @enderror
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register" />
        </div>
      </form>
    </div>
  </body>
</html>
