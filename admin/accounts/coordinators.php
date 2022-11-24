
<div class="container">
     
        <div class="row">

            <div class="col-md-12">
            	
            	
             
            
           
          <div class="card shadow" >
          	 <div class="card-header">
          	 	 <button class="btn btn-primary" data-toggle="modal" data-target="#addadmingc" data-backdrop="static" data-keyboard="false" style="font-size: 12px; margin-bottom:10px"><i class="fas fa-user-plus"></i> Add</button>

          	 	 
          	 </div> 
          	 
          	 <div class="card-body">
          	 	 <div class="row">
          	 	 	 <div class="col-md-12 table-responsive">
			<table class="table table-striped table-hover  table-sm" id="tableadmins" >
          <thead>
            <tr>
               <th scope="col">Action</th>
             <th scope="col">Status</th>
             <th scope="col">Effective Date</th>
              <th scope="col">Execution Date</th>
               <th scope="col">Email</th>
              <th scope="col">Lastname </th>
              <th scope="col">Firstname</th>
              <th scope="col">College</th>


            </tr>
          </thead>
          <tbody>
            <?php 
                $sql = "  SELECT * FROM `administrator` where admin_type = 'GC'  ";
                            $result = mysqli_query($con,$sql);
                            $count= mysqli_num_rows($result);
                         
                         if ($count>=1){
                         
                             while($row = mysqli_fetch_array($result)){
                              $college = $row['CollegeId'];
                              $adminid = $row['admin_id'];
                              $stat = $row['edstat'];


                                $sqls = " select * from colleges where CollegeId='$college'  ";
                                      $results = mysqli_query($con,$sqls); // run query
                                      
                                       while($rows = mysqli_fetch_array($results)){
                                        $co = $rows['college'];
                                       }


         
               
                    ?>
                     <tr style="font-size: 14px" >
                
            <td>

               <div class="btn-group">
              <button class="btn btn-light text-secondary editadmin " data-toggle="modal" data-target="#editadmin" data-backdrop="static" data-keyboard="false"  data-adminid="<?php echo $row['admin_id'] ?>" data-toedit="gc" data-coid="<?php echo $college ?>" data-college= "<?php echo $co ?>" data-email="<?php echo $row['admin_email'] ?>" data-lname="<?php echo $row['admin_lname'] ?>" data-fname="<?php echo $row['admin_fname'] ?>" data-mname="<?php echo $row['admin_mname'] ?>" data-type="<?php echo $row['admin_type'] ?>" style="font-size: 12px" data-edate ="<?php echo $row['admin_effectivedate'] ?>" ><i class="fas fa-user-edit text-info"  ></i></button>

              <?php 
              if($stat == 0){
                ?>
                 <button style="font-size: 12px" class="btn btn-light text-primary replace" data-co="<?php echo $co  ?>"  data-toggle="modal" data-target="#replaceadmingc" data-backdrop="static" data-name="<?php echo $row['admin_lname'].' '.$row['admin_fname']  ?>" data-keyboard="false" data-email="<?php echo $row['admin_email'] ?>" data-contactno="<?php echo $row['admin_contactno'] ?>" data-id="<?php echo $row['admin_id'] ?>" data-collegeid = "<?php echo $row['CollegeId'] ?>" >
                Replace
              </button>
                <?php
              }else {
                 ?>
                 <button style="font-size: 12px;" class="btn btn-light text-info rpinfo" data-toggle="modal" data-target="#coordinator_info"  data-rpid="<?php echo $row['rpby'] ?>" data-colinfo = "<?php echo $co ?>" data-edate = "<?php echo $row['admin_executiondate'] ?>" >
                Replaced <i class="fas fa-info-circle"></i>
              </button>
                <?php
              }
              //info_replaced
               ?>

             

               <button class="btn btn-light text-danger pwresets" data-adminid="<?php echo $row['admin_id'] ?>" style="font-size: 12px">PW-Reset</button>


              <!--  <button class="btn btn-light text-primary credentials" data-email="<?php echo $row['admin_email'] ?>" data-password="<?php echo $row['admin_password'] ?>" data-toggle="modal" data-target="#viewcredentials" data-backdrop="static" data-keyboard="false" style="font-size: 11px">credentials <i class="fas fa-unlock-alt"></i></button>-->
              <?php 
              if($admintoken == $adminid){

                ?>
                <button class="btn btn-light text-secondary " style="font-size: 12px" ><i class="fas fa-ban text-danger" ></i></button>

                <?php
              }else{
                   if($stat == 0){
                   ?>
                      <button class="btn btn-light " data-adminid="<?php echo $row['admin_id'] ?>" style="font-size: 12px;cursor: not-allowed;" ><i class="fas fa-trash text-secondary" ></i></button>
                  <?php
              }else {
                 ?>
                   <button class="btn btn-light text-secondary deleteadmin" data-adminid="<?php echo $row['admin_id'] ?>" style="font-size: 12px" ><i class="fas fa-trash text-danger" ></i></button>
                  
                <?php
              }
               
              }
               ?>
              
              

              
              
               </div> 
               
              
               
              

            </td>

            <td>
              <?php 
              if($stat == 0){
                ?>
                  <span class="badge badge-success">Active</span>
                <?php
              }else {
                 ?>
                  <span class="badge badge-danger">Inactive</span>
                <?php
              }

               ?>
            
            </td>
            <td><?php
            if($row['admin_effectivedate'] == ''){
              echo 'None';
            }else {
               echo date('F j,Y',strtotime($row['admin_effectivedate'])); 
            }

            
            

           ?></td>
            <td>
              <?php 
              if($row['admin_executiondate'] == ''){
                echo 'None';
              }else {
                echo date('F j,Y',strtotime($row['admin_executiondate']));
              }

               ?>
            </td>
                 
                    <td><?php echo $row['admin_email'] ?></td>
                    <td><?php echo $row['admin_lname'] ?></td>
                    <td><?php echo $row['admin_fname'] ?></td>
                    <td>
                      <?php 
                        echo $co ;
                                
                       ?>
                      


                    </td>
                  </tr>
                    <?php
                             }
                      }
             ?>
            
           
          </tbody>
        </table>

          	 	 	 </div> 
          	 	 	 
          	 	 </div> 



          
          
          	 </div> 
          	 
          </div>
          </div> 
              
     
    
          
        </div>
        </div>



       <link rel="stylesheet" type="text/css" href="../../offline/datatable.css"/>
 
<script type="text/javascript" src="../../offline/datatable.js"></script>
        <script type="text/javascript">
         
              $(document).ready(function() {
                 let table = new DataTable('#tableadmins', {
      
     "search": {
    "caseInsensitive": false
  }

});
             $('.pwresets').click(function() { 
               var id = $(this).data('adminid');
                 Swal.fire({
                title: 'Are you sure ?',
                text: "Resetting will change the user password to default, if it is done,a default login credentials will be send through Email. Continue?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e74a3b',
                cancelButtonColor: '#f6c23e',
                confirmButtonText: 'Yes, Reset it!'
              }).then((result) => {
                if (result.isConfirmed) {
                  
                  
                   var xhttp = new XMLHttpRequest();
                                     xhttp.onreadystatechange = function() {
                                      if (this.readyState == 4 && this.status == 200) {
                                     const datas = this.responseText;
                                   
                                       //  // SENDING CREDENTIALS
                                          Swal.fire(
                                      'Reset Successfully!',
                                      'User account has been reset and default login credentials has sent',
                                      'success'
                                    ).then((result) => {
                if (result.isConfirmed) {
                  location.reload();
                }
              })
                                   
                                                  }
                                               };
                                       xhttp.open("POST", "../../mailer/sendreset_credentials.php",true);
                                       xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                       xhttp.send("sendcredentials=1&userid="+id);
                  

                
                

                }
              })
            })

             $('.rpinfo').click(function(){
              var id = $(this).data('rpid');
              var icol = $(this).data('colinfo');
              var edate = $(this).data('edate');
           

               $.ajax({
               url : "Manage.php",
                method: "POST",
               data  : {info:id,col:icol,edate:edate},
                success : function(data){
                  $('#info_replaced').html(data);
                 }
               })
              

                       
             })


             $('.replace').click(function(){
                  var college = $(this).data('co');  
                  var contactno= $(this).data('contactno');
                  var email = $(this).data('email');
                  var name = $(this).data('name');  
                  var id = $(this).data('id');
                  var collid = $(this).data('collegeid');
                 
                  $('.college_').text(college);
                  $('#name_').text(name);
                  $('#email_').text(email);
                  $('#contact_').text(contactno);
                  $('#id_rp').val(id);
                  $('#collid').val(college)
                  $('#collid_').val(collid);
             })


              $('.credentials').click(function() { 
              var email = $(this).data('email');
              var password = $(this).data('password');
             $('#useremail').text(email);
             $('#userpass').text(password);
            
            })


                           $('.deleteadmin').click(function() { 
                            var id = $(this).data('adminid');
                            
                              Swal.fire({
                title: 'Are you sure ?',
                text: "All records done by this administrator will also be removed. Continue? ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e74a3b',
                cancelButtonColor: '#f6c23e',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.isConfirmed) {
                 
                  
                  
                     $.ajax({
                             url : "Manage.php",
                              method: "POST",
                               data  : {deleteadmin:1,id:id},
                               success : function(data){
                      Swal.fire(
                    'Deleted!',
                    'Account has been deleted.',
                    'success'
                  ).then((result) => {
                if (result.isConfirmed) {
                  location.reload();
                }
              })
                
                               }
                            })
                      
                      
                  //backend here

                
                

                }
              })


                              }) 

                              $('.editadmin').click(function() { 

                                var email = $(this).data('email');
                                var lname =$(this).data('lname');
                                var fname = $(this).data('fname');
                                var mname = $(this).data('mname');
                                var type = $(this).data('type');
                                  var id = $(this).data('adminid');
                                  var toedit = $(this).data('toedit');
                                  var coid = $(this).data('coid');
                                  var college = $(this).data('college');
                                  var edate = $(this).data('edate');
                                  

                                
                                  if (toedit == 'gc'){

                                    $('#types').addClass('d-none');
                                    $('#uptcolleges').removeClass('d-none');
                                    $('#colls').val(coid);
                                    //$('#collsval').text(college);
                                    $('#addate').val(edate);

                                    $('#colls').attr('value',coid);

                                 

                                  }

                                $('#em1').val(email);
                                $('#emdup').val(email);
                                $('#selectchoice1').val(type);
                                $('#adln1').val(lname);
                                $('#adfn1').val(fname);
                                $('#admn1').val(mname);
                                $('#adminid1').val(id);


                                
                                })  
          });

        
          
                
        </script>