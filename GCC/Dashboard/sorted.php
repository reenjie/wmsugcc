<?php 	
session_start();
include '../create_form/connect.php';

if(isset($_POST['sort_pds'])){

	$sort = $_POST['sort'];
	$sem = $_POST['sem'];
	$yr = $_POST['yr'];

	if($sort == 'null'){
		$s1 = 'pdsfilleddate';
	}else {
		

		if($sort == 'Created'){
			$s1 = 'pdsfilleddate';
		}else {
			$s1 = 'pdsmodified';
		}
	}

	if($sem == 'null'){
		$s2 = $_SESSION['sem'];
	}else {
		$s2 = $sem;
	}

	if($yr == 'null'){
		$s3 = date('Y');

	}else {
		$s3 = $yr;
	}


	?>

	<div class="" id="analytics">

   <div class="row" >
                            <div class="col-xl-12 col-lg-12">
                            <div class="card shadow">
                               <div class="card-body">
          
            
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
 
    
           google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawChart2);

      function drawChart() {
         var data = google.visualization.arrayToDataTable([
        ['College', 'Completed', 'Pending', { role: "style" } , 'id','courseid','color' ],
        
     

           <?php 
                $getcolleges = "SELECT * FROM `colleges` ";
                          $gcol = mysqli_query($con,$getcolleges); 
                          $getcc= mysqli_num_rows($gcol);
                         //  $get_id =  mysqli_insert_id($con); 
                       if ($getcc>=1){
                      
                           while($row = mysqli_fetch_array($gcol)){
                                $collid = $row['CollegeId'];
                                $colleges = $row['college'];
                                $bgcolor = $row['bgcolor'];
                                            $getcourses = " SELECT * FROM `course` where CollegeId = '$collid'  ";
                                                    $gcourses = mysqli_query($con,$getcourses); 
                                                    $gccourse= mysqli_num_rows($gcourses);
                                               
                                                     while($rg = mysqli_fetch_array($gcourses)){
                                                    $courseidd = $rg['courseid'];
                                                       
                               
                                                }


                                     
              	if($sort == 'Pending'){
				$getstudentcountpending = "select * from student where stud_college = '$collid' and pds_filled ='0'    ";
				  $numberforstudpending = mysqli_query($con,$getstudentcountpending); 
                    $countingstudpending= mysqli_num_rows($numberforstudpending);
				}else if($sort == 'null') {
					 	$getstudentcountpending = "select * from student where stud_college = '$collid' and pds_filled ='0'    ";
				  $numberforstudpending = mysqli_query($con,$getstudentcountpending); 
                    $countingstudpending= mysqli_num_rows($numberforstudpending);
				}else {
					$countingstudpending = 0;
				}
								
          

                                     
                                       

                                        
        if($sort == 'Created'){
			 $getstudentcountcompleted = "select * from student where stud_college = '$collid' and pds_filled ='1' and pds_filledsem = '$s2' and year(pdsfilleddate)='$s3'  ";

		}else if ($sort == 'Updated') {
				 $getstudentcountcompleted = "select * from student where stud_college = '$collid' and pds_filled ='1' and pds_filledsem = '$s2' and year(pdsmodified)='$s3'  ";
		}else if($sort == 'Pending') {
				$getstudentcountcompleted = "select * from student where stud_college = '$collid' and pds_filled ='2' "; // None
		}else {
				 $getstudentcountcompleted = "select * from student where stud_college = '$collid' and pds_filled ='1' and pds_filledsem = '$s2' and year(pdsfilleddate)='$s3'  ";
		}
								


                                        $numberforstudcompleted = mysqli_query($con,$getstudentcountcompleted); 
                                        $countingstudcompleted= mysqli_num_rows($numberforstudcompleted);
                                 

                                                if(isset($courseidd)){ $cour =  $courseidd; }else { $cour = '0';}
                                 ?>
                                 ['<?php echo $colleges ?>',<?php echo $countingstudcompleted ?>, <?php echo $countingstudpending ?>, '#b87333' ,'<?php echo $collid ?>','<?php echo $cour  ?>','<?php echo $bgcolor ?>'],
                                <?php

                              
                           }
                    }

           ?>
      ]);

     
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,2,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "style" }
                       ]);

      var options = {
       // title :"Personal Data Sheets",
        width: 1000,
        height: 400,
        // legend: { position: 'top', maxLines: 3 },
        legend : 'none',
        bar: { groupWidth: '75%' },
        isStacked: true,
      };

       var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);

       google.visualization.events.addListener(chart, 'select', selectHandler);
      
         google.visualization.events.addListener(chart, 'click', function(){
           

         });

       


                function selectHandler() {
  var selection = chart.getSelection();
  var message = '';
  for (var i = 0; i < selection.length; i++) {
    var item = selection[i];

  
    if (item.row != null && item.column != null) {
        var se =  view.getColumnLabel(item.column);


      var nm = data.getFormattedValue(item.row,0);
      var id = data.getFormattedValue(item.row,4);
      var courseid = data.getFormattedValue(item.row,5);
      var color = data.getFormattedValue(item.row,6);

    
    
       message += '{row:none, column:' + item.column + '}; value (row 0)1 = ' + nm + '\n';
    } else if (item.row != null) {
         var se =  view.getColumnLabel(item.column);
       var nm = data.getFormattedValue(item.row,0);
         var id = data.getFormattedValue(item.row,4);
         var courseid = data.getFormattedValue(item.row,5);
          var color = data.getFormattedValue(item.row,6);
      message += '{row:none, column:' + item.column + '}; value (row 0)2 = ' + nm + '\n';
    } else if (item.column != null) {
         var se =  view.getColumnLabel(item.column);
       var nm = data.getFormattedValue(item.row,0);
         var id = data.getFormattedValue(item.row,4);
         var courseid = data.getFormattedValue(item.row,5);
          var color = data.getFormattedValue(item.row,6);
     message += '{row:none, column:' + item.column + '}; value (row 0)3 = ' + nm + '\n';
    }

  }

  if(message == ''){
    
  }else {
   

     tablecontents(courseid,id);
     function tablecontents(courseid,cid){

            
               $.ajax({
                       url : "ana_content.php",
                        method: "POST",
                         data  : {tablecourses:1,courseid:courseid,cid:cid,se:se},
                         success : function(data){
                        $('#table_contents').html(data);
                         }
                      })
                   
                
           }

    $('#table_selected').removeClass('d-none');
    $('#titlename').text(nm);

    //$('#titlename').css('color',color);
    $('#openclick').click();
   

    if(color == ''){
        $('#textt').text('Color Theme NOT SET');
         $('#cs').css('color','grey'); 
    }else {

        $('#cs').css('color',color); 
         $('#textt').text('Color Theme');


    }
 
  }
 
   
  

}



      }


          function drawChart2() {
         var data = google.visualization.arrayToDataTable([
        ['College', 'Completed', 'Pending', { role: "style" } , 'id','courseid','color' ],
        
     

           <?php 
                $getcolleges1 = "SELECT * FROM `colleges` ";
                          $gcol1 = mysqli_query($con,$getcolleges1); 
                          $getcc1= mysqli_num_rows($gcol1);
                         //  $get_id =  mysqli_insert_id($con); 
                       if ($getcc1>=1){
                      
                           while($row = mysqli_fetch_array($gcol1)){
                                $collid = $row['CollegeId'];
                                $colleges = $row['college'];
                                $bgcolor = $row['bgcolor'];
                                            $getcourses = " SELECT * FROM `course` where CollegeId = '$collid'  ";
                                                    $gcourses = mysqli_query($con,$getcourses); 
                                                    $gccourse= mysqli_num_rows($gcourses);
                                               
                                                     while($rg = mysqli_fetch_array($gcourses)){
                                                    $courseidd = $rg['courseid'];
                                                       
                               
                                                }


                                       

             if($sort =='Pending'){
                   $getstudentcountpending = "SELECT * FROM `shifting_history` where status = 'processing' and from_='$collid' and semester = '$s2' and year(datecreated) = '$s3' ";

                                        $numberforstudpending = mysqli_query($con,$getstudentcountpending); 
                                        $countingstudpending= mysqli_num_rows($numberforstudpending);

                                        $countingstudcompleted = 0;
                              }else 


                              if($sort == 'Approved'){
                              		  $getstudentcountcompleted = "SELECT * FROM `shifting_history` where status = 'Approved' and from_='$collid'  and semester = '$s2' and year(dateapproved) = '$s3'  ";
                                        $numberforstudcompleted = mysqli_query($con,$getstudentcountcompleted); 
                                        $countingstudcompleted= mysqli_num_rows($numberforstudcompleted);

                                        $countingstudpending = 0;
                                 
                              }else if($sort == 'Created') {
                              		 $getstudentcountpending = "SELECT * FROM `shifting_history` where status = 'processing' and from_='$collid'  and semester = '$s2' and year(datecreated) = '$s3'  ";

                                        $numberforstudpending = mysqli_query($con,$getstudentcountpending); 
                                        $countingstudpending= mysqli_num_rows($numberforstudpending);
                                         
                                          $getstudentcountcompleted = "SELECT * FROM `shifting_history` where status = 'Approved' and from_='$collid'  and semester = '$s2' and year(datecreated) = '$s3'  ";
                                        $numberforstudcompleted = mysqli_query($con,$getstudentcountcompleted); 
                                        $countingstudcompleted= mysqli_num_rows($numberforstudcompleted);
                              

                              }else {
                              		 $getstudentcountpending = "SELECT * FROM `shifting_history` where status = 'processing' and from_='$collid'  and semester = '$s2' and year(datecreated) = '$s3'  ";

                                        $numberforstudpending = mysqli_query($con,$getstudentcountpending); 
                                        $countingstudpending= mysqli_num_rows($numberforstudpending);
                                         
                                          $getstudentcountcompleted = "SELECT * FROM `shifting_history` where status = 'Approved' and from_='$collid'  and semester = '$s2' and year(datecreated) = '$s3'  ";
                                        $numberforstudcompleted = mysqli_query($con,$getstudentcountcompleted); 
                                        $countingstudcompleted= mysqli_num_rows($numberforstudcompleted);
                              }

                                       

                                                if(isset($courseidd)){ $cour =  $courseidd; }else { $cour = '0';}
                                 ?>
                                 ['<?php echo $colleges ?>',<?php echo $countingstudcompleted ?>, <?php echo $countingstudpending ?>, '#b87333' ,'<?php echo $collid ?>','<?php echo $cour  ?>','<?php echo $bgcolor ?>'],
                                <?php

                              
                           }
                    }

           ?>
      ]);

     
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,2,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "style" }
                       ]);

      var options = {
       // title :"Personal Data Sheets",
        width: 1000,
        height: 400,
        // legend: { position: 'top', maxLines: 3 },
        legend : 'none',
        bar: { groupWidth: '75%' },
        isStacked: true,
      };

       var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values1"));
      chart.draw(view, options);

       google.visualization.events.addListener(chart, 'select', selectHandler);
      
         google.visualization.events.addListener(chart, 'click', function(){
           

         });

       


                function selectHandler() {
  var selection = chart.getSelection();
  var message = '';
  for (var i = 0; i < selection.length; i++) {
    var item = selection[i];

  
    if (item.row != null && item.column != null) {
        var se =  view.getColumnLabel(item.column);


      var nm = data.getFormattedValue(item.row,0);
      var id = data.getFormattedValue(item.row,4);
      var courseid = data.getFormattedValue(item.row,5);
      var color = data.getFormattedValue(item.row,6);

    
    
       message += '{row:none, column:' + item.column + '}; value (row 0)1 = ' + nm + '\n';
    } else if (item.row != null) {
         var se =  view.getColumnLabel(item.column);
       var nm = data.getFormattedValue(item.row,0);
         var id = data.getFormattedValue(item.row,4);
         var courseid = data.getFormattedValue(item.row,5);
          var color = data.getFormattedValue(item.row,6);
      message += '{row:none, column:' + item.column + '}; value (row 0)2 = ' + nm + '\n';
    } else if (item.column != null) {
         var se =  view.getColumnLabel(item.column);
       var nm = data.getFormattedValue(item.row,0);
         var id = data.getFormattedValue(item.row,4);
         var courseid = data.getFormattedValue(item.row,5);
          var color = data.getFormattedValue(item.row,6);
     message += '{row:none, column:' + item.column + '}; value (row 0)3 = ' + nm + '\n';
    }

  }

  if(message == ''){
    
  }else {
   

     tablecontents(courseid,id);
     function tablecontents(courseid,cid){

            
               $.ajax({
                       url : "ana_content.php",
                        method: "POST",
                         data  : {tablecourses1:1,courseid:courseid,cid:cid,se:se},
                         success : function(data){
                        $('#table_contents').html(data);
                         }
                      })
                   
                
           }

    $('#table_selected').removeClass('d-none');
    $('#titlename').text(nm);

    //$('#titlename').css('color',color);
    $('#openclickmodal2').click();
   

    if(color == ''){
        $('#textt').text('Color Theme NOT SET');
         $('#cs').css('color','grey'); 
    }else {

        $('#cs').css('color',color); 
         $('#textt').text('Color Theme');


    }
 
  }
 
   
  

}



      }
     
     

     
    </script>   
    <script type="text/javascript">
      
      $(document).ready(function() {
                $('#closebtn').click(function() { 
        

           $('#table_selected').addClass('d-none');
        

      })

            });      
            
    </script>





     <div id="divide" class="row table-responsive">
       
       <div class="container">
           <h5 style="font-weight:bolder;">Personal Data Sheets</h5>
           <a href="../Records/PDS.php" style="font-size:12px">View PDS completed Records</a>
       </div>
         

              <div id="columnchart_values" class="" style="width: 100%; height: 500px;">
                <h6 style="text-align:center;" class="mt-5">
                  <div class="spinner-grow spinner-grow-sm" role="status">
                      <span class="visually-hidden"></span>
                    </div>
                     <div class="spinner-grow spinner-grow-sm" role="status">
                      <span class="visually-hidden"></span>
                    </div>
                     <div class="spinner-grow spinner-grow-sm" role="status">
                      <span class="visually-hidden"></span>
                    </div>
                     <div class="spinner-grow spinner-grow-sm" role="status">
                      <span class="visually-hidden"></span>

                    </div>
                    </h6>
              </div>

            
               
           
    </div> 

  
    <style type="text/css">
        .btn-close{box-sizing:content-box;width:1em;height:1em;padding:.25em .25em;color:#000;background:transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;border:0;border-radius:.25rem;opacity:.5}.btn-close:hover{color:#000;text-decoration:none;opacity:.75}.btn-close:focus{outline:0;box-shadow:0 0 0 .25rem rgba(13,110,253,.25);opacity:1}.btn-close.disabled,.btn-close:disabled{pointer-events:none;-webkit-user-select:none;-moz-user-select:none;user-select:none;opacity:.25}.btn-close-white{filter:invert(1) grayscale(100%) brightness(200%)}.toast{width:350px;max-width:100%;font-size:.875rem;pointer-events:auto;background-color:rgba(255,255,255,.85);background-clip:padding-box;border:1px solid rgba(0,0,0,.1);box-shadow:0 .5rem 1rem rgba(0,0,0,.15);border-radius:.25rem}.toast:not(.showing):not(.show){opacity:0}.toast.hide{display:none}.toast-container{width:-webkit-max-content;width:-moz-max-content;width:max-content;max-width:100%;pointer-events:none}.toast-container>:not(:last-child){margin-bottom:.75rem}.toast-header{display:flex;align-items:center;padding:.5rem .75rem;color:#6c757d;background-color:rgba(255,255,255,.85);background-clip:padding-box;border-bottom:1px solid rgba(0,0,0,.05);border-top-left-radius:calc(.25rem - 1px);border-top-right-radius:calc(.25rem - 1px)}.toast-header .btn-close{margin-right:-.375rem;margin-left:.75rem}

    </style>

      <button type="button" class="btn btn-primary d-none" id="openclick" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

<div class="modal fade bd-example-modal-lg" id="viewcourses1"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content" >
      <div class="modal-body">

        <button type="button" class="btn-close" aria-label="Close" id="closeprimary"  data-dismiss="modal" style="float:right;"></button>
               <div id="table_selected" class="d-none">
        <div class="row">
            
           <div class="container">
          
             
               
             
                     <h3 style="font-weight: bolder" class="" id="titlename"> </h3>
                           <div class="">
                             <div id="table_contents"></div> 
            
              </div>
                  
                  
              
               
          
              <h5 id="cs" style="text-align: right;"><i class="fas fa-palette"></i> <span id="textt" style="font-size: 12px;">Color theme</span></h5>
              <a href="../colleges/" style="float: right;font-size: 13px;">Change Theme</a>
           </div> 
           


     </div>
     </div> 
      </div>
    </div>
  </div>
</div>

 
     
      
     

   
     
                               </div> 
                               
                            </div> 
                              
                              </div>
                         </div> 


         
            <div class="card shadow mt-2">
                <div class="card-body">

                    <h6 style="font-weight:bolder;">Shifting Forms (Pending and Completed)</h6>
                    <a href="../Records/shifting_form.php" style="font-size:12px">View Shifting form completed Records</a>
                    <div class="table-responsive">
                        <div id="columnchart_values1" style="width: 100%; height: 500px;">
                             <h6 style="text-align:center;" class="mt-5">
                  <div class="spinner-grow spinner-grow-sm" role="status">
                      <span class="visually-hidden"></span>
                    </div>
                     <div class="spinner-grow spinner-grow-sm" role="status">
                      <span class="visually-hidden"></span>
                    </div>
                     <div class="spinner-grow spinner-grow-sm" role="status">
                      <span class="visually-hidden"></span>
                    </div>
                     <div class="spinner-grow spinner-grow-sm" role="status">
                      <span class="visually-hidden"></span>

                    </div>
                    </h6>
                        </div>

                        </div>
                </div>
            </div>




      <button type="button" class="btn btn-primary d-none" id="openclickmodal2" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

<div class="modal fade bd-example-modal-lg" id="viewcourses"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content" >
      <div class="modal-body">

        <button type="button" class="btn-close" aria-label="Close"  data-dismiss="modal" style="float:right;"></button>
               <div id="table_selected" class="d-none">
        <div class="row">
          
           <div class="container">
          
             
               
                
                     <h3 style="font-weight: bolder" class="" id="titlename"> </h3>
                           <div class="">
                             <div id="table_contents"></div> 
            
              </div>
                  
                  
              
               
          
              <h3 id="cs" style="text-align: right;"><i class="fas fa-palette"></i> <span id="textt" style="font-size: 12px;">Color theme</span></h3>
              <a href="../colleges/" style="float: right;font-size: 13px;">Change Theme</a>
           </div> 
           


     </div>
     </div> 
      </div>
    </div>
  </div>
</div>



</div>

            


	<?php
	
}


 ?>