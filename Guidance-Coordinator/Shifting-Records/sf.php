                                 <?php   
session_start();
include '../../GCC/create_form/connect.php';
if(!isset($_SESSION['admin_token'] )){
    header('location:../../session_end.html');
  //
 }
 
 ?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
       <!--<link rel="shortout icon" type="image/x-icon" href="">--> <!---->
            <link href="../../GCC/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../../offline/bootstrap.css" rel="stylesheet" >
    <script src="../../js/jquery.js" ></script>
  <script src="../../offline/popper.js" ></script>
  <script src="../../offline/bootstrap.js" ></script>
<title>Print Student-SF</title>
</head>
<body>

 <style type="text/css" >
   @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap');
    *{
      font-family: 'Cairo', sans-serif;
    }
   
      @media screen and (max-width: 1500px)  { 
         .introduction{
        position: relative;
    }
     .intro {
        text-align: center;
        margin-top: 50px;
        padding-top: 30px;
     }
     .wmsuimg {
        position: absolute;
        left: 300px;
        width: 130px; float: right;
     }
     .gccimg {
        position: absolute;
        right: 320px;
        width: 100px; float: right;
        padding-bottom: : 8px;
     }
     h5 {
          font-family: 'Oswald', sans-serif;
      font-size: 16px;
     text-transform: uppercase;
     font-weight: bolder;
     }
      }

     @media screen and (max-width: 800px) {
    .introduction{
        position: relative;
    }
     .intro {
        text-align: center;
        margin-top: 50px;
        padding-top: 30px;
     }
     .wmsuimg {
        position: absolute;
        left: 40px;
     }
     .gccimg {
        position: absolute;
        right: 50px;
     }

     }
     .forsign {
      font-size: 1px; border-bottom: 1px solid black;padding-right: 300px;
     }
     .ud {
      margin-right: -100px;
     }

     @media print { 
       @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap');

       .pagebreak {
  page-break-after: always;
  

     }
        .introduction{
        position: relative;
    }
     .intro {
        text-align: center;
        margin-top: 5px;
        padding-top: 15px;
     }
     .wmsuimg {
        position: absolute;
        left: 80px;
        width: 120px; float: right;
     }
     .gccimg {
        position: absolute;
        right: 110px;
        width: 90px; float: right;
     }
     h5 {
       font-family: 'Oswald', sans-serif;
      font-size: 15px;
     text-transform: uppercase;
     font-weight: bolder;
     }
     h4 {
        font-size: 17px;
     }
     #zambo {
        font-size: 14px;padding-top: 5px;
     }
     .print{
        display: none;
     }

     #printpages{
        display: none;
     }
     #printpage {
      display: flex;
      max-width: 200%;
     }



.col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
  float: left;
}
.col-sm-12 {
  width: 100%;
}
.col-sm-11 {
  width: 91.66666666666666%;
}
.col-sm-10 {
  width: 83.33333333333334%;
}
.col-sm-9 {
  width: 75%;
}
.col-sm-8 {
  width: 66.66666666666666%;
}
.col-sm-7 {
  width: 58.333333333333336%;
}
.col-sm-6 {
  width: 50%;
}
.col-sm-5 {
  width: 41.66666666666667%;
}
.col-sm-4 {
  width: 33.33333333333333%;
 }
 .col-sm-3 {
   width: 25%;
 }
 .col-sm-2 {
   width: 16.666666666666664%;
 }
 .col-sm-1 {
  width: 8.333333333333332%;
 }

  .forsign {
      font-size: 1px; border-bottom: 1px solid black;padding-right: 300px;
     }
     .ee {
      border-top: 1px solid black;
     }


}

 </style>

  
  <div  class="introduction">
                        
                       
                                 <img class="wmsuimg" style="" src="../img/bgwmsu.jfif">
                                  <img class="gccimg" style="" src="../img/gcc.png">
                                 <div class="intro">
                                  
                                 <h6 >Western Mindanao State University</h6>
                                 <h5>Guidance and Counceling Center </h5>
                                 <span id="zambo" style="">Zamboanga City</span>
                                
                                  
                                 </div> 


                                 <br><br>
                                 <h5 style="text-align: center;font-style: normal;font-weight: bolder;">SHIFTING FORM</h5>

                                 <br>

                                  <div class="container"> 


                                       <div class="row">

                                           <div class="col-md-2"></div> 
                                           <div class="col-md-8" style="">
                                             
                                          
                                            <div class="container">
                                            
                                         <div class="row" style="" id="printpage">

                                           
                                           
                            
                               
                                  
                            
                                 
                                            <?php   
                                    if(isset($_GET['student-sf'])){ 
                                       
                                        $pdsform = $_GET['sftoken'];
                                        $studentid = $_GET['studenttokenid'];
                                       
                                   
                                        
                                       $name = $_GET['studentname'];

                                                $getstudentdata = " select * from student where stud_id = '$studentid'  ";
                                                            $studdata = mysqli_query($con,$getstudentdata); 
                                                            
                                                        
                                                             while($getstud = mysqli_fetch_array($studdata)){
                                                              $age = $getstud['age'];
                                                              $gender = $getstud['gender'];
                                                              $collegeid = $getstud['stud_college'];
                                                              $crse = $getstud['stud_course'];
                                                      
                                                             }

                                                                 $getstudcourse = " select * from course where courseid = '$crse'  ";
                                                                             $gcourse = mysqli_query($con,$getstudcourse); 
                                                                          
                                                                              while($getcourse = mysqli_fetch_array($gcourse)){
                                                                                $course = $getcourse['course'];
                                                                              }
                                                                       
                                                      
                                          

                                               $studentformdata = " select * from form where class_name = '62' and type ='Question'   ";
                                                           $studentdata = mysqli_query($con,$studentformdata); 
                                                       
                                                            while($row = mysqli_fetch_array($studentdata)){
                                                             $query = $row['content'];
                                                            
                                                             
                                                             if(strcasecmp('age', $query) == 0){
                                                               $formid = $row['form_id'];
                                                             

                                                                    $getresponsedata = " select * from form_response where formid = '$formid' ";
                                                                                $responsedata = mysqli_query($con,$getresponsedata); 
                                                                              
                                                                                 while($rpdata = mysqli_fetch_array($responsedata)){
                                                                                 $age =  $rpdata['response'];
                                                                                 $collegeid = $rpdata['CollegeId'];
                                                                                 $course = $rpdata['course'];
                                                                                 }
                                                                          

                                                             }

                                                         

                                                              if(strcasecmp('gender', $query) == 0){
                                                               $formid = $row['form_id'];
                                                                
                                                                    $getresponsedata = " select * from form_response where formid = '$formid' ";
                                                                                $responsedata = mysqli_query($con,$getresponsedata); 
                                                                              
                                                                                 while($rpdata = mysqli_fetch_array($responsedata)){
                                                                                 $gender =  $rpdata['response'];
                                                                                 }
                                                                          

                                                             }



                                                            }

                                                                 $current_college = "SELECT * FROM `colleges` where CollegeId = '$collegeid' ";

                                                              $resultss = mysqli_query($con,$current_college); // run query
                                                             
                                                               while($se = mysqli_fetch_array($resultss)){
                                                                $kolehiyo = $se['college'];
                                                               }


                                                           $studentformdatas = " select * from form where class_name = '60' and type ='Question'   ";
                                                           $studentdatas = mysqli_query($con,$studentformdatas); 
                                                       
                                                            while($row = mysqli_fetch_array($studentdatas)){
                                                             $query = $row['content'];
                                                             $formid = $row['form_id'];
                                                            
                                                             

                                                                 if(strcasecmp('Course to Shift (First Choice)', $query) == 0){
                                                               $formid = $row['form_id'];
                                                                
                                                                    $getresponsedata = " select * from form_response where formid = '$formid' ";
                                                                                $responsedata = mysqli_query($con,$getresponsedata); 
                                                                              
                                                                                 while($rpdata = mysqli_fetch_array($responsedata)){
                                                                                 $coursetoshift =  $rpdata['response'];
                                                                                 }
                                                                          

                                                             }


                                                               
                                                                          


                                                            }

                                                             $getresponsedata = " select * from form_response where formid = '$formid' ";
                                                                                $responsedata = mysqli_query($con,$getresponsedata); 
                                                                              
                                                                                 while($rpdata = mysqli_fetch_array($responsedata)){
                                                                                 $datecreated =  $rpdata['datecreated'];
                                                                                  $cid = $rpdata['CollegeId'];
                                                                                 $shiftcourse = $rpdata['course'];
                                                                                 }

                                                              $toshift_college = "SELECT * FROM `colleges` where CollegeId = ' $cid' ";

                                                              $resultss = mysqli_query($con,$toshift_college); // run query
                                                             
                                                               while($se = mysqli_fetch_array($resultss)){
                                                                $kolehiyotoshift = $se['college'];
                                                               }

                                                     
                                                  
                                       ?> 
                                        <div class="col-sm-6">
                                          <span style="font-size: 14px">Name : <span style="font-weight: bolder;text-transform: uppercase;"><?php echo $name ?></span> </span> <br>
                                          <span style="font-size: 14px">Course : <span style="font-weight: bolder;"><?php if(isset($course)){ echo $course; }else { echo 'Null'; } ?></span></span> <br>

                                          <span style="font-size: 14px">Shifting to : <span style="font-weight: bolder;"><?php if(isset($shiftcourse)){ echo $shiftcourse; }else { echo 'Null'; } ?></span> </span>

                                        </div> 

                                        <div class="col-sm-3">
                                          <span style="font-size: 14px">Age : <span style="font-weight: bolder;"><?php if(isset($age)){ echo $age; }else { echo 'Null'; } ?></span> </span> <br>
                                          <span style="font-size: 14px">Sex : <span style="font-weight: bolder;"><?php if(isset($gender)){ echo $gender; }else { echo 'Null'; } ?></span></span>
                                        </div> 

                                        <div class="col-sm-3">
                                          <span style="font-size: 14px">Date : <span style="font-weight: bolder;"><?php echo date('m-d-Y',strtotime( $datecreated)) ?></span></span>
                                        </div> 
                                       
                                        
                                         <div class="col-sm-12 mt-2">
                                            <h5 style="font-weight: bolder; text-align: center; text-decoration: underline;"> 1. OFFICE OF ADMISSION</h5>
                                         </div>

                                         <h6 style="font-weight: bolder;font-size: 14px"> For:   <div class="container">
                                              <h6 style="font-weight: bolder;font-size: 14px"> The Director</h6> 
                                               <span>Guidance and Counseling Center</span>

                                          </div> </h6> 
                                        
                                          
                                        

                                           <div class="container mt-4">
                                             <h6 style="font-size: 14px">The Academic Record: CET <u style="font-size: 1px; border-bottom: 1px solid black;padding-right: 200px"></u> APPTITUDE<u style="font-size: 1px; border-bottom: 1px solid black;padding-right: 200px"></u> <br><br>


                                              shows that Mr/Ms <span style="font-weight: bolder; text-decoration: underline;text-transform: uppercase;"><?php echo $name ?></span>  can shift to another course.

                                              <br>
                                              <p></p>
                                               <div class="col-sm-4"></div> 
                                                <div class="col-sm-4"></div> 
                                               
                                               <div class="col-sm-4 mt-5" style="text-align: center;float: right;">
                                                 <div class="" style=""> 
                                                 
                                                    <h6 style="font-weight: bolder;  text-decoration: underline;"> DR. VICENTA T. ESCOBAR</h6>
                                            
                                              
                                                <h6 style="font-size: 14px" >Dean of Admissions <br>
                                                  (<span style="font-style: italic;font-size: 13px"> Signature over printed name</span>)

                                                </h6></div>

                                                <h6 class="mt-5" style="font-size: 14px;text-align: left;">Date<u style="font-size: 1px; border-bottom: 1px solid black;padding-right: 250px"></u></h6>
                                               </div> 


                                               <br>


                                              
                                                   
                                                
                                                
                                               
                                             



                                              </h6>
                                           </div> 

                                           <hr class="mt-1 " style="height: 3px;border-bottom: 1px solid black">
                                        

                                              

                                         <div class="col-sm-12 mt-1">
                                            <h5 style="font-weight: bolder; text-align: center; text-decoration: underline;"> 2. COLLEGE ENROLLED</h5>
                                         </div>
                                         
                                             <h6 style="font-weight: bolder;font-size: 14px"> For:   <div class="container">
                                              <h6 style="font-weight: bolder; font-size: 14px"> The Dean</h6> 
                                               <span>College: <span style="font-weight: bolder;text-decoration: underline;text-transform: uppercase;"><?php echo  $kolehiyotoshift ?></span></span>

                                          </div> </h6> 

                                           <div class="container mt-5" style="text-align: center;">
                                            
                                            <h6 style="font-size: 14px">For your information, please see  attached dowloaded grades.</h6>
                                           </div> 

                                            <br>
                                              <p></p>
                                               <div class="row mt-2" >
                                                 <div class="col-sm-4"></div> 
                                                 <div class="col-sm-4"></div> 
                                                 <div class="col-sm-4">
                              <h6 style="font-weight: bolder;  text-decoration: underline;text-align: left;font-size: 14px">Certified:</h6><br>
                                                    
                                                     <div class="mb-2 ud" style="text-align: center;float: right;"> 
                                                    <u class="forsign" style=""></u> <br>
                                                      (<span class="ee" style="font-style: italic;font-size: 13px"> Signature over printed name</span>) <br>
                                                <span  style="font-size: 14px;font-weight: bolder;text-align: center;">Dean
                                                

                                                </span>
                                                    </div>

                                                <h6 class="" style="font-size: 13px" >College:<span style="font-weight: bolder;text-decoration: underline;text-transform: uppercase;"><?php echo $kolehiyo ?></span></h6>
                                                <h6 class="" style="font-size: 13px" >Date<u style="font-size: 1px; border-bottom: 1px solid black;padding-right: 250px"></u></h6>
                                                 </div> 
                                                 
                                                
                                                 
                                           
                                               </div> 

                                               <p><br><br></p>
                                                 <div class="col-sm-12 mt-1">
                                            <h5 style="font-weight: bolder; text-decoration: underline;"> 4. RECEIVING COLLEGE</h5>
                                            <br>
                                            <h6 style="font-size: 14px">For : <span style="font-weight: bolder"> The Dean of Admission</span></h6>
                                         </div>

                                         <br>

                                            <p style="font-size: 14px" class="mt-4">
                                              Based on the results of the screening in this College, the Committee's decision is that <br>
                                              Mr/Ms. <span style="font-weight: bolder; text-decoration: underline;text-transform: uppercase;"><?php echo $name ?></span> is accepted/not accepted to the <span style="font-weight: bolder;text-decoration: underline;"><?php if(isset($shiftcourse)){ echo $shiftcourse; }else { echo 'Null'; } ?></span>.
                                            </p>

                                             <div class="row mt-2" >
                                                 <div class="col-sm-4"></div> 
                                                 <div class="col-sm-4"></div> 
                                                 <div class="col-sm-4">
                             
                                                    
                                                     <div class="mb-2 ud" style="text-align: center;float: right;"> 
                                                    <u class="forsign" style=""></u> <br>
                                                      (<span class="ee" style="font-style: italic;font-size: 13px"> Signature over printed name</span>) <br>
                                                <span  style="font-size: 14px;font-weight: bolder;text-align: center;">Dean
                                                

                                                </span>
                                                    </div>
                                                <h6 class="" style="font-size: 13px" >College:<span style="font-weight: bolder;text-transform: uppercase;"><?php echo  $kolehiyotoshift ?></span></h6>
                                                <h6 class="" style="font-size: 13px" >Date<u style="font-size: 1px; border-bottom: 1px solid black;padding-right: 250px"></u></h6>
                                                 </div> 
                                                 
                                                
                                                 
                                           
                                               </div> 


                                           <div class="container mt-5">
                                              <h5 style="font-weight: bolder; ">REASONS:</h5>

                                             <h6 style="font-size: 14px">
                                               <div class="row">
                                                  <div class="col-sm-6">
                                                      <u style="font-size: 1px; border-bottom: 1px solid black;padding-right: 60px"></u> DID NOT meet the grade requirments <br>
                                                 <u style="font-size: 1px; border-bottom: 1px solid black;padding-right: 60px"></u> DID NOT meet other requirment <br>
                                                  <u style="font-size: 1px; border-bottom: 1px solid black;padding-right: 60px"></u> ACCEPTED AND PASSED screening
                                                  </div> 
                                                  <div class="col-sm-6">
                                                      <u style="font-size: 1px; border-bottom: 1px solid black;padding-right: 60px"></u> No vacant slot
                                                   <br>
                                                    <u style="font-size: 1px; border-bottom: 1px solid black;padding-right: 60px"></u> Failed in interview
                                                  </div> 
                                                  
                                               </div> 
                                               
                                              
                                                  
                                                 


                                             </h6>
                                           </div> 
                                                 

                                       <?php



                                   }
                                     ?>

                                      <div class="" style="text-align: center;">
                                                     
                                                    <span style="font-size: 14px"></span>
                                                    </div> 

                                                  </div> 

                                                  
                                                   </div>    
                                           </div> 
                                           <div class="col-md-2"></div>     
                                            

                                        </div>      
                                          
                                 
                                   </div> 
                             
                            


                                       
                     </div>  
                     
                    <button class="btn btn-primary print" id="printpages" style="font-size: 15px;position: fixed;z-index: 9999;top: 150px;right:30px; "> PRINT <i class="fas fa-print"></i></button>


<script src="../../js/jquery.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
      $('#printpages').click(function() { 
    window.print();
   
    })
  });
  
//window.print();      
        
</script>

</body>
</html>