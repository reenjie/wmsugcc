<?php   
session_start();
include '../create_form/connect.php';
 //include '../encrypt/sfgcc.php';
 //$enc =  new encryptdata();

if(!isset($_SESSION['admingcc_token'])) {
    header("location:../../session_end.html");
  }
  



 ?>
<!DOCTYPE html>
<html>

<head>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    	 <!--<link rel="shortout icon" type="image/x-icon" href="">--> <!---->
    	  <script src="../../offline/fontawesome.js" ></script>
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

     }

 </style>

  <div  class="introduction">
                        
                       
                                 <img class="wmsuimg" style="" src="../img/bgwmsu.jfif">
                                  <img class="gccimg" style="" src="../img/gcc.png">
                                 <div class="intro">
                                  
                                 <h4 >Western Mindanao State University</h4>
                                 <h5>Guidance and Counceling Center </h5>
                                 <span id="zambo" style="">Zamboanga City</span>
                                
                                  
                                 </div> 


                                 <br><br>
                                 <h5 style="text-align: center;font-style: normal;font-weight: bolder;">
                                     
                                     <?php 
                                        if(isset($_GET['student-pds'])){ 
                                         $studenttokenid = $_GET['studenttokenid'];
                                        $pdstoken = $_GET['pdstoken'];
                                        if($pdstoken == '60'){
                                            echo 'SHIFTING PROFILE';
                                                 date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admingcc_token'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `date-modified`,`manage_fields`) 
                    VALUES ('$studenttokenid','$token','GCC','Viewed Shifting Profile','$date_m','View-Print-Modify')";
                    mysqli_query($con,$save_to_logs);
                                        }else {
                                            echo 'PERSONAL DATA FORM';

                     date_default_timezone_set('Asia/Manila'); 
                    $date_m = date('Y-m-d H:i:s');
                     $token =  $_SESSION['admingcc_token'];
                    $save_to_logs = "INSERT INTO `logs`(`stud_id`, `admin_id`, `admin_type`, `content`, `date-modified`,`manage_fields`) 
                    VALUES ('$studenttokenid','$token','GCC','Viewed Personal Data Sheets','$date_m','View-Print-Modify')";
                    mysqli_query($con,$save_to_logs);
                                        }



                                    }

                                      ?>
                                 </h5>

                                 <br>

                                  <div class="container"> 


                                       <div class="row">

                                           <div class="col-md-2"></div> 
                                           <div class="col-md-8" style="">
                                             
                                          
                                            <div class="container">
                                            
                                         <div class="row" style="">

                                             <div class="col-md-2"></div> 
                                           
                            
                               
                                  
                            
                                 
                                            <?php   
                                    if(isset($_GET['student-pds'])){ 
                                       
                                        $pdstoken = $_GET['pdstoken'];
                                        $studenttokenid = $_GET['studenttokenid'];
                                        $studentid = $_GET['id'];
                                     //  $pdsform = $enc -> decryption($pdstoken,"gccformtoken");
                                     //  $studentid = $enc -> decryption($studenttokenid,"gccstudenttoken");
                                          
                                      
                                    
                                       $display_to_session = "select * from form where   type = 'section' and class_name='$pdstoken' ";
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
                                                    <h6 class="mb-4" style="font-weight: bolder;font-style: normal;border-left-color:1px solid green"> <?php echo $sectioncontent[$i] ?>
                                                      
                                                    <br>
                                                    <span style="font-size:15px"><?php 
                                                    if($others[$i] == 'Other supporting contents'){

                                                    }else {
                                                        echo $others[$i];
                                                    }

                                                   ?></span>

                                                    </h6>
                                                     
                                                         

                                                          <?php 

                              $sql = " select * from form where sec_no ='$secount[$i]' and  class_name ='$pdstoken' and type !='section'  order by display_order  ";
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

                                        echo  $othersdata;
                                      

                                       // echo $row['content'];

                                        $checkifanswered = " SELECT * FROM `form_response` where formid = '$formid' and userid='$studentid' and tble = 0 and list = 0  and csformid = '$pdstoken' ";
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
                     
                 

</body>
</html>