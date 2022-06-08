<?php 
session_start();
include '..//create_form/connect.php';
 if(!isset( $_SESSION['admin_token'] )){
  //
 }




 ?>
<!DOCTYPE html>
<html lang="en">


 <?php
  include '../include/assets/head.php';
 
 ?>
<style type="text/css">

   @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap');

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


    *{
      font-family: 'Cairo', sans-serif;
    }
        @media screen and (max-width: 768px){
      #college{
        font-size: 14px;
      } 
      #title {
        font-size: 20px;
      } 
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
     .zambo {
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

 #coachform {
    display: none;
 }

#ptop{
       display: none;
     }


     }
</style>

<body id="page-top" >

    <!-- Page Wrapper -->
    <div id="wrapper">

             <button class="btn btn-primary print" id="printpages" style="font-size: 15px;position: fixed;z-index: 9999;top: 150px;right:30px;width: 150px; "> PRINT <i class="fas fa-print"></i></button>

           

 <script src="../../js/jquery.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
      $('#printpages').click(function() { 
    window.print();
   
    })

      
  });
    
//window.print();      
        
</script>

        <div class="container">
                <img class="wmsuimg" style="" src="../img/bgwmsu.jfif">
                                  <img class="gccimg" style="" src="../img/gcc.png">
                                 <div class="intro">
                                  
                                 <h4 >Western Mindanao State University</h4>
                                 <h5 style="">Guidance and Counseling Center </h5>
                                 <span class="zambo" style="">Zamboanga City</span>
                                
                                  
                                 </div> 
            <div class="row">

                <div class="col-sm-1 col-md-2"></div>
                <div class="col-sm-10 col-md-8">


         


                               <br>
                                 <h5 style="text-align: center;font-style: normal;font-weight: bolder;">REFERRAL FORM</h5>

                                 
                               
                               

                                <h6>
                            <?php 


                                         if(isset($_GET['tokenid'])){
                                            $tokenid = $_GET['tokenid'];
                                            $id = $_GET['id'];
                                            $stats = $_GET['status'];
                                          
                                          

                                                     $sql = " SELECT * FROM `student` ";
                                                              $result = mysqli_query($con,$sql); 
                                                             while($row = mysqli_fetch_array($result)){
                                                                  $studentid = $row['stud_id'];
                                                                  $ln = $row['stud_lname'];
                                                                  $fn = $row['stud_fname'];
                                                                  $mn = $row['stud_mname'];
                                                                  $em = $row['stud_email'];
                                                                  $age = $row['age'];
                                                                  $gender = $row['gender'];
                                                                  $status = $row['status'];
                                                                  $contactno = $row['contact_no'];
                                                               //  $studemail = substr($student_email, 0, strpos($student_email,'@'));


                                                            }




                                         }
                                        

                                $getrefdata = " select * from referral where stud_id = '$id' and cs = 0 and status = '$stats' and ref_hist ='$tokenid' ";
                                            $gettingrefdata = mysqli_query($con,$getrefdata); 
                                          
                                        
                                             while($row = mysqli_fetch_array($gettingrefdata)){
                                                 $type=$row['type'];
                                                 $_SESSION['referral_history'] = $row['ref_hist'];

                                                 $gccollege = $row['CollegeId'];
                                                 if($type=='class'){
                                                   $cl = $row['class'];
                                                    $clid = $row['ref_id'];
                                                   }

                                                   if($type == 'dateset'){
                                                   
                                                    $ds = $row['date_set'];
                                                   }

                                                   if($type== 'yearsec'){
                                                    $ys = $row['yrsec'];
                                                    $ysid = $row['ref_id'];
                                                   }
                                                   if($type == 'parent'){
                                                    $pr = $row['parent'];
                                                    $prid = $row['ref_id'];
                                                   }
                                                   if($type== 'telno'){
                                                    $tn = $row['celtel_no'];
                                                    $tnid = $row['ref_id'];
                                                   }

                                                   if($type == 'table'){
                                                    $refid[] = $row['ref_id'];
                                                    $prob[] = $row['prob'];
                                                    $freq[] = $row['frequency'];
                                                    $remarks[] = $row['remarks'];
                                                   }
                                                   if($type == 'referredby'){
                                                    $refby = $row['refby'];
                                                    $refbyid = $row['ref_id'];
                                                   }

                                                   if($type == 'actiontaken'){
                                                    $actkn = $row['action_taken'];
                                                     $actknid = $row['ref_id'];
                                                   }


                                             }
                                      

                             ?>

                                      <div class="row">
                                         <div class="col-sm-6"></div> 
                                          <div class="col-sm-2"></div> 
                                          
                                         <div class="col-sm-4 mb-4">
                                            <?php date_default_timezone_set('Asia/Manila'); ?>
                                          
                                            <h6 style="text-align: center;">
                                            Date : <span style="text-transform: uppercase;font-style: italic;"><?php echo $ds ?></span> 
                                                </h6>
                                         </div> 
                                        
                                         <div class="col-sm-6">
                                                Name : <span style="text-transform: uppercase;font-style: italic;"><?php echo $ln.' '.$fn.' '.$mn ?></span> 
                                         </div> 
                                          <div class="col-sm-6">
                                                Course: 
                                                <span style="font-style: italic;">
                                                <?php 
                                                        $getcourse = " select * from student where stud_id = '$id'  ";
                                                                $gcourse = mysqli_query($con,$getcourse); 
                                                              
                                                                 while($row = mysqli_fetch_array($gcourse)){
                                                                        $cid = $row['stud_course'];
                                                                        $address = $row['street'].','.$row['barangay'].' '.$row['city'].','.$row['zipcode'];
                                                 $contactno = $row['contact_no'];
                                                                 }
                                                                        $fgetcourse = " select * from course where courseid = '$cid'  ";
                                                                                $gfcourse = mysqli_query($con,$fgetcourse); 
                                                                            
                                                                                 while($row = mysqli_fetch_array($gfcourse)){
                                                                                    echo $row['course'];
                                                                                 }
                                                                          

                                                          

                                                 ?>
                                                 </span>
                                          </div> 

                                           <div class="col-sm-6">
                                                    
                                            

                                              Class (Subject) : <span style="font-style:italic;text-transform: uppercase;"><?php echo $cl ?></span>

                                           </div> 
                                              <div class="col-sm-6">
                                                    
                                             
                                                Year & Section : <span style="font-style:italic;text-transform: uppercase;"><?php echo $ys ?></span>

                                           </div> 

                                             <div class="col-sm-6">
                                                    
                                               
                                                Parent/ Guardian : <span style="font-style:italic;text-transform: uppercase;"><?php echo $pr ?></span>
                                           </div> 
                                             <div class="col-sm-6">
                                                  Home Address :  <span style="font-style: italic;text-transform: uppercase;"><?php echo $address ?></span>
                                                

                                           </div> 

                                            <div class="col-sm-6 mb-2">
                                                    
                                        <!--        <input style="font-size: 13px" type="text" name="telno" id="telno" class="form-control mt-2" placeholder="Cell/Tel. Number" required="" value="<?php echo $tn ?>" data-id="<?php echo $tnid ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11"> -->

                                Contact No : <?php echo  $contactno ?>


                                           </div> 
                                           
                                           
                                         
                                      </div> 
                                        
                                        <hr>

                                      <div class="" >Please fill in the appropriate column and specify reason for referral.</div>
                                      
                                        <div class="table-responsive">
                                        
                                       <table class="table table-sm table-borderless">
                                          <thead>
                                            <tr>
                                              <th scope="col"><span style="text-transform: uppercase;">Presenting Problem</span></th>
                                              <th scope="col"><span style="text-transform: uppercase;">Frequency</span></th>
                                              <th scope="col"><span style="text-transform: uppercase;">Remarks</span></th>
                                             
                                            </tr>
                                          </thead>
                                          <tbody>
                                                <?php 
                            if(isset($prob)){

                              for($i = 0; $i < count($refid); $i ++){
                                ?>
                                <tr>
                                  <td><span style="font-size:13px"><?php echo $prob[$i] ?></span></td>
                                    <td>
                           

                           <h6 class="form-control" style="font-size: 13px;border: none;border-bottom: 1px solid grey; border-radius: 0px;"><?php echo $freq[$i] ?></h6>


                          </td>
                          <td>

                             <h6 class="form-control" style="font-size: 13px;border: none;border-bottom: 1px solid grey; border-radius: 0px;"><?php echo $remarks[$i] ?></h6>
                          </td>
                                </tr>
                                <?php
                              }


                            }


                             ?>
                                          </tbody>
                                        </table>
                                       
                                            </div> 
                                    

                                     <div class="row ">
                                             <div class="col-sm-6">
                                                Referred to : <br> 
                                                <?php 
                                                    $getcollege_name = "select * from administrator where  CollegeId = '$gccollege' ";
                                                     $gettingcollege = mysqli_query($con,$getcollege_name); 
                                                   
                                                 while($gcol = mysqli_fetch_array($gettingcollege)){
                                                                 echo $gcol['admin_lname'].' '.$gcol['admin_fname'];       
                                                     }
                                                    
                                                 


                                                 ?>
                                                 <br>
                                                <span style="font-size: 12px">(Guidance Coordinator)</span>
                                             </div> 
                                              <div class="col-sm-6">
                                                Referred by : 
                                                <h6 class="form-control" style="font-size: 14px;border: none;border-bottom: 1px solid grey; border-radius: 0px;"><?php echo $refby ?></h6>
                                              </div> 

                                               <div class="col-sm-6">
                                                College :
                                                <?php 
                                                    $get_collegename = "select * from colleges where CollegeId = '$gccollege'  ";
                                                     $gettingcollegename = mysqli_query($con,$get_collegename); 
                                                    
                                                 while($coll = mysqli_fetch_array($gettingcollegename)){
                                                                        
                                                     }
                                                
                                                 

                                                 ?>
                                               </div> 
                                               <div class="col-sm-6"></div> 
                                               
                                                <div class="col-sm-12 ">
                                                    Action Taken :

                                                    <div class="card">
                                                        <div class="card-body">
                                                            <?php echo $actkn ?> 

                                                        </div>
                                                    </div>
                                                </div> 
                                                
                                             

                                     </div> 


                                     

                                    <br>
                                   
                                    
                                </h6> 
                                <p><br><br><br><br><br></p>
                                 <p><br></p>
                                 <p></p>

                                
                                
                                <?php 

                             // echo $id.$ln.$fn.$mn.$em;

                                 ?>

                                   </div>
                <div class="col-sm-1 col-md-2"></div>
            </div>
                             </div> 



                    

    </div>
    <!-- End of Page Wrapper -->

       <div class="container">
                <img class="wmsuimg" style="" src="../img/bgwmsu.jfif">
                                  <img class="gccimg" style="" src="../img/gcc.png">
                                 <div class="intro">
                                  
                                 <h4 >Western Mindanao State University</h4>
                                 <h5 style="">Guidance and Counseling Center </h5>
                                 <span class="zambo" style="">Zamboanga City</span>
                                
                                  
                                 </div> 
            <div class="row">

                <div class="col-sm-1 col-md-2"></div>
                <div class="col-sm-10 col-md-8">


         


                               <br>
                                 <h5 style="text-align: center;font-style: normal;font-weight: bolder;">COACHING FORM</h5>

                                 
                               
                               

                                
                               <?php

                                $getrefdatas = " select * from referral where stud_id = '$id' and cs = 1 and status = '$stats' and ref_hist ='$tokenid' ";
                                            $gettingrefdatas = mysqli_query($con,$getrefdatas); 
                                          
                                        
                                             while($row = mysqli_fetch_array($gettingrefdatas)){
                                                    $type=$row['type'];
                                                   $ds = $row['date_set'];
                                                 if($type == 'father'){
                                                   $father = $row['prob'];
                                                   $fatherid = $row['ref_id'];
                                                   $fatherocc = $row['frequency'];
                                                    $fathercntact = $row['remarks'];
                                                 }


                                               


                                                 if($type == 'mother'){
                                                    $mother = $row['prob'];
                                                   $motherid = $row['ref_id'];
                                                   $motherocc = $row['frequency'];
                                                  $mothercntact = $row['remarks'];
                                                 }

                                                 if($type == 'guardian'){
                                                       $guardian = $row['prob'];
                                                   $guardianid = $row['ref_id'];
                                                   $guardianocc = $row['frequency'];
                                                  $guardiancntact = $row['remarks'];
                                                 }


                                                 if($type== 'noofbrother'){
                                                    $noofbrother = $row['prob'];
                                                    $noofbrotherid = $row['ref_id'];
                                                 }

                                                 if($type== 'noofsister'){
                                                    $noofsister = $row['prob'];
                                                    $noofsisterid = $row['ref_id'];
                                                 }

                                                 if($type== 'ordinalposition'){
                                                    $ordinalposition = $row['prob'];
                                                    $ordinalpositionid = $row['ref_id'];
                                                 }

                                                 if($type== 'referredby'){
                                                    $referredby = $row['refby'];
                                                    $referredbyid = $row['ref_id'];
                                                 }


                                                 if($type=='sotp'){
                                                    $sotp = $row['prob'];
                                                    $sotpid = $row['ref_id'];
                                                 }

                                                 if($type== 'evaluation'){
                                                    $eva = $row['prob'];
                                                    $evaid =$row['ref_id'];
                                                 }
                                                 if($type=='actiontaken'){
                                                    $acttaken = $row['prob'];
                                                    $acttakenid = $row['ref_id'];

                                                 }
                                                 if($type== 'followup'){
                                                    $followup = $row['prob'];
                                                    $followupid = $row['ref_id'];
                                                 }

                                                 if($type == 'gcsignature'){
                                                    $esign = $row['prob'];
                                                 }


                                             }
                                      

                                ?>
                                   

                             
    <h6>
                                      <div class="row">
                                         <div class="col-sm-6"></div> 
                                          <div class="col-sm-2"></div> 
                                          
                                         <div class="col-sm-4">
                                            <?php date_default_timezone_set('Asia/Manila'); ?>
                                           
                                            <h6 style="text-align: center;">
                                                Date : <span style="font-style:italic;"><?php echo $ds ?></span>
                                            </h6>
                                         </div> 
                                         
                                         <div class="col-sm-6">
                                                Name : <span style="text-transform: uppercase;font-style: italic;"><?php echo $ln.' '.$fn.' '.$mn ?></span> 
                                         </div> 
                                          <div class="col-sm-6">
                                                Course & Year: 
                                                <span style="font-style: italic;">
                                                <?php 
                                                        $getcourse = " select * from student where stud_id = '$id'  ";
                                                                $gcourse = mysqli_query($con,$getcourse); 
                                                              
                                                                 while($row = mysqli_fetch_array($gcourse)){
                                                                        $cid = $row['stud_course'];
                                                                      $address = $row['street'].','.$row['barangay'].' '.$row['city'].','.$row['zipcode'];
                                                  $age = $row['age'];
                                                  $gender = $row['gender'];
                                                  $status = $row['status'];
                                                  $contactno = $row['contact_no'];
                                                                 }
                                                                        $fgetcourse = " select * from course where courseid = '$cid'  ";
                                                                                $gfcourse = mysqli_query($con,$fgetcourse); 
                                                                            
                                                                                 while($row = mysqli_fetch_array($gfcourse)){
                                                                                    echo $row['course'];
                                                                                 }
                                                                          

                                                          

                                                 ?>
                                                 </span>
                                          </div> 

                                           <div class="col-sm-3 mt-2">
                                                    
                                            Age : <?php echo $age ?>

                                           </div> 
                                             <div class="col-sm-3 mt-2">
                                                    
                                                Gender: <?php echo $gender ?>

                                           </div> 
                                             <div class="col-sm-3 mt-2">
                                                    
                                            Status : <?php echo $status ?>

                                           </div> 
                                             <div class="col-sm-3 mt-2">
                                                    
                                                Contact No : <?php echo $contactno ?>

                                           </div> 

                                            <div class="col-sm-12 mt-2">
                                                        Address :  <span style="font-style: italic;text-transform: uppercase;"><?php echo $address ?></span>
                                            </div> 

                                             <div class="col-sm-4">
                                                    
                                                  Father : <span style="font-style:italic"><?php echo $father ?></span>
                                             </div> 
                                               <div class="col-sm-4">
                                                   
                                                     Occupation : <span style="font-style:italic"><?php echo $fatherocc ?></span>
                                             </div> 
                                             
                                               <div class="col-sm-4">
                                                  
                                                     Contact No : <span style="font-style:italic"><?php echo $fathercntact ?></span>
                                             </div> 

                                              <div class="col-sm-4">
                                                   

                                                     Mother : <span style="font-style:italic"><?php echo $mother ?></span>
                                             </div> 
                                               <div class="col-sm-4">
                                                   

                                                     Occupation : <span style="font-style:italic"><?php echo $motherocc ?></span>
                                             </div> 
                                             
                                               <div class="col-sm-4">
                                                  
                                                     Contact No : <span style="font-style:italic"><?php echo $mothercntact ?></span>
                                             </div> 

                                               <div class="col-sm-4">
                                                  

                                                     Guardian : <span style="font-style:italic"><?php echo $guardian ?></span>
                                             </div> 
                                               <div class="col-sm-4">
                                                  

                                                     Occupation : <span style="font-style:italic"><?php echo $guardianocc ?></span>
                                             </div> 
                                             
                                               <div class="col-sm-4">
                                                  

                                                     Contact No : <span style="font-style:italic"><?php echo $guardiancntact ?></span>
                                             </div> 


                                              <div class="col-sm-6">
                                              

                                                No of Brothers : <?php echo $noofbrother ?>
                                              </div> 
                                              
                                             
                                              <div class="col-sm-6">
                                                  
                                           No of Sisters : <?php echo $noofsister ?>
                                              </div>

                                               <div class="col-sm-6"></div> 
                                                   <div class="col-sm-6">
                                                  

                                                    Ordinal Position : <?php echo $ordinalposition ?>
                                              </div> 

                                               <div class="col-sm-12">
                                              

                                                Referred By : <?php echo $referredby ?>
                                               </div> 

                                              

                                            
                                                
                                               
                                            
                                             
                                           
                                         
                                      </div> 
                                      <hr>

                                      <div class="mb-2" > <span style="font-weight: bolder;">Statement of the problem</span></div>
                                     
                                     <div class="row mt-3">

                                         <div class="col-sm-12">
                                            <textarea class="form-control " rows="6" style="font-size: 13px" readonly><?php echo $sotp ?></textarea>

                                          
                                            
                                         </div> 
                                         
                                          </div> 

                                          <div class="mb-2 mt-4" > <span style="font-weight: bolder;">EVALUATION</span></div>
                                     
                                     <div class="row mt-3">

                                         <div class="col-sm-12">
                                            <textarea class="form-control noob" rows="23" style="font-size: 13px" data-id = "<?php echo $evaid ?>" readonly><?php echo $eva ?></textarea>
                                         </div> 
                                         
                                          </div> 
                                           
                                          <div class="mb-2 mt-4" > <span style="font-weight: bolder;">RECOMMENDATION/ACTION TAKEN</span></div>
                                     
                                     <div class="row mt-3">

                                         <div class="col-sm-12">
                                            <textarea class="form-control noob" rows="12" style="font-size: 13px" data-id="<?php echo $acttakenid ?>" readonly><?php echo $acttaken ?></textarea>
                                         </div> 
                                         
                                          </div> 
                                             

                                        
                                          <div class="mb-2 mt-4" > <span style="font-weight: bolder;">FOLLOW-UP</span></div>
                                     
                                     <div class="row mt-3">

                                         <div class="col-sm-12">
                                            <textarea class="form-control noob" rows="5" style="font-size: 13px" data-id="<?php echo $followupid ?>" readonly><?php echo $followup ?></textarea>
                                         </div> 
                                         
                                          </div> 



                                          <h6 style="float:right;text-align: center;" class="mt-5 mb-5">
                                          
                                            <img src="../../signatures/<?php echo $esign ?>" style="height: 70px;width: 170px;"> <br>
                                            <span style="font-size: 15px;border-top: 1px solid grey;">Guidance Coordinator</span>
                                              

                                          </h6>



                                     

                                    <br>
                                  

                                </h6> 

                                   </div>
                <div class="col-sm-1 col-md-2"></div>
            </div>
                             </div> 



    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" id="ptop" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

 



    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js?v=2"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js?v=1"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js?v=1"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js?v=1"></script>

    <!-- Page level plugins -->
 

     <?php 
    include '../../Guidance-Coordinator/clear/clear.php';

     ?>
   
</body>

</html>