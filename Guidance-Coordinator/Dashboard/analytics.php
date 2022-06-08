	<?php 
         $collegeid = $_SESSION['gc_collegid'];

	 ?>

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                  <script type="text/javascript">
                                    google.charts.load("current", {packages:["corechart"]});
                                    google.charts.setOnLoadCallback(drawChart1);
                                     google.charts.setOnLoadCallback(drawChart2);
                                    function drawChart1() {
                                      var data = google.visualization.arrayToDataTable([
                                        ['Courses', 'Number of students','id'],
                                        <?php 
                                             $getcollegedata = "select * from course where CollegeId = '$collegeid'  ";
                                                             $gettingcol = mysqli_query($con,$getcollegedata); 
                                                             $countingcollege= mysqli_num_rows($gettingcol);
                                                         
                                                          
                                                         while($gcollge = mysqli_fetch_array($gettingcol)){
                                                                   $collgid = $gcollge['courseid'];    
                                                                    $cc = $gcollge['course'];


                                                      $shifting_to = "select * from shifting_history where to_course = '$collgid'  ";
                                                     $gettinginfo_sto = mysqli_query($con,$shifting_to); 
                                                      $countinguser= mysqli_num_rows($gettinginfo_sto);
                                                   
                                                      while($row = mysqli_fetch_array($gettinginfo_sto)){
                                                            
                                                           
                                                            $cou= $row['to_college'];
                                                            $coursid = $row['to_course'];
                                                            $studid = $row['stud_id'];
                                                            
                                                        
                                                         

                                                        }   

                                                        if(isset($cou)){

                                                        }else {
                                                            $cou = $collegeid;
                                                        } 
                                                        if(isset($coursid)){

                                                        }else {
                                                            $coursid = 0;
                                                        }

                                                           

                                                              ?>
                                                             ['<?php echo $cou ?>',<?php echo $countinguser ?>,'<?php echo $coursid ?>'],
                                                             <?php 

                                                                } 
                                                        
                                                        

                                                     
                                                    
                                                  


                                     

                                         ?>


                                                  

                                                   
                                      ]);

                                      var options = {
                                        title: 'Shifters to <?php echo $_SESSION['gc_college'] ?>',
                                        is3D: false,
                                      };

                                      var chart = new google.visualization.PieChart(document.getElementById('stoi'));
                                      chart.draw(data, options);

                                              google.visualization.events.addListener(chart, 'select', selectHandler);


                                                function selectHandler() {
                                  var selection = chart.getSelection();
                                  var message = '';
                                  for (var i = 0; i < selection.length; i++) {
                                    var item = selection[i];

                                  
                                    if (item.row != null && item.column != null) {
                                      


                                      var courseid = data.getFormattedValue(item.row,2);
                                    

                                    
                                    
                                       message += '{row:none, column:' + item.column + '}; value (row 0)1 = ' + courseid + '\n';
                                    } else if (item.row != null) {
                                         var courseid = data.getFormattedValue(item.row,2);
                                      
                                      message += '{row:none, column:' + item.column + '}; value (row 0)2 = ' + courseid + '\n';
                                    } else if (item.column != null) {
                                        var courseid = data.getFormattedValue(item.row,2);
                                     message += '{row:none, column:' + item.column + '}; value (row 0)3 = ' + courseid + '\n';
                                    }

                                  }

                                  if(message == ''){
                                    
                                  }else {
                                    
                                  

                                $('#open').click();
                                $('#titlelabel').text('Shifting to <?php echo $_SESSION['gc_college']; ?>');

                                 $.ajax({
                                 url : "table.php",
                                  method: "POST",
                                 data  : {tableshiftto:1,courseid:courseid},
                                  success : function(data){
                                    $('#tablecontents_pc').html(data);

                                   }
                                 })
                                   
                                 
                                  }
                                 
                                   
                                  

                                }
                                    }

                                       function drawChart2() {
                                      var data = google.visualization.arrayToDataTable([
                                        ['Courses', 'Number of students','id'],
                                         <?php 

                                             $getcollegedatas = "select * from course where CollegeId = '$collegeid'  ";
                                                             $gettingcole = mysqli_query($con,$getcollegedatas); 
                                                             $countingcolleges= mysqli_num_rows($gettingcole);
                                                         
                                                          
                                                         while($gcollge = mysqli_fetch_array($gettingcole)){
                                                                   $collgid = $gcollge['courseid'];    
                                                                    $cc = $gcollge['course'];


                                                      $shifting_from = "select * from shifting_history where from_course = '$collgid'  ";
                                                     $gettinginfo_sfrom = mysqli_query($con,$shifting_from); 
                                                      $countinguser= mysqli_num_rows($gettinginfo_sfrom);
                                                   
                                                      while($row = mysqli_fetch_array($gettinginfo_sfrom)){
                                                            
                                                           
                                                            $cou= $row['from_college'];
                                                            $coursid = $row['to_course'];
                                                            $studid = $row['stud_id'];
                                                            
                                                        
                                                         

                                                        }    
                                                           

                                                              ?>
                                                             ['<?php echo $cou ?>',<?php echo $countinguser ?>,'<?php echo $coursid ?>'],
                                                             <?php 

                                                                } 

                                     

                                         ?>
                                      ]);

                                      var options = {
                                        title: 'Shifters from <?php echo $_SESSION['gc_college'] ?>',
                                        is3D:false,
                                      };

                                      var chart = new google.visualization.PieChart(document.getElementById('sfri'));
                                      chart.draw(data, options);


                                        google.visualization.events.addListener(chart, 'select', selectHandler);


                                                function selectHandler() {
                                  var selection = chart.getSelection();
                                  var message = '';
                                  for (var i = 0; i < selection.length; i++) {
                                    var item = selection[i];

                                  
                                    if (item.row != null && item.column != null) {
                                      


                                      var courseid = data.getFormattedValue(item.row,2);
                                    

                                    
                                    
                                       message += '{row:none, column:' + item.column + '}; value (row 0)1 = ' + courseid + '\n';
                                    } else if (item.row != null) {
                                         var courseid = data.getFormattedValue(item.row,2);
                                      
                                      message += '{row:none, column:' + item.column + '}; value (row 0)2 = ' + courseid + '\n';
                                    } else if (item.column != null) {
                                        var courseid = data.getFormattedValue(item.row,2);
                                     message += '{row:none, column:' + item.column + '}; value (row 0)3 = ' + courseid + '\n';
                                    }

                                  }

                                  if(message == ''){
                                    
                                  }else {
                                   

                                  $('#open').click();
                                $('#titlelabel').text('Shifting from <?php echo $_SESSION['gc_college']; ?>');

                                 $.ajax({
                                 url : "table.php",
                                  method: "POST",
                                 data  : {tableshiftfrom:1,courseid:courseid},
                                  success : function(data){
                                    $('#tablecontents_pc').html(data);

                                   }
                                 })
                                   
                                 
                                  }
                                 
                                   
                                  

                                }


                                    }
                                  </script>
                                     

                                       <div class="row">
                                          <div class="col-md-6">
                                               <div class="card shadow-sm mt-2 table-responsive">
                                                  <div class="card-body">
                                                     <div id="stoi" style="width: 100%; height: 300px; ">
                                                       <h6 style="font-weight:bolder;text-align: center;font-size: 13px;">No Data Shown</h6>
                                                     </div>
                                                  </div> 
                                                  
                                               </div> 
                                               
                                          </div> 

                                           <div class="col-md-6">
                                                <div class="card shadow-sm mt-2 table-responsive">
                                                  <div class="card-body">
                                                     <div id="sfri" style="width: 100%;height: 300px; ">
                                                        <h6 style="font-weight:bolder;text-align: center;font-size: 13px;">No Data Shown</h6>
                                                     </div>
                                                  </div> 
                                                  
                                               </div> 
                                          </div>
                                          
                                       </div> 


<button id="open" data-toggle="modal" data-target="#view" class="d-none"></button>
                                          
  <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl  " role="document">
    <div class="modal-content shadow" style="border:1px solid grey;margin-top: 110px;">
      <div class="modal-header">
        <h5 class="modal-title" id="titlelabel" style="font-weight:bolder;text-align: center;"></h5>
        <h6></h6>
        <button type="button" class="close " data-dismiss="modal"  aria-label="Close">
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
   <script src="../../js/jquery.js"></script>
                         
                              <link rel="stylesheet" type="text/css" href="../../offline/datatable.css"/>
 
<script type="text/javascript" src="../../offline/datatable.js"></script>

<script type="text/javascript">
      $(document).ready(function() {
             let tableview = new DataTable('#tablestudentview', {
      
                         "search": {
                        "caseInsensitive": false
                      }

    
      });
</script>