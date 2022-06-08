
                                <script src="../../js/jquery.js"></script>

                                  <?php 
                                  if(isset($pds)){
                                    ?>

                                     <div class="container mb-3">
                                    <div class="card shadow">
                                      <h6 style="font-size:13px" class="font-weight-bold py-2 px-2">Advance Sorting</h6>
                                      <div class="card-body">
                                        
                                    
                                    <div class="row">
                                      <div class="col-md-4">
                                  <select class="form-control" id="sorting_" style="font-size:13px">
                                    <option value="null">Select Sort</option>
                                      <option value="Created">Created</option>
                                      <option value="Updated">Modified</option>
                                  </select>
                                        
                                      </div>
                                      <div class="col-md-4">
                                    <select class="form-control" id="semester_"  style="font-size:13px">
                                    <option value="null">Select Semester</option>
                                      <option value="summer">Summer</option>
                                      <option value="1stsem">First Semester</option>
                                      <option value="2ndsem">Second Semester</option>
                                  </select>
                                      </div>
                                      <div class="col-md-4">
                                         <select class="form-control" id="year_"  style="font-size:13px">
                                    <option value="null">Select Year</option>
                                        <?php 
                                        $current_year = date('Y');
                                        for($i = $current_year; $i >= 2020 ; $i-- ){

                                          ?>
                                          <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                          <?php

                                        }

                                     

                                         ?>

                                  </select>
                                      </div>

                                      <div class="col-md-10">
                                          
                  <select class="form-control mb-2 mt-2" id="sort_college" style="font-size:14px">
             
                <?php 
                if(isset($_GET['rdct'])){
                  $sortby = $_GET['sort_by_college'];
                  if(isset($_GET['sort_by_college'])){
                      $getallcolleges_ = "select * from colleges where CollegeId='$sortby' ";
                 $gettingcolleges = mysqli_query($con,$getallcolleges_); 
               
               while($row = mysqli_fetch_array($gettingcolleges)){
                     ?>
                     <option value="<?php echo $row['CollegeId'] ?>" ><?php echo $row['college'] ?></option>

                     <?php     
                 }

                  }else {
                       echo ' <option>Sort By College</option>';
                  }

                }else {
                    echo ' <option>Sort By College</option>';
              
              
                }

                   
               
                  $getallcolleges_ = "select * from colleges  ";
                 $gettingcolleges = mysqli_query($con,$getallcolleges_); 
               
               while($row = mysqli_fetch_array($gettingcolleges)){
                     ?>
                     <option value="<?php echo $row['CollegeId'] ?>" ><?php echo $row['college'] ?></option>

                     <?php     
                 }
               

               ?>
            </select>


                                      </div>
                                      <div class="col-md-2 mt-3">
                                        <a href="PDS.php" class="mb-2 mt-2">Reload</a>
                                      </div>
                                    </div>

                                      </div>
                                    </div>
                                  </div>

                                      <script type="text/javascript">
                                      $(document).ready(function() {
                                      $('#sorting_').change(function(){
                                       
                                        var sort =$(this).val();
                                         var sem = $('#semester_').val();
                                          var yr =$('#year_').val();

                                        if(sem == 'null' && yr == 'null'){
                                         
                                          $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })

                                        }else if (sem != 'null' && yr != 'null'){
                                        //  alert(sort+' '+sem+' '+yr);
                                              $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }else if (sem != 'null' ){
                                        //  alert(sort+' '+sem);
                                              $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }else if (yr != 'null') {
                                        //  alert(sort+' '+yr);
                                              $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }



                                      })

                                      $('#semester_').change(function(){

                                           var sort =$('#sorting_').val();
                                         var sem = $(this).val();
                                          var yr =$('#year_').val();

                                        if(sort == 'null' && yr == 'null'){
                                         
                                                $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })

                                        }else if (sort != 'null' && yr != 'null'){
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }else if (sort != 'null' ){
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }else if (yr != 'null') {
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }
                                      
                                      })

                                      $('#year_').change(function(){
                                         var sort =$('#sorting_').val();
                                         var sem = $('#semester_').val();
                                          var yr =$(this).val();

                                        if(sort == 'null' && sem == 'null'){
                                         
                                                $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })

                                        }else if (sort != 'null' && sem != 'null'){
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }else if (sort != 'null' ){
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }else if (sem != 'null') {
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_pds:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }
                                      
                                      
                                      })

                                      $('#sort_college').change(function(){
                                        var col = $(this).val();
                                          window.location.href='?rdct&sort_by_college='+col; 
                                      })
                                    
                                      });
                                  </script>


                                    <?php
                                  }


                                  if(isset($shifting)){
                                    ?>
                                     <div class="container mb-3">
                                    <div class="card shadow">
                                      <h6 style="font-size:13px" class="font-weight-bold py-2 px-2">Advance Sorting</h6>
                                      <div class="card-body">
                                        
                                    
                                    <div class="row">
                                      <div class="col-md-4">
                                  <select class="form-control" id="sorting_" style="font-size:13px">
                                    <option value="null">Select Sort</option>
                                      <option value="Created">Created</option>
                                      <option value="approved">Approved</option>
                                  </select>
                                        
                                      </div>
                                      <div class="col-md-4">
                                    <select class="form-control" id="semester_"  style="font-size:13px">
                                    <option value="null">Select Semester</option>
                                      <option value="summer">Summer</option>
                                      <option value="1stsem">First Semester</option>
                                      <option value="2ndsem">Second Semester</option>
                                  </select>
                                      </div>
                                      <div class="col-md-4">
                                         <select class="form-control" id="year_"  style="font-size:13px">
                                    <option value="null">Select Year</option>
                                        <?php 
                                        $current_year = date('Y');
                                        for($i = $current_year; $i >= 2020 ; $i-- ){

                                          ?>
                                          <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                          <?php

                                        }

                                     

                                         ?>

                                  </select>
                                      </div>

                                               <div class="col-md-10">
                                          
                  <select class="form-control mb-2 mt-2" id="sort_college" style="font-size:14px">
             
                <?php 
                if(isset($_GET['rdct'])){
                  $sortby = $_GET['sort_by_college'];
                  if(isset($_GET['sort_by_college'])){
                      $getallcolleges_ = "select * from colleges where CollegeId='$sortby' ";
                 $gettingcolleges = mysqli_query($con,$getallcolleges_); 
               
               while($row = mysqli_fetch_array($gettingcolleges)){
                     ?>
                     <option value="<?php echo $row['CollegeId'] ?>" ><?php echo $row['college'] ?></option>

                     <?php     
                 }

                  }else {
                       echo ' <option>Sort By College</option>';
                  }

                }else {
                    echo ' <option>Sort By College</option>';
              
              
                }

                   
               
                  $getallcolleges_ = "select * from colleges  ";
                 $gettingcolleges = mysqli_query($con,$getallcolleges_); 
               
               while($row = mysqli_fetch_array($gettingcolleges)){
                     ?>
                     <option value="<?php echo $row['CollegeId'] ?>" ><?php echo $row['college'] ?></option>

                     <?php     
                 }
               

               ?>
            </select>


                                      </div>
                                      <div class="col-md-2 mt-3">
                                        <a href="shifting_form.php" class="mb-2 mt-2">Reload</a>
                                      </div>
                                    </div>

                                      </div>
                                    </div>
                                  </div>

                                      <script type="text/javascript">
                                      $(document).ready(function() {
                                      $('#sorting_').change(function(){
                                       
                                        var sort =$(this).val();
                                         var sem = $('#semester_').val();
                                          var yr =$('#year_').val();

                                        if(sem == 'null' && yr == 'null'){
                                         
                                          $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_sf:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })

                                        }else if (sem != 'null' && yr != 'null'){
                                        //  alert(sort+' '+sem+' '+yr);
                                              $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_sf:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }else if (sem != 'null' ){
                                        //  alert(sort+' '+sem);
                                              $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_sf:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }else if (yr != 'null') {
                                        //  alert(sort+' '+yr);
                                              $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_sf:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }



                                      })

                                      $('#semester_').change(function(){

                                           var sort =$('#sorting_').val();
                                         var sem = $(this).val();
                                          var yr =$('#year_').val();

                                        if(sort == 'null' && yr == 'null'){
                                         
                                                $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_sf:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })

                                        }else if (sort != 'null' && yr != 'null'){
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_sf:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }else if (sort != 'null' ){
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_sf:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }else if (yr != 'null') {
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_sf:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }
                                      
                                      })

                                      $('#year_').change(function(){
                                         var sort =$('#sorting_').val();
                                         var sem = $('#semester_').val();
                                          var yr =$(this).val();

                                        if(sort == 'null' && sem == 'null'){
                                         
                                                $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_sf:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })

                                        }else if (sort != 'null' && sem != 'null'){
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_sf:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }else if (sort != 'null' ){
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_sf:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }else if (sem != 'null') {
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_sf:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }
                                      
                                      
                                      })

                                         $('#sort_college').change(function(){
                                        var col = $(this).val();
                                          window.location.href='?rdct&sort_by_college='+col; 
                                      })
                                    
                                      });
                                  </script>


                                    <?php
                                  }

                                  if(isset($logs)){
                                    
                                       ?>
                                     <div class="container mb-3">
                                    <div class="card shadow">
                                      <h6 style="font-size:13px" class="font-weight-bold py-2 px-2">Advance Sorting</h6>
                                      <div class="card-body">
                                        
                                    
                                    <div class="row">
                                      <div class="col-md-4">
                                  <select class="form-control" id="sorting_" style="font-size:13px">
                                    <option value="null">Select Sort</option>
                                      <option value="Add">Add</option>
                                      <option value="Delete">Delete</option>
                                        <option value="Manage">Manage</option>
                                          <option value="Enable-Disable">Enable-Disable</option>
                                            <option value="View-Print-Modify">View-Print-Modify</option>
                                              <option value="approve">approve</option>
                                  </select>
                                        
                                      </div>
                                      <div class="col-md-4">
                                    <select class="form-control" id="semester_"  style="font-size:13px">
                                    <option value="null">Select Semester</option>
                                      <option value="summer">Summer</option>
                                      <option value="1stsem">First Semester</option>
                                      <option value="2ndsem">Second Semester</option>
                                  </select>
                                      </div>
                                      <div class="col-md-4">
                                         <select class="form-control" id="year_"  style="font-size:13px">
                                    <option value="null">Select Year</option>
                                        <?php 
                                        $current_year = date('Y');
                                        for($i = $current_year; $i >= 2020 ; $i-- ){

                                          ?>
                                          <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                          <?php

                                        }

                                     

                                         ?>

                                  </select>
                                      </div>
                                    </div>

                                      </div>
                                    </div>
                                  </div>

                                      <script type="text/javascript">
                                      $(document).ready(function() {
                                      $('#sorting_').change(function(){
                                       
                                        var sort =$(this).val();
                                         var sem = $('#semester_').val();
                                          var yr =$('#year_').val();

                                        if(sem == 'null' && yr == 'null'){
                                         
                                          $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_log:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })

                                        }else if (sem != 'null' && yr != 'null'){
                                        //  alert(sort+' '+sem+' '+yr);
                                              $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_log:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }else if (sem != 'null' ){
                                        //  alert(sort+' '+sem);
                                              $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_log:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }else if (yr != 'null') {
                                        //  alert(sort+' '+yr);
                                              $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_log:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }



                                      })

                                      $('#semester_').change(function(){

                                           var sort =$('#sorting_').val();
                                         var sem = $(this).val();
                                          var yr =$('#year_').val();

                                        if(sort == 'null' && yr == 'null'){
                                         
                                                $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_log:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })

                                        }else if (sort != 'null' && yr != 'null'){
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_log:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }else if (sort != 'null' ){
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_log:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }else if (yr != 'null') {
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_log:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }
                                      
                                      })

                                      $('#year_').change(function(){
                                         var sort =$('#sorting_').val();
                                         var sem = $('#semester_').val();
                                          var yr =$(this).val();

                                        if(sort == 'null' && sem == 'null'){
                                         
                                                $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_log:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })

                                        }else if (sort != 'null' && sem != 'null'){
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_log:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }else if (sort != 'null' ){
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_log:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }else if (sem != 'null') {
                                                 $.ajax({
                                          url : "sorted.php",
                                           method: "POST",
                                          data  : {sort_log:1,sort:sort,sem:sem,yr:yr},
                                           success : function(data){
                                            $('#contentss').html(data);
                                            }
                                          })
                                        }
                                      
                                      
                                      })
                                    
                                      });
                                  </script>

                                    <?php
                                  }

                                   ?>
                                  
                                