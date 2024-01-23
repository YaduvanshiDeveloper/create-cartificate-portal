<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Softflew - Certificate</title>
  <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'> -->
  <link rel="stylesheet" href="{{asset('certificate/style.css')}}">
   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
   <style>
        @font-face {
            font-family: FTR-Regular;   
            src: url('certificate/font/35-FTR-Regular.otf');
        }

#animate {
    width: 36px;
    height: 38px;
    background: #1009097a;
   
    color: white;
    position: relative;
    border-radius: 30px;
    animation-name: animate;
    animation-duration: 2s;
  animation-iteration-count: infinite;
}
#animate:hover {
      animation: none; 
    }
@keyframes animate {
    0%, 20%, 50%, 80%, 100% {
    transform: translateY(0);
  }
	40% {
    transform: translateY(-30px);
  }
	60% {
    transform: translateY(-15px);
  }
}
.top{

    position: absolute;
    top: 40px;
    right: 50px;
    z-index: 3;
    display: inline-block;
}


   </style>
   <style>
  .ui-tooltip, .arrow:after {
    background: black;
    border: 2px solid white;
  }
  .ui-tooltip {
    padding: 10px 20px;
    color: white;
    border-radius: 20px;
    font: bold 14px "Helvetica Neue", Sans-Serif;
    text-transform: uppercase;
    box-shadow: 0 0 7px black;
  }
  .arrow {
    width: 70px;
    height: 16px;
    overflow: hidden;
    position: absolute;
    left: 50%;
    margin-left: -35px;
    bottom: -16px;
  }
  .arrow.top {
    top: -16px;
    bottom: auto;
  }
  .arrow.left {
    left: 20%;
  }
  .arrow:after {
    content: "";
    position: absolute;
    left: 20px;
    top: -20px;
    width: 25px;
    height: 25px;
    box-shadow: 6px 5px 9px -9px black;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
  }
  .arrow.top:after {
    bottom: -20px;
    top: auto;
    
  }
  </style>
</head>
<body id="click">
<!-- partial:index.partial.html -->
<div class="top">
            <button data-toggle="tooltip" data-placement="top" title="Dwonload Your Certificate" onclick="download()" id="animate" class="btn " style="float:right;"> <i class="fa fa-chevron-down fa-stack-1x" style="top: 8px;font-size: 15px;"> </i> </button>
           </div>
<div class="certificate-container" id="certificate-container"> 
    <div class="certificate">
        <div class="water-mark-overlay"></div>
        <!-- header -->
        <div class="certificate-header">
            <img src="{{asset('certificate/img/softflew-logo.png')}}" class="logo" alt="">
            <img src="{{asset('certificate/img/certified.png')}}" class="certified" alt="" >
          
        </div>
       
        <!-- Boby Content -->
     
        <div class="certificate-body">
       
    
    
            <h1 class="certiﬁcate_title">Certificate </h1>
           
            
            <p class="training-type"><span style="font-weight: 400; color: #c0c0c0; position: relative; top: -12px; ">________</span> OF <span style="color: #3B58AF; font-weight: 700;">Summer</span> <span style="color: #ED1C24; font-weight: 700;">Training</span> <span style="font-weight: 400; color: #c0c0c0; position: relative; top: -12px; ">________</span></p>
            <h3 class="Congrat">Congratulations</h3>
            <h2 class="user-name">{{$student->student_id}}</h2>
            <div class="certificate-content">
                <p class="discription">
                    Had successfully completed {{$student->course_type}} on
                    <span style="border-bottom: 3px solid #3a57ad; min-width: 200px; height: 7px; ">{{$student->course}}</span><br> with <span style="color: #3B58AF;">SOFTFLEW TECHNOLOGIES &</span> <span style="color: #CF3339;">TRAINING INSTITUTE</span>.
                        <br>
                        Wish him/her a very successful career in IT industry
                </p>
        
      
            </div>
        </div>
    
        <!-- Footer -->
        <div class="footer">
            <div class="certificate-footer">
                <div class="footer-item">
                    <div class="certified-id">
                        <div class="img">
                            <img src="{{asset('certificate/img/CERT.png')}}" alt="">
                        </div>
                        <div class="text">
                            <h5>CERTIFIED</h5>
                            <p>Cert ID :  <span style="
                                border-bottom: 2px solid #c0c0c0;
                                min-width: 50px;
                                height: 7px;
                                display: inline-table;
                                font-weight: 600;
                            ">{{$student->certificate_id}}</span></p>
                        </div>
                    </div>
                    <div class="trainer">
                        <p style=" border-bottom: 2px solid #c0c0c0; min-width: 50px; height: 7px; display: inline-table; font-weight: 600; padding-bottom: 10px;
                        font-size: 20px;">
                        Mohd Yusuf
                       </p>
                        <p>TRAINER</p>
                    </div>
                    <div class="ceo-sign">
                        <img src="{{asset('certificate/img/stamp.png')}}" alt="">
                        <p style="
                            border-bottom: 2px solid #c0c0c0;
                            min-width: 165px;
                            height: 7px;
                        ">
                        <p>Mr. Mohd Zubair<br>
                            (CEO)</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-shape-bg">
        </div>
        <!-- Line Shap Section -->
        <div class="left-border">
        </div>
        <div class="left-bottom-border">
        </div>
        <div class="right-border">
        </div>
        <div class="right-top-border">
        </div>
        <!-- End Line Shap Section -->
        <!-- Image and Corner Shape -->
        <div class="top-shape-img">
            <img src="{{asset('certificate/img/top-shape.png')}}" alt="">
        </div>
        <div class="bottom-shape-bg">
        </div>
        <div class="bottom-shape-img">
            <img src="{{asset('certificate/img/bottom-shape.png')}}" alt="">
        </div>
        <!-- Image and Corner Shape -->
       
    </div>
   
</div>
<!-- partial -->
 
</body>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
 function download(){
 var tooltip = $('[data-toggle="tooltip"]').tooltip("close");

  $('#animate').hide();
   
        var element = document.getElementById('certificate-container');
        var opt = {
        margin:       0.10,
        filename:     'myfile.pdf',
        image:        { type: 'pdf', quality: 0.98 },
        html2canvas:  { scale: 1 },
        jsPDF:        { unit: 'in', format: 'A4', orientation: 'landscape'}
        };

        // New Promise-based usage:
        html2pdf().set(opt).from(element).save();

       
    

    
  }
  $(function() {
   $('[data-toggle="tooltip"]').tooltip({
      position: {
        my: "center bottom-20",
        at: "center top",
        using: function( position, feedback ) {
          $( this ).css( position );
          $( "<div>" )
            .addClass( "arrow" )
            .addClass( feedback.vertical )
            .addClass( feedback.horizontal )
            .appendTo( this );
        }
      }
    });
  });

</script>
</html>
