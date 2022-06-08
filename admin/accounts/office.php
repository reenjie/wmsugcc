  <?php $office = 1; ?>
  <div class="container">
     
        <div class="row">

            <div class="col-md-12">
              
              
             
            
           
          <div class="card shadow" >
             <div class="card-header">
               <button class="btn btn-primary" data-toggle="modal" data-target="#addadmingcc" data-backdrop="static" data-keyboard="false" style="font-size: 12px; margin-bottom:10px"><i class="fas fa-user-plus"></i> Add </button>

             
             </div> 
             
             <div class="card-body">
               <div class="row">
                 <div class="col-md-12 table-responsive">
      <table class="table table-striped table-hover  table-sm" id="tableadmins" >
          <thead>
            <tr>
               <th scope="col">Action</th>
                <th scope="col">Position</th>
               <th scope="col">Email</th>
              <th scope="col">Lastname </th>
              <th scope="col">Firstname</th>
              <th scope="col">Middename</th>


            </tr>
          </thead>
          <tbody>
            <?php 
                $sql = "  SELECT * FROM `administrator` where admin_type = 'GCC'  ";
                            $result = mysqli_query($con,$sql);
                            $count= mysqli_num_rows($result);
                         
                         if ($count>=1){
                         
                             while($row = mysqli_fetch_array($result)){
                              $adminid = $row['admin_id'];
                    ?>
                <tr style="font-size: 14px" id="admintb<?php echo $adminid  ?>">
            <td>
               <div class="btn-group">
              <button class="btn btn-light text-secondary editadmin" data-toggle="modal" data-target="#editadmin" data-backdrop="static" data-keyboard="false" data-pos="<?php echo $row['admin_position'] ?>" data-adminid="<?php echo $row['admin_id'] ?>" data-toedit="gcc" data-email="<?php echo $row['admin_email'] ?>" data-lname="<?php echo $row['admin_lname'] ?>" data-fname="<?php echo $row['admin_fname'] ?>" data-mname="<?php echo $row['admin_mname'] ?>" data-type="<?php echo $row['admin_type'] ?>" style="font-size: 12px" ><i class="fas fa-user-edit text-info" ></i></button>

              <button class="btn btn-light text-danger pwreset" data-adminid="<?php echo $row['admin_id'] ?>" style="font-size: 12px">PW-Reset</button>

            <!--  <button class="btn btn-light text-primary credentials" data-email="<?php echo $row['admin_email'] ?>" data-password="<?php echo $row['admin_password'] ?>" data-toggle="modal" data-target="#viewcredentials" data-backdrop="static" data-keyboard="false" style="font-size: 11px">credentials <i class="fas fa-unlock-alt"></i></button> -->

              <?php 
              if($admintoken == $adminid){

                ?>
                <button class="btn btn-light text-secondary " style="font-size: 12px" ><i class="fas fa-ban text-danger" ></i></button>

                <script type="text/javascript">
                  
                  $(document).ready(function() {

                          $('#admintb'+<?php echo $adminid ?>).addClass('table-info');
                        });      
                        
                </script>

                <?php
              }else{
                ?>
                <button class="btn btn-light text-secondary deleteadmin" data-adminid="<?php echo $row['admin_id'] ?>" style="font-size: 12px" ><i class="fas fa-trash text-danger" ></i></button>

                <?php
              }
               ?>
              
              

              
              
               </div> 
               
              
               
              

            </td>

            <td><span style="font-weight:bolder"><?php echo $row['admin_position'] ?></span></td>
               
                    <td><?php echo $row['admin_email'] ?></td>
                    <td><?php echo $row['admin_lname'] ?></td>
                    <td><?php echo $row['admin_fname'] ?></td>
                    <td><?php echo $row['admin_mname'] ?></td>
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
              $(document).ready(function() {
                 let table = new DataTable('#tableadmins', {
      
     "search": {
    "caseInsensitive": false
  }

});

            $('.pwreset').click(function() { 
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

            $('.credentials').click(function() { 
              var email = $(this).data('email');
              var password = $(this).data('password');
             $('#useremail').text(email);
             $('#userpass').text(password);
            
            })
          
                           
                           });   

                           $('.deleteadmin').click(function() { 
                            var id = $(this).data('adminid');
                       
                              Swal.fire({
                title: 'Are you sure ?',
                text: "You won't be able to revert this!",
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
                    'Event has been deleted.',
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
                                  var pos = $(this).data('pos');



                                   if (toedit == 'gcc'){
                                    $('#types').removeClass('d-none');
                                     $('#uptcolleges').addClass('d-none');

                                     $('#pos1').val(pos);
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