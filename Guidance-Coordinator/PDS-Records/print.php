<?php   
session_start();
include '../../GCC/create_form/connect.php';
 include '../encrypt/sfgcc.php';

 if(!isset($_SESSION['admin_token'] )){
    header('location:../../session_end.html');
  //
 }
 $enc =  new encryptdata();
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
<title>Print Student-PDS</title>
</head>
<body>

 <style type="text/css" >
   @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap');
    *{
      font-family: 'Cairo', sans-serif;
    }

      .intro {
        text-align: center;
        margin-top: 50px;
        padding-top: 30px;
     }
     .wmsuimg {
        position: absolute;
        left: 30%;
        width: 130px; float: right;
     }
     .gccimg {
        position: absolute;
        right: 30%;
        width: 100px; float: right;
        padding-bottom: : 8px;
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
         font-weight:bolder;
         text-transform:uppercase;
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

     @media print { 
       @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap')
        .introduction{
        position: relative;
    }
    /*@page { size: auto;  margin: 0mm; }*/
     .intro {
        text-align: center;
        margin-top: 50px;
        padding-top: 25px;
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
      font-size: 16px;
   font-weight:bolder;
     }
     h4 {
        font-size: 18px;
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
     
    @page { margin: 600mm;
    
   
       
        
    } 
   
  

footer {page-break-after: always;}

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



     }

 </style>

  
  <div  class="introduction">
                        
                       
                                 <img class="wmsuimg" style="" src="../img/bgwmsu.jfif">
                                  <img class="gccimg" style="" src="../img/gcc.png">
                                 <div class="intro">
                                  
                                 <h4 >Western Mindanao State University</h4>
                                 <h5 style="">Guidance and Counseling Center </h5>
                                 <span id="zambo" style="">Zamboanga City</span>
                                
                                  
                                 </div> 


                                 <br><br>
                                 <h5 style="text-align: center;font-style: normal;font-weight: bolder;">PERSONAL DATA FORM</h5>

                                 <br>

                                  <div class="container"> 


                                       <div class="row">

                                           <div class="col-md-2"></div> 
                                           <div class="col-md-8" style="">
                                             
                                          
                                            <div class="container">
                                            
                                         <div class="row" style="" id="printpage">

                                           
                                           
                            
                               
                                  
                            
                                 
                                            <?php   
                                    if(isset($_GET['student-pds'])){ 
                                       
                                        $pdstoken = $_GET['pdstoken'];
                                        $studenttokenid = $_GET['studenttokenid'];
                                       
                                         $studentid = $_GET['id'];
                                       $pdsform = $enc -> decryption($pdstoken,"gccformtoken");
                                      // $studentid = $enc -> decryption($studenttokenid,"gccstudenttoken");
                                       $display_to_session = "select * from form where   type = 'section' and class_name='$pdsform' ";
                                               $dsp = mysqli_query($con,$display_to_session); 
                                                while($bysec = mysqli_fetch_array($dsp)){
                                               $secount[]= $bysec['sec_no'];
                                               $sectioncontent[] = $bysec['content'];
                                                 $others[] = $bysec['others'];
                                             //  $dateresponded[] = $bysec['datecreated'];
                                                 }
                                                // print_r($secount);

                                                 for($i = 0 ; $i<count($secount);$i++){
                                                  

                                                  ?>
                                                    <h6 class="mb-4" style="font-weight: bolder;font-style: normal;border-left-color:1px solid green"> <?php echo $sectioncontent[$i] ?></h6>
                                                    <br>
                                                      <span style="font-size:15px"><?php 
                                                    if($others[$i] == 'Other supporting contents'){

                                                    }else {
                                                        echo $others[$i];
                                                    }

                                                   ?></span>
                                                     
                                                         

                                                          <?php 

                              $sql = " select * from form where sec_no ='$secount[$i]' and  class_name ='$pdsform' and type !='section'  order by display_order  ";
                            $result = mysqli_query($con,$sql); 
                           
                                               while($row = mysqli_fetch_array($result)){

                                      $formid = $row['form_id'];
                                    //  echo $formid;
                                      $dd = $row['type'];
                                      $isreq = $row['isrequired'];
                                      $status = $row['status'];
                                      $bgsrc = '../img/uploads/'.$row['bgimage'];
                                      $bgtcolor = $row['bgcolor'];
                                      $txttcolor = $row['txtcolor'];
                                      $yaxis = $row['yaxis'];
                                      $isvisible = $row['isvisible'];
                                      $secno = $row['sec_no'];
                                      $othersdata = $row['others'];
                                      $ismodifiable = $row['ismodifiable'];
                                      $section = $row['section'];
                                      $type= $row['type'];
                                      $isspecified = $row['isspecified'];
                                        if($yaxis == ''){
                                          $posbg = 'center';
                                        }else {
                                          $posbg = $yaxis.'px';

                                        }


                                       // echo $row['content'];

                                        $checkifanswered = " SELECT * FROM `form_response` where formid = '$formid' and userid='$studentid' and tble = 0 and list = 0  and csformid = '$pdsform' ";
                                      $ans = mysqli_query($con,$checkifanswered); // run query
                                      $cans= mysqli_num_rows($ans); // to count if necessary
                                     //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                                   if ($cans>=1){
                                    //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                                       while($res = mysqli_fetch_array($ans)){
                                $rescontent =  $res['response'];  
                                $frmid= $res['formid'];
                                $tid = $res['pds_id'];

                               include 'answered.php';
                              //echo $rescontent;
                                       }
                                    

                                }else {

                                
                                  

                                  include 'selectsectionactive.php';



                                } 


                                          }


                                                           ?>



                                                    <hr style="height: 3px; background-color: #000203"> 
                                                  
                                                  <?php




                                                 }


                                 
                                    }




                                     ?>

                                      <div class="" style="text-align: center;">
                                                     
                                                    <span style="font-size: 14px">End of File</span>
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