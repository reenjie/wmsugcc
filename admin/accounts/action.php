<?php 
session_start();
include '../../GCC/create_form/connect.php';
$admintoken =  $_SESSION['superadminId'];


//AjaxRequest, checking Password if right.
if(isset($_POST['credentialkey'])){ 
  $val = $_POST['val'];

        $sql = " SELECT * FROM `administrator` where admin_id = 1 and admin_password = '$val' ";
                    $result = mysqli_query($con,$sql);
                    $count= mysqli_num_rows($result); 
                 
                 if ($count==1){
                    echo 'accessgranted';
              }else{
                echo 'accessdenied';
              }
    
}
//////////////////////////////////////////////////////////////////////////////

//Adding Student via Superadmin
if(isset($_POST['savestud'])){ 
   
                   $ln = $_POST['ln'];
                   $fn = $_POST['fn'];
                   $mn = $_POST['mn'];
                   $em = $_POST['em'];
                   $pass = md5($_POST['pass']);
                   $crse = $_POST['crse'];

                       $sql = " INSERT INTO `student`( `stud_lname`, `stud_fname`, `stud_mname`, `stud_email`, `stud_course`, `password`) VALUES ('$ln','$fn','$mn','$em','$crse','$pass')  ";
                                   $result = mysqli_query($con,$sql); // run query
                                 
            if($result){
              header('location:index.php');
            }
}

//Delete Student
if(isset($_POST['delete'])){ 
  $sid = $_POST['sid'];

      $sql = " DELETE FROM `student` WHERE stud_id = '$sid'  ";
                  $result = mysqli_query($con,$sql); // 
                 
            if($result){
              header('location:index.php');
            }
  
}

//Update Student data .
if(isset($_POST['uptstud'])){

  $lname = $_POST['lname'];
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
 

  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $status = $_POST['status'];
  $course = $_POST['course'];
  $contactno = $_POST['contactno'];
  $studid = $_POST['studid'];

   $st = $_POST['st'];
  $br = $_POST['br'];
  $cty = $_POST['cty'];
  $zc = $_POST['zc'];
  $ct = $_POST['ct'];

  

 
    $getcourses = "select * from course where courseid = '$course'  ";
                                      $getstudent_course = mysqli_query($con,$getcourses); 
                                    
                                    while($gcourse = mysqli_fetch_array($getstudent_course)){
                                           
                                              $collegeid = $gcourse['CollegeId'];

                                      }
                                        $getcolleges = "select * from colleges where CollegeId = '$collegeid'  ";
                                         $stud_college = mysqli_query($con,$getcolleges); 
                                        
                                       while($gcollege = mysqli_fetch_array($stud_college)){
                                            $collegeId = $gcollege['CollegeId'];     
                                         }

  $updatestud = "UPDATE `student` SET `stud_lname`='$lname',`stud_fname`='$fname',`stud_mname`='$mname',`age`='$age',`gender`='$gender',`status`='$status',`contact_no`='$contactno',`stud_course`='$course',`stud_college`='$collegeId',`street`='$st',`barangay`='$br',`city`='$cty',`country`='$ct',`zipcode`='$zc' WHERE stud_id = '$studid' ";
  mysqli_query($con,$updatestud);

  $_SESSION['asuccess']= 1;
 ?>
 <script type="text/javascript">
   window.history.back();
 </script>
 <?php
  
}


//Block student
if(isset($_POST['block'])){
  $id = $_POST['id'];

    $uptlogin = "UPDATE `student` SET `lg`= 2 WHERE stud_id='$id' ";
                          mysqli_query($con,$uptlogin);
  
}


//Unblock student
if(isset($_POST['unblock'])){
  $id = $_POST['id'];

    $uptlogin = "UPDATE `student` SET `lg`= 0 WHERE stud_id='$id' ";
                          mysqli_query($con,$uptlogin);
  
}

//Register
if(isset($_POST['register'])){ 
  $em = $_POST['em'];
  $ln = $_POST['ln'];
  $gn = $_POST['gn'];
  $mi = $_POST['mi'];
  
  $course = $_POST['course'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $status = $_POST['status'];
  $cno = $_POST['cno'];

  $st = $_POST['st'];
  $br = $_POST['br'];
  $cty = $_POST['cty'];
  $zc = $_POST['zc'];
  $ct = $_POST['ct'];

          $getcollege = " select * from course where courseid = '$course'  ";
                      $gcollge = mysqli_query($con,$getcollege); 
                    
                       while($row = mysqli_fetch_array($gcollge)){
                $collegeid = $row['CollegeId'];
                       }
                

  if($course == 'noselection'){

    echo 'nocourse';
  }else {


    if (preg_match("~@wmsu\.edu.ph$~",$em)){ 

function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
    
    $passw = randomPassword();


          $_SESSION['pass'] = $passw;

          $pass = md5($passw);


                $checkifexist = " select * from student where stud_email = '$em'  ";
                            $ckstud = mysqli_query($con,$checkifexist); 
                            $count= mysqli_num_rows($ckstud);
                           //  $get_id =  mysqli_insert_id($con); 
        if ($count>=1){
          
          echo "exist";             

         }else {

     

         $insert_reg = "INSERT INTO `student`(`stud_lname`, `stud_fname`, `stud_mname`, `stud_email`, `age`, `gender`, `status`, `contact_no`, `street`, `barangay`, `city`, `country`, `zipcode`, `stud_course`, `stud_college`, `fl`,`password`) VALUES ('$ln','$gn','$mi','$em','$age','$gender','$status','$cno','$st','$br','$cty','$ct','$zc','$course','$collegeid','1','$pass')";
        mysqli_query($con,$insert_reg);


        echo 'wmsu';

        $_SESSION['message'] = 1;
        $_SESSION['message_email'] = $em;

                      }



        


       }else {
        echo 'notwmsu';
       }


   
  }

  
  
}


 ?>