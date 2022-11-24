<?php 
session_start();
include 'connect.php';
if(isset($_POST["compare"])) {
  $arrorder = [];
 // $order = preg_split ("/\,/", $_POST["order"]);
  $csform = $_SESSION['form_id']; 
 $ss = $_SESSION['dordercountorder'];
  $order  = explode(",",$_POST["order"]);

  
  //print_r($order);

foreach($order as $key => $link) 
{ 
    if($link === '') 
    { 
        unset($order[$key]); 
    } 
} 
$arrorder = array_values($order);


      for($i=0; $i < count($order);$i++) {
      

          $upt="UPDATE `form` SET `display_order`='".$ss[$i]."' WHERE form_id =".$arrorder[$i];
            mysqli_query($con,$upt); // run query 
            

       

           }
  
   

        


         

        
        
  

 
       $sqlse = " select * from form where status ='selected'  and class_name='$csform' ";
                      $results = mysqli_query($con,$sqlse); // run query
                       $count= mysqli_num_rows($results); 
                     while($row = mysqli_fetch_array($results)){
                        $selectedid = $row['form_id'];
                          }
                           
                   if ($count==1){
                 /*  $sqlu = " UPDATE `form` SET `status`=Null WHERE form_id='$selectedid' and class_name='$csform'  ";
                    $results = mysqli_query($con,$sqlu); // run query




                     $sql = " UPDATE `form` SET `status`='selected' WHERE form_id='$formid'  ";
                    $result = mysqli_query($con,$sql); // run query */
                 }else {
                 /*$sql = " UPDATE `form` SET `status`='selected' WHERE form_id='$formid'  ";
                    $result = mysqli_query($con,$sql); // run query */
                 }


               

}


if(isset($_POST['getcontent'])){ 
 

  if(isset($_SESSION['Reordersectionid'])) {
     $csform = $_SESSION['form_id'];   
     $sr = $_SESSION['Reordersectionid'];

       // 


        $sql = "SELECT * FROM `form` where class_name = '$csform' and section = '$sr'  order by display_order ";
                    $result = mysqli_query($con,$sql); // run query
                    $count= mysqli_num_rows($result); // to count if necessary
                   //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                if($count >=1){


                     while($row = mysqli_fetch_array($result)){
                      $formid = $row['form_id'];
              $dd = $row['type'];
              $status = $row['status'];
              $dis = $row['display_order'];
              $disp[] = $row['display_order'];
              $bgsrc = '../img/uploads/'.$row['bgimage'];
              $bgtcolor = $row['bgcolor'];
              $txttcolor = $row['txtcolor'];
              $yaxis = $row['yaxis'];
              $isvisible = $row['isvisible'];
              $section =$row['section'];
              $ismodifiable = $row['ismodifiable'];
              

                if($yaxis == ''){
                $posbg = 'center';
              }else {
                $posbg = $yaxis.'px';
              }

           /*     if($section == $sr) {
                 
                }else {
                  ?>  
                  <script type="text/javascript">
                    
                    $(document).ready(function() {
                            $('#<?php echo $formid ?>').addClass('d-none');
                          });      
                          
                  </script>


                  <?php
                } */

              //////----------------------------------------------------------

                if($dd == 'file'){
                    ?>
                     <div class="card cardo" id="<?php echo $formid ?>"  style="margin:10px;cursor: -webkit-grab; cursor: grab;" >
                      <i style="color:grey;padding:10px;font-size: 25px;text-align: right" > <img src="drag.png" style="width: 20px; text-align: right;"></i>
               
               
                <div class="card-body " >
                 <div class="container">
                 
                      <h6 style="font-weight: bold;font-size: 15px"><?php echo $row['content'] ?></h6>  
                         <div class="container mt-4">
                          <h6 style="text-decoration: underline;"><i class="fas fa-paperclip"></i>  Attach an image file</h6>
                           <div class="card">
                             <div class="card-body">
                                
                             </div> 
                             
                           </div> 
                            <p><br><br></p>
                            
                         </div> 
                         </div> 
              
                </div>
              </div>
                    
                  <?php 
                
                
                }else   

              if($dd == 'Title') { 
                ?>
              <p></p>
            
              <div class="card notallowed cardo" id="<?php echo $formid ?>" data-dis="<?php echo $dis ?>"  style="margin:10px;cursor: -webkit-grab; cursor: grab;" >
                  
               
               <div class="card-header py-5 " style="background: url('<?php echo $bgsrc ?>');background-size:cover;background-repeat:no-repeat;background-position-y:<?php echo $posbg ?>;background-color:<?php echo $bgtcolor ?>;color: <?php echo $txttcolor ?>;text-align: center;height: 180px;" > 


                <?php 
              //  echo $dis.'<br>';
              // echo $formid;


                    if($isvisible >= 1 ){
                      ?>
                    

                        <?php

                      }else {
                        ?>
                      <h3 style="text-transform: uppercase;padding-top: 20px"> <?php echo $row['content'] ?></h3>

                        <?php
                      }
                    
                 ?>
                
                
                

               </div> 
               
                <div class="card-body" >
              
               <i style="color:transparent;padding:5px;font-size: 20px;text-align: right;float: right;" > <img src="drag.png" style="width: 20px; text-align: right;"></i>
                </div>
              </div>
            
              <p></p>
              <?php

              }if ($dd == 'Plaintext') {
                ?>


                    <!--<p></p>
                 <div class="card cardo" id="<?php echo $formid ?>">
                      <i style="color:grey;padding:10px;font-size: 25px;text-align: right" > <img src="drag.png" style="width: 20px; text-align: right;"></i>
              
                   <div class="card-body py-5">
                    
                    
                      
                     

                   <div class="container">



                    
                      <h6 style="font-weight: bold;"><?php echo $row['content'] ?></h6>   
                    
                      
                   </div> 
                   


                   </div> 
                    <div class="card-footer" style="border-bottom: 2px solid <?php echo $questionbg ?>"></div> 
                    
                 </div> 
                 <p></p>-->
                <div class="card cardo" id="<?php echo $formid ?>"  style="margin:10px;cursor: -webkit-grab; cursor: grab;" >
                      <i style="color:grey;padding:10px;font-size: 25px;text-align: right" > <img src="drag.png" style="width: 20px; text-align: right;"></i>
               
                  
                <div class="card-body " >
                 <h5 style="font-size: 16px;text-align: left;padding: 40px;padding-top:0"> <?php echo $row['content'] ?></h5>
                 

                
                </div>
              </div>
            
                <?php
              }
              else if ($dd == 'list') {

                ?>
                <p></p>

                 <div class="card cardo" id="<?php echo $formid ?>"  style="margin:10px;cursor: -webkit-grab; cursor: grab;" >
                      <i style="color:grey;padding:10px;font-size: 25px;text-align: right" > <img src="drag.png" style="width: 20px; text-align: right;"></i>
               
                  
                <div class="card-body py-5" >
                
                   <div class="container">



                    
                      <h6 style="font-weight: bold;text-align: center;"><?php echo $row['content'] ?></h6> 

                      

                       <div class="table-responsive mt-4" id="responsive">
                     
                    <table class="table  table-sm table-bordered">
                
                    <?php 

                          $tc = " SELECT * FROM `tablecolumn_number` where formid='$formid' ";
                                      $resulttc = mysqli_query($con,$tc); // run query
                                    
                                       while($rowtc = mysqli_fetch_array($resulttc)){
                                        $tctype= $rowtc['type'];
                                        $tcId= $rowtc['tc_id'];
                                        $bg = $rowtc['bg'];

                                        if ($tctype == 'content') {
                                          $tccontent = $tcId;
                                        echo '<input type="hidden" name="" id="contentid" value="'.$tccontent.'">';
                                        }

                                       

                                          ?>
                                                              <script type="text/javascript">
                                                                $(document).ready(function() {
                                                                   
                                                                
                                                                <?php 
                                                                if($bg == 'table-info'){
                                                                  ?>$('#bg-info').attr('checked',true);

                                                                  $('#t1').addClass('border border-5');
                                                                   <?php

                                                                  }else if($bg == 'table-danger'){
                                                                    ?>$('#bg-danger').attr('checked',true);$('#t2').addClass('border border-5'); <?php
                                                                  }else if($bg == 'table-warning'){
                                                                    ?>$('#bg-warning').attr('checked',true);$('#t3').addClass('border border-5'); <?php
                                                                  }else if($bg == 'table-primary'){
                                                                    ?>$('#bg-primary').attr('checked',true);$('#t4').addClass('border border-5'); <?php
                                                                  }else if($bg == 'table-success'){
                                                                    ?>$('#bg-success').attr('checked',true);$('#t5').addClass('border border-5'); <?php
                                                                  }else if($bg == 'table-secondary'){
                                                                    ?>$('#bg-secondary').attr('checked',true);$('#t6').addClass('border border-5'); <?php
                                                                  }
                                                                 ?>



                                                                });
                                                                  
                                                                      
                                                              </script>
                                                              <?php



                                ?>
                    
                      
                       <?php 
                       

                       if ($tctype == 'header'){
                       
                        ?>

                        <tr id="tableheader" class="<?php echo $bg ?>">
                        
                          
                            <?php 
                                $selectheaders = " SELECT * FROM `tablechoices` where tc_id = '$tcId'  ";
                                            $resulthd = mysqli_query($con,$selectheaders); // run query
                                           
                                             while($header = mysqli_fetch_array($resulthd)){
                                    ?>
                                    <th>
      
                        <h6 style="font-weight: bold;"><?php echo $header['content'] ?></h6>
        

                                    </th>
                                    <?php
                                             }
                                      


                             ?>
        
        

                          
                        </tr>

                        <?php
                          
                       }else if ($tctype == 'content'){
                          
                        ?>


                         <tr>
                          
                          <?php 
                                $selectcontents = " SELECT * FROM `tablecolumn_content` where tc_id = '$tcId'  ";
                                            $resultcc = mysqli_query($con,$selectcontents); // run query
                                           
                                             while($cntnt = mysqli_fetch_array($resultcc)){
                                              
                                    ?>
                                    <td>

        
                          <span style="font-size: 14px"><?php echo $cntnt['content'] ?></span>
                                    </td>

                                    <?php
                                             }
                                 
                               


                             ?>
                          

                          
                        </tr>
                        
                         

                        <?php


                       }
                        ?>
                    
                    
                        
                       
                    
                                <?php

                                       }
                                

                     ?>
                        
                    </table>

                    </div> 



                    <ul class="list-group">
                     <?php 
                          $mlist= " SELECT * FROM `tablecolumn_content` where typ =1 and formid='$formid'  ";
                              $resultmlist = mysqli_query($con,$mlist); // run query
                                                   
                                       while($rowlist = mysqli_fetch_array($resultmlist)){
                              ?>
       <li class="list-group-item" >

        
        <h6 style="font-size: 14px"><?php echo $rowlist['content'] ?></h6>
       
       </li>

                              <?php

                                
                                       }

                               
                               

                      ?>


                  
                    </ul>


                    <?php 

                         if($ismodifiable == 1){
                               ?>

                               <button  style="font-size:13px" class="btn btn-light text-secondary mt-2" >
                                <i class="fas fa-plus-circle"></i>  Add Columns
                               </button>
                               <?php
                             }    

                       ?>
  
                    
                      
                   </div> 
                 

                
                </div>
              </div>


                 
                 <p></p>

                <?php

              }




              else if ($dd == 'Question') { 
                
                
                    ?>
                  
              <p></p>
              <div id="<?php echo $formid ?>"  class="card cardo"  style="margin:10px; cursor: -webkit-grab; cursor: grab;"  >
                <span class="topcolor"> </span>
            <i style="color:grey;padding:10px;font-size: 25px;text-align: right" > <img src="drag.png" style="width: 20px; text-align: right;"></i>
              
                <div class="card-body">
               
               <div class="container">
                <div class="row">
                    <div class="col-sm-9">
              <h5 style="width: 100%; border:none;outline: none;padding: 9px; font-weight: bold;font-size: 16px" > <?php echo $row['content']; ?></h5>
                    </div>
                    
                    <div class="col-sm-3">
                

                    </div>
                  </div>

                  
                  <div class="row " id="optcontents">
                      
                    <?php 
                    
                
                     
                      
                        $sqls = " select * from choices where form_id = '$formid' ";
                         $results = mysqli_query($con,$sqls); // run query
                         while($rows = mysqli_fetch_array($results)){
                          $type= $rows['type'];
                            $choiceid = $rows['choice_id'];
                          if($type == 'shorttext') {
      ?>
     <div class="container" >
    <input type="text" class="" name="" style="border:none;outline:none; border-bottom: 1px solid grey;width: 50%;margin-left: 50px;text-align: center;" readonly="" placeholder="Answer here"> 
     </div> 
     
    
    <?php
                          }else if ($type== 'longtext') {
    ?>
     <div class="container">
      <input type="text" name="" style="border:none;outline:none; text-align: center;border-bottom: 1px solid grey;width: 100%;" readonly="" placeholder="Answer here">
     </div> 
     
    
    <?php
                          }else if ($type == 'mpchoice') {
    ?>
     <div class="container">
                    <h6 style="color: grey">Multiple Choices</h6>
                    <?php 
                        $selectaddchoice = " select * from addchoice where choice_id = '$choiceid' ";
                                    $resultchoice = mysqli_query($con,$selectaddchoice); // run query
                                 
                              
                                     while($res = mysqli_fetch_array($resultchoice)){
                  ?>
      <h6 style="color:grey"><label><input type="radio" name="" disabled=""> <?php echo $res['content'] ?></label></h6>



        
                  <?php
                                     }
                              
                     ?>
                    
                </div>
    <?php
                          }else if($type =='checkbox') {
                                ?>
     <div class="container">
                    <h6 style="color: grey">Multiple checkbox Choices</h6>
                    <?php 
                        $selectaddchoice = " select * from addchoice where choice_id = '$choiceid' ";
                                    $resultchoice = mysqli_query($con,$selectaddchoice); // run query
                                 
                              
                                     while($res = mysqli_fetch_array($resultchoice)){
                  ?>
      <h6 style="color:grey"><label><input type="checkbox" name="" disabled=""> <?php echo $res['content'] ?></label></h6>



        
                  <?php
                                     }
                              
                     ?>
                    
                </div>
    <?php
                          }
                         }
               
                     
              

                     ?>

                  </div>
               </div> 
               
              
              <p></p>
              
               <button class="btndel d-none"  style="border:none;outline: none; float: right; margin-top: 20px" data-fid="<?php echo $row['form_id'] ?>"><i style="color:grey" class="far fa-trash-alt"></i></button>
                </div>
              </div>

              <p></p>

              <?php

                
                  
                  

              }
                     }

                       //////----------------------------------------------------------
                 }else {
                  ?>
                   <div class="container">
                    <h5 style="text-align: center;">Simply select the choices on the right side to begin creating forms </h5>
                    <h1 style="text-align: center;font-size: 180px;"><i class="far fa-hand-point-right"></i></h1>
                   </div> 
                   
                  <?php
                 }


               



                  
  }else {
   // echo 'NOT SET';
      
        $csform = $_SESSION['form_id'];   

        $sql = "SELECT * FROM `form` where class_name = '$csform' order by display_order ";
                    $result = mysqli_query($con,$sql); // run query
                    $count= mysqli_num_rows($result); // to count if necessary
                   //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                if($count >=1){


                     while($row = mysqli_fetch_array($result)){
                      $formid = $row['form_id'];
              $dd = $row['type'];
              $status = $row['status'];
              $dis = $row['display_order'];

              $bgsrc = '../img/uploads/'.$row['bgimage'];
              $bgtcolor = $row['bgcolor'];
              $txttcolor = $row['txtcolor'];
              $yaxis = $row['yaxis'];
              $isvisible = $row['isvisible'];

                if($yaxis == ''){
                $posbg = 'center';
              }else {
                $posbg = $yaxis.'px';
              }
              if($dd == 'Title') { 
                ?>
              <p></p>
            
              <div class="card notallowed cardo" id="<?php echo $formid ?>"  style="margin:10px;cursor: -webkit-grab; cursor: grab;" >
                  
               
               <div class="card-header py-5 " style="background: url('<?php echo $bgsrc ?>');background-size:cover;background-repeat:no-repeat;background-position-y:<?php echo $posbg ?>;background-color:<?php echo $bgtcolor ?>;color: <?php echo $txttcolor ?>;text-align: center;height: 180px;" > 


                <?php 


                    if($isvisible >= 1 ){
                      ?>
                    

                        <?php

                      }else {
                        ?>
                      <h3 style="text-transform: uppercase;padding-top: 20px"> <?php echo $row['content'] ?></h3>

                        <?php
                      }
                    
                 ?>
                
                
              

               </div> 
               
                <div class="card-body" >
              
              
                </div>
              </div>
            
              <p></p>
              <?php

              }if ($dd == 'Plaintext') {
                ?>


                    <!--<p></p>
                 <div class="card cardo" id="<?php echo $formid ?>">
                      <i style="color:grey;padding:10px;font-size: 25px;text-align: right" > <img src="drag.png" style="width: 20px; text-align: right;"></i>
              
                   <div class="card-body py-5">
                    
                    
                      
                     

                   <div class="container">



                    
                      <h6 style="font-weight: bold;"><?php echo $row['content'] ?></h6>   
                    
                      
                   </div> 
                   


                   </div> 
                    <div class="card-footer" style="border-bottom: 2px solid <?php echo $questionbg ?>"></div> 
                    
                 </div> 
                 <p></p>-->
                <div class="card cardo" id="<?php echo $formid ?>"  style="margin:10px;cursor: -webkit-grab; cursor: grab;" >
                      <i style="color:grey;padding:10px;font-size: 25px;text-align: right" > <img src="drag.png" style="width: 20px; text-align: right;"></i>
               
               
                <div class="card-body py-5" >
                 <h5 style="font-size: 16px"> <?php echo $row['content'] ?></h5>
              
                </div>
              </div>
            
                <?php
              }




              else if ($dd == 'Question') { 
                
                
                    ?>
                  
              <p></p>
              <div id="<?php echo $formid ?>"  class="card cardo"  style="margin:10px; cursor: -webkit-grab; cursor: grab;"  >
                <span class="topcolor"> </span>
            <i style="color:grey;padding:10px;font-size: 25px;text-align: right" > <img src="drag.png" style="width: 20px; text-align: right;"></i>
              
                <div class="card-body">
               
               <div class="container">
                <div class="row">
                    <div class="col-sm-9">
              <h5 style="width: 100%; border:none;outline: none;padding: 9px; color: black;font-weight: bold;font-size: 16px" > <?php echo $row['content']; ?></h5>
                    </div>
                    
                    <div class="col-sm-3">
                

                    </div>
                  </div>

                  
                  <div class="row " id="optcontents">
                      
                    <?php 
                    
                
                     
                      
                        $sqls = " select * from choices where form_id = '$formid' ";
                         $results = mysqli_query($con,$sqls); // run query
                         while($rows = mysqli_fetch_array($results)){
                          $type= $rows['type'];
                            $choiceid = $rows['choice_id'];
                          if($type == 'shorttext') {
      ?>
     <div class="container" >
    <input type="text" class="" name="" style="border:none;outline:none; border-bottom: 1px solid grey;width: 50%;margin-left: 50px;text-align: center;" readonly="" placeholder="Answer here"> 
     </div> 
     
    
    <?php
                          }else if ($type== 'longtext') {
    ?>
     <div class="container">
      <input type="text" name="" style="border:none;outline:none; text-align: center;border-bottom: 1px solid grey;width: 100%;" readonly="" placeholder="Answer here">
     </div> 
     
    
    <?php
                          }else if ($type == 'mpchoice') {
    ?>
     <div class="container">
                    <h6 style="color: grey">Multiple Choices</h6>
                    <?php 
                        $selectaddchoice = " select * from addchoice where choice_id = '$choiceid' ";
                                    $resultchoice = mysqli_query($con,$selectaddchoice); // run query
                                 
                              
                                     while($res = mysqli_fetch_array($resultchoice)){
                  ?>
      <h6 style="color:grey"><label><input type="radio" name="" disabled=""> <?php echo $res['content'] ?></label></h6>



        
                  <?php
                                     }
                              
                     ?>
                    
                </div>
    <?php
                          }else if($type =='checkbox') {
                                ?>
     <div class="container">
                    <h6 style="color: grey">Multiple checkbox Choices</h6>
                    <?php 
                        $selectaddchoice = " select * from addchoice where choice_id = '$choiceid' ";
                                    $resultchoice = mysqli_query($con,$selectaddchoice); // run query
                                 
                              
                                     while($res = mysqli_fetch_array($resultchoice)){
                  ?>
      <h6 style="color:grey"><label><input type="checkbox" name="" disabled=""> <?php echo $res['content'] ?></label></h6>



        
                  <?php
                                     }
                              
                     ?>
                    
                </div>
    <?php
                          }
                         }
               
                     
              

                     ?>

                  </div>
               </div> 
               
              
              <p></p>
              
               <button class="btndel d-none"  style="border:none;outline: none; float: right; margin-top: 20px" data-fid="<?php echo $row['form_id'] ?>"><i style="color:grey" class="far fa-trash-alt"></i></button>
                </div>
              </div>

              <p></p>

              <?php

                
                  
                  

              }
                     }
                 }else {
                  ?>
                   <div class="container">
                    <h5 style="text-align: center;">Simply select the choices on the right side to begin creating forms </h5>
                    <h1 style="text-align: center;font-size: 180px;"><i class="far fa-hand-point-right"></i></h1>
                   </div> 
                   
                  <?php
                 }
 //////////////////////////////////////////////
  }


}

 
 

 ?>
