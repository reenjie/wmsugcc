<?php 
session_start();
include '../create_form/connect.php';
	
	if(isset($_POST['course_student'])){ 
		$cid = $_POST['cid'];
		$nm = $_POST['nm'];


		?>
		 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
			
		google.charts.load("current", {packages:["corechart"]});	     
    google.charts.setOnLoadCallback(drawbarChart);
    function drawbarChart() {
      var data = google.visualization.arrayToDataTable([
         ['Course', 'Number of Students','id'],
     		<?php 

       				$getcourses = " select * from course where CollegeId = '$cid' ";
       		                $gcourse = mysqli_query($con,$getcourses); 
       		                $countcourse= mysqli_num_rows($gcourse);
       		               //  $get_id =  mysqli_insert_id($con); 
       		             if ($countcourse>=1){
       		            
       		                 while($row = mysqli_fetch_array($gcourse)){
       		                 	$courseid = $row['courseid'];
       							?>
       							 ['<?php echo $row['course'] ?>', 11,'<?php echo $courseid ?>'],
       							<?php
       		                 }
       		          }else {

       		          }

       		 ?>	 
       		
       		  
       		       
       		    

      ]);

      
   

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1]);

      var options = {
        title: "Completed PDS of <?php echo $nm?>",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_valuess"));
      chart.draw(view, options);

       google.visualization.events.addListener(chart, 'select', selectcourses);


         function selectcourses() {
  var selection = chart.getSelection();
  var message = '';
  for (var i = 0; i < selection.length; i++) {
    var item = selection[i];
    if (item.row != null && item.column != null) {
      var strs = data.getFormattedValue(item.row, 0);
      var id = data.getFormattedValue(item.row,2);
    
       message += '{row:none, column:' + item.column + '}; value (row 0)1 = ' + strs + '\n';
    } else if (item.row != null) {
      var strs = data.getFormattedValue(item.row, 0);
        var id = data.getFormattedValue(item.row,2);
      message += '{row:none, column:' + item.column + '}; value (row 0)2 = ' + strs + '\n';
    } else if (item.column != null) {
      var strs = data.getFormattedValue(0, item.column);
        var id = data.getFormattedValue(item.row,2);
     message += '{row:none, column:' + item.column + '}; value (row 0)3 = ' + strs + '\n';
    }

  }

  if(message == ''){
    
  }else {
    	
  // /  alert(strs);  
  tablecontents(id,<?php echo $cid?>);
     function tablecontents(courseid,cid){

           	
           	   $.ajax({
           	           url : "ana_content.php",
           	            method: "POST",
           	             data  : {tablec:1,courseid:courseid,cid:cid},
           	             success : function(data){
           				$('#table_contents').html(data);
           	             }
           	          })
           	       
           	    
           }

    $('#table_selected').removeClass('d-none');
    $('#titlename').text(strs);

     $('html, body').animate({scrollTop: '+=150px'}, 800);


     }
   }

  }
      
		      	
		</script>

		<div id="barchart_valuess" style="width: 100%; height: 300px;"></div>


		<?php
		
		
		
	}

	if(isset($_POST['course_studentpending'])){ 
		$cid = $_POST['cid'];
		$nm = $_POST['nm'];


		?>
		 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
			
		google.charts.load("current", {packages:["corechart"]});	     
    google.charts.setOnLoadCallback(drawbarChart);
    function drawbarChart() {
      var data = google.visualization.arrayToDataTable([
         ['Course', 'Number of Students','id'],
     		<?php 

       				$getcourses = " select * from course where CollegeId = '$cid' ";
       		                $gcourse = mysqli_query($con,$getcourses); 
       		                $countcourse= mysqli_num_rows($gcourse);
       		               //  $get_id =  mysqli_insert_id($con); 
       		             if ($countcourse>=1){
       		            
       		                 while($row = mysqli_fetch_array($gcourse)){
       		                 	$courseid = $row['courseid'];
       							?>
       							 ['<?php echo $row['course'] ?>', 11,'<?php echo $courseid ?>'],
       							<?php
       		                 }
       		          }else {

       		          }

       		 ?>	 
       		
       		  
       		       
       		    

      ]);

      
   

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1]);

      var options = {
        title: "Pending PDS of <?php echo $nm?>",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_valuess"));
      chart.draw(view, options);

       google.visualization.events.addListener(chart, 'select', selectcourses);


         function selectcourses() {
  var selection = chart.getSelection();
  var message = '';
  for (var i = 0; i < selection.length; i++) {
    var item = selection[i];
    if (item.row != null && item.column != null) {
      var strs = data.getFormattedValue(item.row, 0);
      var id = data.getFormattedValue(item.row,2);
    
       message += '{row:none, column:' + item.column + '}; value (row 0)1 = ' + strs + '\n';
    } else if (item.row != null) {
      var strs = data.getFormattedValue(item.row, 0);
        var id = data.getFormattedValue(item.row,2);
      message += '{row:none, column:' + item.column + '}; value (row 0)2 = ' + strs + '\n';
    } else if (item.column != null) {
      var strs = data.getFormattedValue(0, item.column);
        var id = data.getFormattedValue(item.row,2);
     message += '{row:none, column:' + item.column + '}; value (row 0)3 = ' + strs + '\n';
    }

  }

  if(message == ''){
    
  }else {
    	
  // /  alert(strs);  
  tablecontents(id,<?php echo $cid?>);
     function tablecontents(courseid,cid){

           	
           	   $.ajax({
           	           url : "ana_content.php",
           	            method: "POST",
           	             data  : {tablecpending:1,courseid:courseid,cid:cid},
           	             success : function(data){
           				$('#table_contents').html(data);
           	             }
           	          })
           	       
           	    
           }

    $('#table_selected').removeClass('d-none');
    $('#titlename').text(strs);

     $('html, body').animate({scrollTop: '+=150px'}, 800);


     }
   }

  }
      
		      	
		</script>

		<div id="barchart_valuess" style="width: 100%; height: 300px;"></div>


		<?php
		
	}


	if(isset($_POST['tablec'])){ 
		$courseid = $_POST['courseid'];
		$cid = $_POST['cid'];

		?>
		    <table class="table table-striped table-hover table-sm" id="pdstable">
                              <thead >
                                <tr class="table-success" id="pdstableheader" >
                                
                                  <th scope="col">ID </th>
                                  <th scope="col">Lastname</th>
                                  <th scope="col">Firstname</th>
                                  <th scope="col">Middlename</th>
                                  <th scope="col">Email</th>
                                  <!--<th scope="col" >Date submitted</th>
                                  <th scope="col" >Last Modified</th>-->
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody id="tablecontents">

                              	<?php 

   
                              	  $sql = " SELECT * FROM `student` ";
                      $result = mysqli_query($con,$sql); 
                   
                     $checkchanges = " SELECT * FROM `form` where class_name='62'  ";
                                                    $resultcheckchanges = mysqli_query($con,$checkchanges); // run query
                                                    $countcheckchanges= mysqli_num_rows($resultcheckchanges); // to count if necessary
                                                   //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if 
                                                     while($cc = mysqli_fetch_array($resultcheckchanges)){
                                                     $form_id = $cc['form_id'];
                                                     $formcontent[] = $cc['content'];
                                        
              
                                                     }
                                                        $notsame=false;
                                $formuptt = false;
                                $formupttq = false;//used
                                 $formupttqs = false;
                                 $thereschange = false;//used
                
                     
                       while($row = mysqli_fetch_array($result)){
                          $studentid = $row['stud_id'];
                          $student_lname = $row['stud_lname'];
                          $student_fname = $row['stud_fname'];
                          $student_mname = $row['stud_mname'];
                          $student_email = $row['stud_email'];
                         $studemail = substr($student_email, 0, strpos($student_email,'@'));
        $sqls = " select * from form_response where userid='$studentid' and csformid = '62' and CollegeId = '$cid' ";
                                          $results = mysqli_query($con,$sqls); 
                                          $counts= mysqli_num_rows($results); 
                                   


                                       if ($counts>=1){
                                        
                                           while($rows = mysqli_fetch_array($results)){
                                          $csform= $rows['csformid'];
                                          $user[] = $rows['userid'];
                                          $respondedat = $rows['datecreated'];
                                          //$contentofreponse[] = $rows['content'];

                                          $idforfiles[]= $rows['formid'];



                                          $respo = date('Y-m-d',strtotime($respondedat));
                                           }

                                           
  
                              $formid = $csform;
                              $studentids = $studentid;
   
                                         $studcount[] = $studentid;
                                        


                                           
                                           ?>
                                             <tr id="tablerows<?php echo $studentid ?>" class="tablerows">

                               

                                 <td style="font-weight: bolder"><?php echo $studemail ?></td>
                                  <td><?php echo $student_lname ?></td>
                                  <td><?php echo $student_fname ?></td>
                                  <td><?php echo $student_mname ?></td>
                                  <td><?php echo $student_email ?></td>
                                 <!-- <td><?php echo date('Y-m-d') ?></td>
                                  <td><?php echo date('Y-m-d') ?></td>-->
                                  <td>
                                    to be continued..
                                  </td>
                                 
                                </tr>
                                


   
    										<?php

                                    }else {
                                     // echo 'no data';
                                    }
                                }

                              	 ?>
                               

                             
                                   

                                

                              </tbody>
                            </table>  
                            <script src="../../js/jquery.js"></script>
                         
                              <link rel="stylesheet" type="text/css" href="../../offline/datatable.css"/>
 
<script type="text/javascript" src="../../offline/datatable.js"></script>






                            <script type="text/javascript">
                            	
                            	$(document).ready(function() {
                            	      	   let table = new DataTable('#pdstable', {
      
										     "search": {
										    "caseInsensitive": false
										  }

										});
                            	      });      
                                  	
                            </script>
		<?php
	}


	if(isset($_POST['tablecourses'])){ 
		$courseid = $_POST['courseid'];
		$cid = $_POST['cid'];
    $se = $_POST['se'];


                                      
                                      if($se == 'Pending'){
                                        ?>
                                        <h6 class="text-danger" style="font-weight:bolder" >Pending or Unfinished <span style="font-weight:normal;" class="text-secondary">Personal Data Sheets</span></h6>
                                        <?php
                                      }else {
                                           ?>
                                        <h6 class="text-primary" style="font-weight:bolder" >Completed <span style="font-weight:normal;" class="text-secondary">Personal Data Sheets</span></h6> 
                                        <?php
                                      }

                                      
		?>
		    


		    <table class="table table-striped table-hover table-sm" id="pdstable">
                              <thead >
                                <?php 
                                    if($se == 'Pending'){
                                        ?>
                                      <tr class="table-danger" id="pdstableheader" >
                                        <?php
                                      }else {
                                           ?>
                                      <tr class="table-primary" id="pdstableheader" >
                                        <?php
                                      }


                                 ?>
                                
                                
                                  <th scope="col">Courses </th>
                               
                                  <th scope="col">Number of Students</th>
                                  <th scope="col">Action</th>
                                  
                                </tr>
                              </thead>
                              <tbody id="tablecontents">

                              	<?php 

   
                              	  $sql = " SELECT * FROM `course` where CollegeId = '$cid' ";
                      $result = mysqli_query($con,$sql); 
                   
                     $checkchanges = " SELECT * FROM `form` where class_name='62'  ";
                                                    $resultcheckchanges = mysqli_query($con,$checkchanges); // run query
                                                    $countcheckchanges= mysqli_num_rows($resultcheckchanges); // to count if necessary
                                                   //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if 
                                                     while($cc = mysqli_fetch_array($resultcheckchanges)){
                                                     $form_id = $cc['form_id'];
                                                     $formcontent[] = $cc['content'];
                                        
              
                                                     }
                                                        $notsame=false;
                                $formuptt = false;
                                $formupttq = false;//used
                                 $formupttqs = false;
                                 $thereschange = false;//used
                
                     
                       while($row = mysqli_fetch_array($result)){

                        $cid = $row['courseid'];

                          if($se == 'Pending'){
                                           $getstudentcounts = "select * from student where stud_course = '$cid' and pds_filled ='0'   ";
                                      }else {
                                            $getstudentcounts = "select * from student where stud_course = '$cid' and pds_filled ='1'   ";
                                      }

                              
                                   $numberforstuds = mysqli_query($con,$getstudentcounts); 
                                   $countingstud= mysqli_num_rows($numberforstuds);
                                 
                                   $getcourses_theme = "select * from course where courseid ='$cid'  ";
                                    $getcolortheme = mysqli_query($con,$getcourses_theme); 
                                  
                                  while($getcolor = mysqli_fetch_array($getcolortheme)){
                                         $gcollegeid = $getcolor['CollegeId'];
                                    }

                                      $getcollege_theme = "select * from colleges where CollegeId= '$gcollegeid'  ";
                                       $gettingcollegetheme = mysqli_query($con,$getcollege_theme); 
                                     
                                     while($gcollegecolor = mysqli_fetch_array($gettingcollegetheme)){
                                           $theme = $gcollegecolor['bgcolor'];     
                                       }

                                       if($theme == ''){
                                        $srctheme = '';
                                       }else {
                                        $srctheme = $theme;
                                       }
                                    
                                     
                                 
                                  
                                  
                                  if($countingstud >=1){
                                       ?>
                                  <tr >
                                    <td><span style="font-weight:bolder;color:<?php echo $srctheme ?>"><?php echo $row['course'] ?></span></td>
                                   
                                    <td><span style="font-weight:bolder"><?php echo $countingstud ?></span></td>
                                    <td>
                                     
                                         <button class="btn btn-link text-primary btnview" data-id="<?php echo $row['courseid'] ?>" data-tp="<?php echo $se ?>" data-course ="<?php echo $row['course'] ?>" data-toggle="modal" data-target="#view" style="font-size:12px">View</button>
                                    
                                    </td>
                                  </tr>

                                  <?php
                      

                                  }else {

                                  }
                            
                               
      
                                }

                              	 ?>
                               

                             
                                   

                                

                              </tbody>
                            </table>  
                      







                           <script src="../../js/jquery.js"></script>
                         
                              <link rel="stylesheet" type="text/css" href="../../offline/datatable.css"/>
 
<script type="text/javascript" src="../../offline/datatable.js"></script>






                            <script type="text/javascript">
                            	
                            	$(document).ready(function() {
                            	      	   let table = new DataTable('#pdstable', {
      
										     "search": {
										    "caseInsensitive": false
										  }

										});

                          let tableview = new DataTable('#tablestudentview', {
      
                         "search": {
                        "caseInsensitive": false
                      }

                    });



                                         


                                    $('.closeviewmodal').click(function(){
                                      $('#view').hide();
                                      $('.btnview').click();
                                     
                                              
                                    })

                                    $('.btnview').click(function(){



                                      var course = $(this).data('course');
                                      var tp = $(this).data('tp');
                                      $('#titlelabel').text(course);
                                      var id = $(this).data('id');

                                      if(tp == 'Pending'){
                                        
                                        
                                         $.ajax({
                                         url : "action.php",
                                          method: "POST",
                                         data  : {gettablepending:1,course:course,id:id},
                                          success : function(data){
                                         $('#tablecontents_pc').html(data);
                                           }
                                         })

                                      }else {

                                    

                                           $.ajax({
                                         url : "action.php",
                                          method: "POST",
                                         data  : {gettablecompleted:1,course:course,id:id},
                                          success : function(data){
                                         $('#tablecontents_pc').html(data);
                                           }
                                         })
                                      }
                                              
                                    })

                            	      });      
                                  	
                            </script>

  <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl  " role="document">
    <div class="modal-content shadow" style="border:1px solid grey;margin-top: 110px;">
      <div class="modal-header">
        <h5 class="modal-title" id="titlelabel" style="font-weight:bolder;text-align: center;"></h5>
        <h6></h6>
        <button type="button" class="close closeviewmodal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container table-responsive" >
          <div  id="tablecontents_pc" ></div>
        </div>
      </div>
   
    </div>
  </div>
</div>



		<?php
	}


  if(isset($_POST['tablecourses1'])){ 
    $courseid = $_POST['courseid'];
    $cid = $_POST['cid'];
    $se = $_POST['se'];


                                      
                                 

                                      
    ?>
        


        <table class="table table-striped table-hover table-sm" id="pdstable">
                              <thead >
                                <?php 
                                    if($se == 'Pending'){
                                        ?>
                                      <tr class="table-danger" id="pdstableheader" >
                                        <?php
                                      }else {
                                           ?>
                                      <tr class="table-primary" id="pdstableheader" >
                                        <?php
                                      }


                                 ?>
                                
                                
                                  <th scope="col">Courses </th>
                               
                                  <th scope="col">Number of Students</th>
                                  <th scope="col">Action</th>
                                  
                                </tr>
                              </thead>
                              <tbody id="tablecontents">

                                <?php 

   
                                  $sql = " SELECT * FROM `course` where CollegeId = '$cid' ";
                      $result = mysqli_query($con,$sql); 
                   
                     $checkchanges = " SELECT * FROM `form` where class_name='62'  ";
                                                    $resultcheckchanges = mysqli_query($con,$checkchanges); // run query
                                                    $countcheckchanges= mysqli_num_rows($resultcheckchanges); // to count if necessary
                                                   //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if 
                                                     while($cc = mysqli_fetch_array($resultcheckchanges)){
                                                     $form_id = $cc['form_id'];
                                                     $formcontent[] = $cc['content'];
                                        
              
                                                     }
                                                        $notsame=false;
                                $formuptt = false;
                                $formupttq = false;//used
                                 $formupttqs = false;
                                 $thereschange = false;//used
                
                     
                       while($row = mysqli_fetch_array($result)){

                        $cids = $row['courseid'];


                                 

                                      $getcollege_theme = "select * from colleges where CollegeId= '$cid'  ";
                                       $gettingcollegetheme = mysqli_query($con,$getcollege_theme); 
                                     
                                     while($gcollegecolor = mysqli_fetch_array($gettingcollegetheme)){
                                           $theme = $gcollegecolor['bgcolor'];     
                                       }

                                       if($theme == ''){
                                        $srctheme = '';
                                       }else {
                                        $srctheme = $theme;
                                       }

                           
                        
                               if($se == 'Pending'){
                                           $getstudentcounts = "SELECT * FROM `shifting_history` where from_course= '$cids' and status ='processing'   ";
                                      }else {
                                             $getstudentcounts = "SELECT * FROM `shifting_history` where from_course= '$cids' and status ='Approved'   ";
                                      }

                              
                                   $numberforstuds = mysqli_query($con,$getstudentcounts); 
                                   $countingstud= mysqli_num_rows($numberforstuds);

                                   if($countingstud >=1){

                                  ?>
                                  <tr>
                                    <td><span style="font-weight:bolder;color: <?php echo $srctheme ?>"><?php echo $row['course'] ?></span></td>
                                   
                                    <td><span style="font-weight:bolder"><?php echo $countingstud ?></span></td>
                                    <td>
                                      <button class="btn btn-link text-primary btnview" data-id="<?php echo $row['courseid'] ?>" data-tp="<?php echo $se ?>" data-course ="<?php echo $row['course'] ?>" data-toggle="modal" data-target="#view" style="font-size:12px">View</button>
                                    </td>
                                  </tr>

                                  <?php

                                   }
                        
                                
                            
                      
      
                                

                               }
                                 ?>

                             
                                   

                                

                              </tbody>
                            </table>  
                      







                            <script src="../../js/jquery.js"></script>
                         
                           <link rel="stylesheet" type="text/css" href="../../offline/datatable.css"/>
 
<script type="text/javascript" src="../../offline/datatable.js"></script>






                            <script type="text/javascript">
                              
                              $(document).ready(function() {
                                         let table = new DataTable('#pdstable', {
      
                         "search": {
                        "caseInsensitive": false
                      }

                    });

                          let tableview = new DataTable('#tablestudentview', {
      
                         "search": {
                        "caseInsensitive": false
                      }

                    });



                                         


                                    $('.closeviewmodal').click(function(){
                                      $('#view').hide();
                                      $('.btnview').click();
                                     
                                              
                                    })

                                    $('.btnview').click(function(){
                                      
                                      var course = $(this).data('course');
                                      var tp = $(this).data('tp');
                                      $('#titlelabel').text(course);
                                      var id = $(this).data('id');

                                      if(tp == 'Pending'){
                                        
                                         $.ajax({
                                         url : "action.php",
                                          method: "POST",
                                         data  : {gettablepending1:1,course:course,id:id},
                                          success : function(data){
                                         $('#tablecontents_pc').html(data);
                                           }
                                         })

                                      }else {
                                    

                                           $.ajax({
                                         url : "action.php",
                                          method: "POST",
                                         data  : {gettablecompleted1:1,course:course,id:id},
                                          success : function(data){
                                         $('#tablecontents_pc').html(data);
                                           }
                                         })
                                      }
                                              
                                    })
                                    });      
                                    
                            </script>

  <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content shadow" style="border:1px solid grey;margin-top: 110px;">
      <div class="modal-header">
        <h5 class="modal-title" id="titlelabel" style="font-weight:bolder;text-align: center;"></h5>
        <h6></h6>
        <button type="button" class="close closeviewmodal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container table-responsive"  >
          <div  id="tablecontents_pc" ></div>
        </div>
      </div>
   
    </div>
  </div>
</div>



    <?php
  }
 ?>