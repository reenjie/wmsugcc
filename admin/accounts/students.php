<div class="container">

  <div class="row">

    <div class="col-md-12">





      <div class="card shadow">

        <div class="card-header">

          <select class="form-control mb-2" id="sort_college" style="font-size:14px">

            <?php 
                if(isset($_GET['rdct'])){
                  $sortby = $_GET['sortby'];
                  if(isset($_GET['sortby'])){
                      $getallcolleges_ = "select * from colleges where CollegeId='$sortby' ";
                 $gettingcolleges = mysqli_query($con,$getallcolleges_); 
               
               while($row = mysqli_fetch_array($gettingcolleges)){
                     ?>
            <option value="<?php echo $row['CollegeId'] ?>"><?php echo $row['college'] ?></option>

            <?php     
                 }

                  }else {
                       echo ' <option>Sort By College</option>';
                  }

                }

                   
               

                $getallcolleges_ = "select * from colleges  ";
                 $gettingcolleges = mysqli_query($con,$getallcolleges_); 
               
               while($row = mysqli_fetch_array($gettingcolleges)){
                     ?>
            <option value="<?php echo $row['CollegeId'] ?>"><?php echo $row['college'] ?></option>

            <?php     
                 }
              
               

               ?>
          </select>
          <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#addstud" data-backdrop="static"
            data-keyboard="false" style="font-size: 12px; margin-bottom:10px"><i class="fas fa-user-plus"></i>
            Add</button> -->

          <button class="btn btn-light" onclick="window.location.href='?rdct=Students' "
            style="font-size: 12px; margin-bottom:10px">Reload <i class="fas fa-sync"></i> </button>


        </div>

        <div class="card-body">
          <div class="table-responsive">

            <table class="table table-sm" id="tableadmins">
              <thead>
                <tr>
                  <th scope="col">Action</th>
                  <th scope="col">Status</th>
                  <th scope="col">email</th>

                  <th scope="col">lastname</th>
                  <th scope="col">firstname</th>
                  <th scope="col">middlename</th>

                  <th scope="col">Course & College</th>
                </tr>
              </thead>
              <tbody>
                <?php 
            include '../../GCC/create_form/connect.php';

              if(isset($_GET['rdct'])){
                if(isset($_GET['sortby'])){
                   $sortby = $_GET['sortby'];
                           $sql = " select * from student where stud_college = '$sortby' ";
                            $result = mysqli_query($con,$sql);
                            $count= mysqli_num_rows($result);
                         
                             while($row = mysqli_fetch_array($result)){
                              $courseid = $row['stud_course'];
                              $lg = $row['lg'];
                         ?>
                <tr>
                  <td>


                    <div class="btn-group" role="group" aria-label="Basic example">
                      <?php 

                                if($lg == 2){
                                  ?>
                      <button type="button" class="btn btn-light text-dark unblock"
                        data-id="<?php echo $row['stud_id'] ?>" style="font-size: 12px" data-toggle="tooltip"
                        data-placement="bottom" title="Unblock User"><i class="fas fa-circle"></i></button>
                      <?php
                                }else {
                                    ?>
                      <button type="button" class="btn btn-light text-dark block"
                        data-id="<?php echo $row['stud_id'] ?>" style="font-size: 12px" data-toggle="tooltip"
                        data-placement="bottom" title="Block User"><i class="fas fa-ban"></i></button>
                      <?php
                                }

                                 ?>


                      <button type="button" class="btn btn-light text-info modify" data-toggle="modal"
                        data-target="#user-edit" style="font-size: 12px" data-toggle="tooltip" data-placement="bottom"
                        title="Edit User" data-lname="<?php echo $row['stud_lname'] ?>"
                        data-fname="<?php echo $row['stud_fname'] ?>" data-mname="<?php echo $row['stud_mname'] ?>"
                        data-course="<?php echo $row['stud_course'] ?>" data-age="<?php echo $row['age'] ?>"
                        data-address="<?php echo $row['stud_address'] ?>" data-street="<?php echo $row['street'] ?>"
                        data-barangay="<?php echo $row['barangay'] ?>" data-city="<?php echo $row['city'] ?>"
                        data-country="<?php echo $row['country'] ?>" data-zipcode="<?php echo $row['zipcode'] ?>"
                        data-gender="<?php echo $row['gender'] ?>" data-status="<?php echo $row['status'] ?>"
                        data-contactno="<?php echo $row['contact_no'] ?>" data-studid="<?php echo $row['stud_id'] ?>"><i
                          class="fas fa-edit"></i></button>


                      <button type="button" class="btn btn-light delete text-danger"
                        data-id="<?php echo $row['stud_id'] ?>" style="font-size: 12px" data-toggle="tooltip"
                        data-placement="bottom" title="Delete User"><i class="fas fa-trash"></i></button>

                    </div>


                  </td>
                  <td>
                    <?php 
                            if($lg == 0){
                              echo '<span class="badge badge-danger">Offline</span>';
                            }else if ($lg ==1){
                               echo '<span class="badge badge-success">Online</span>';
                            }else if ($lg == 2){
                               echo '<span class="badge badge-dark">Blocked</span>';
                            }

                             ?>

                  </td>
                  <td class="text-primary"><?php echo $row['stud_email'] ?></td>

                  <td><?php echo $row['stud_lname'] ?></td>
                  <td><?php echo $row['stud_fname'] ?></td>
                  <td><?php echo $row['stud_mname'] ?></td>
                  <td>
                    <?php 
                                     $getcourses = "select * from course where courseid = '$courseid'  ";
                                      $getstudent_course = mysqli_query($con,$getcourses); 
                                    
                                    while($gcourse = mysqli_fetch_array($getstudent_course)){
                                              echo $gcourse['course'];   
                                              $collegeid = $gcourse['CollegeId'];

                                      }
                                        $getcolleges = "select * from colleges where CollegeId = '$collegeid'  ";
                                         $stud_college = mysqli_query($con,$getcolleges); 
                                        
                                       while($gcollege = mysqli_fetch_array($stud_college)){
                                             echo '<br> ('.$gcollege['college'].')';     
                                         }
                                      
                                       
                                   
                                    

                                    ?>
                  </td>
                </tr>

                <?php
                             }
                      

                }else {
                  
                      $sql = " select * from student ";
                            $result = mysqli_query($con,$sql); 
                            $count= mysqli_num_rows($result); 
                        
                      
                         
                             while($row = mysqli_fetch_array($result)){
                              $courseid = $row['stud_course'];
                              $lg = $row['lg'];
                         ?>
                <tr>
                  <td>


                    <div class="btn-group" role="group" aria-label="Basic example">
                      <?php 

                                if($lg == 2){
                                  ?>
                      <button type="button" class="btn btn-light text-dark unblock"
                        data-id="<?php echo $row['stud_id'] ?>" style="font-size: 12px" data-toggle="tooltip"
                        data-placement="bottom" title="Unblock User"><i class="fas fa-circle"></i></button>
                      <?php
                                }else {
                                     if ($lg ==1){
                                          ?>
                      <button type="button" class="btn btn-light text-dark" data-toggle="tooltip"
                        data-placement="bottom" title="Cant block online user"
                        style="font-size: 12px;cursor: not-allowed;"><i class="fas fa-ban"></i></button>
                      <?php
                                     }else {
                                          ?>
                      <button type="button" class="btn btn-light text-dark block"
                        data-id="<?php echo $row['stud_id'] ?>" style="font-size: 12px" data-toggle="tooltip"
                        data-placement="bottom" title="Block User"><i class="fas fa-ban"></i></button>
                      <?php
                                     }
                                }

                                 ?>


                      <button type="button" class="btn btn-light text-info modify" data-toggle="modal"
                        data-target="#user-edit" style="font-size: 12px" data-toggle="tooltip" data-placement="bottom"
                        title="Edit User" data-lname="<?php echo $row['stud_lname'] ?>"
                        data-fname="<?php echo $row['stud_fname'] ?>" data-mname="<?php echo $row['stud_mname'] ?>"
                        data-course="<?php echo $row['stud_course'] ?>" data-age="<?php echo $row['age'] ?>"
                        data-gender="<?php echo $row['gender'] ?>" data-status="<?php echo $row['status'] ?>"
                        data-street="<?php echo $row['street'] ?>" data-barangay="<?php echo $row['barangay'] ?>"
                        data-city="<?php echo $row['city'] ?>" data-country="<?php echo $row['country'] ?>"
                        data-zipcode="<?php echo $row['zipcode'] ?>" data-contactno="<?php echo $row['contact_no'] ?>"
                        data-studid="<?php echo $row['stud_id'] ?>"><i class="fas fa-edit"></i></button>


                      <button type="button" class="btn btn-light delete text-danger"
                        data-id="<?php echo $row['stud_id'] ?>" style="font-size: 12px" data-toggle="tooltip"
                        data-placement="bottom" title="Delete User"><i class="fas fa-trash"></i></button>

                    </div>


                  </td>
                  <td>
                    <?php 
                            if($lg == 0){
                              echo '<span class="badge badge-danger">Offline</span>';
                            }else if ($lg ==1){
                               echo '<span class="badge badge-success">Online</span>';
                            }else if ($lg == 2){
                               echo '<span class="badge badge-dark">Blocked</span>';
                            }

                             ?>

                  </td>
                  <td class="text-primary"><?php echo $row['stud_email'] ?></td>

                  <td><?php echo $row['stud_lname'] ?></td>
                  <td><?php echo $row['stud_fname'] ?></td>
                  <td><?php echo $row['stud_mname'] ?></td>
                  <td>
                    <?php 
                                     $getcourses = "select * from course where courseid = '$courseid'  ";
                                      $getstudent_course = mysqli_query($con,$getcourses); 
                                    
                                    while($gcourse = mysqli_fetch_array($getstudent_course)){
                                              echo $gcourse['course'];   
                                              $collegeid = $gcourse['CollegeId'];

                                      }
                                        $getcolleges = "select * from colleges where CollegeId = '$collegeid'  ";
                                         $stud_college = mysqli_query($con,$getcolleges); 
                                        
                                       while($gcollege = mysqli_fetch_array($stud_college)){
                                             echo '<br> ('.$gcollege['college'].')';     
                                         }
                                      
                                       
                                   
                                    

                                    ?>
                  </td>
                </tr>

                <?php
                             }
                      

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





<div class="modal fade" id="user-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="action.php" method="post">
        <div class="modal-body">
          <button type="button" class="close mb-4" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <br>
          <h6 style="font-weight:bolder;">Modify Student</h6>

          <input type="hidden" name="studid" id="studid">
          <h6 style="font-size:14px">Last Name :</h6>
          <input type="text" name="lname" class="form-control mb-2" id="lname" style="font-size: 13px;" required>

          <h6 style="font-size:14px">Given Name :</h6>
          <input type="text" name="fname" class="form-control mb-2" id="fname" style="font-size: 13px;" required>

          <h6 style="font-size:14px">Middle Name :</h6>
          <input type="text" name="mname" class="form-control mb-2" id="mname" style="font-size: 13px;" required>

          <h6 style="font-size:14px">Age :</h6>
          <input type="text" name="age" class="form-control mb-2" id="age" style="font-size: 13px;" required>

          <h6 style="font-size:14px">Address :</h6>
          <div class="row">
            <div class="col-md-5">
              <input type="text" name="st" id="st" class="form-control mb-2" style="font-size:14px"
                placeholder="Street">
            </div>
            <div class="col-md-7">
              <input type="text" name="br" id="br" class="form-control mb-2" style="font-size:14px"
                placeholder="Barangay" required>
            </div>
            <div class="col-md-6">
              <input type="text" name="cty" id="cty" class="form-control mb-2" style="font-size:14px" placeholder="City"
                required>
            </div>
            <div class="col-md-6">
              <input type="text" name="zc" id="zc" class="form-control mb-2" style="font-size:14px"
                placeholder="Zipcode" required>

            </div>
            <div class="col-md-12">
              <input type="text" name="ct" id="ct" class="form-control mb-3" style="font-size:14px"
                placeholder="Country" value="Philippines" required>
            </div>

          </div>

          <h6 style="font-size:14px">Contact No :</h6>
          <input type="text" name="contactno" class="form-control mb-2"
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '/');" maxlength="11"
            id="contactno" style="font-size: 13px;" required>


          <h6 style="font-size:14px">Gender :</h6>

          <select id="gender" name="gender" class="form-control mb-2" style="font-size:13px" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>

          <h6 style="font-size:14px">Status :</h6>
          <input type="text" name="status" class="form-control mb-2" id="status" style="font-size: 13px;" required>

          <h6 style="font-size:14px">Course :</h6>
          <select class="form-control" name="course" id="ucourse" style="font-size: 13px;" required>

            <?php 
               $getcourses = "select * from course  ";
                                      $getstudent_course = mysqli_query($con,$getcourses); 
                                    
                                    while($gcourse = mysqli_fetch_array($getstudent_course)){
                                           ?>
            <option value="<?php echo $gcourse['courseid'] ?>"><?php echo $gcourse['course'] ?></option>
            <?php

                                      }

             ?>

          </select>



        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-light text-primary" name="uptstud" style="font-size:13px">Save
            changes</button>
        </div>
      </form>

    </div>
  </div>
</div>



<link rel="stylesheet" type="text/css" href="../../offline/datatable.css" />

<script type="text/javascript" src="../../offline/datatable.js"></script>







<?php 
        if(isset($_SESSION['asuccess'])){


          ?>
<script type="text/javascript">
  $(document).ready(function () {
    Swal.fire(
      'Student Updated!',
      'Student data updated successfully!',
      'success'
    )

  });
</script>
<?php

          unset($_SESSION['asuccess']);
        }

         ?>
<script type="text/javascript">
  $(document).ready(function () {
    let table = new DataTable('#tableadmins', {

      "search": {
        "caseInsensitive": false
      }

    });


    $('#sort_college').change(function () {
      var val = $(this).val();

      window.location.href = '?rdct=Students&sortby=' + val + '&SortingByColleges';


    })

    $('.modify').click(function () {
      var lname = $(this).data('lname');
      var fname = $(this).data('fname');
      var mname = $(this).data('mname');
      var course = $(this).data('course');
      var age = $(this).data('age');
      var gender = $(this).data('gender');
      var status = $(this).data('status');
      var address = $(this).data('address');
      var contactno = $(this).data('contactno');
      var studid = $(this).data('studid');

      var street = $(this).data('street');
      var barangay = $(this).data('barangay');
      var city = $(this).data('city');
      var country = $(this).data('country');
      var zipcode = $(this).data('zipcode');

      $('#st').val(street);
      $('#br').val(barangay);
      $('#cty').val(city);
      $('#ct').val(country);
      $('#zc').val(zipcode);
      $('#age').val(age);
      $('#gender').val(gender);
      $('#status').val(status);
      $('#address').val(address);
      $('#lname').val(lname);
      $('#fname').val(fname);
      $('#mname').val(mname);
      $('#ucourse').val(course);
      $('#contactno').val(contactno);
      $('#studid').val(studid);

    })


    $('.block').click(function () {
      var id = $(this).data('id');


      Swal.fire({
        title: 'Are you sure ?',
        text: "Blocking the student will prevent him/her from accessing his/her account.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e74a3b',
        cancelButtonColor: '#f6c23e',
        confirmButtonText: 'Yes, Block it!'
      }).then((result) => {
        if (result.isConfirmed) {



          $.ajax({
            url: "action.php",
            method: "POST",
            data: {
              block: 1,
              id: id
            },
            success: function (data) {

              Swal.fire(
                'Block Successfully!',
                'Student has been Block from accessing his/her account.',
                'success'
              ).then((result) => {
                if (result.isConfirmed) {
                  location.reload();
                }
              })


            }
          })






        }
      })

    })

    $('.unblock').click(function () {
      var id = $(this).data('id');

      $.ajax({
        url: "action.php",
        method: "POST",
        data: {
          unblock: 1,
          id: id
        },
        success: function (data) {

          Swal.fire(
            'Unblock Successfully!',
            'Student can now access the his/her account',
            'success'
          ).then((result) => {
            if (result.isConfirmed) {
              location.reload();
            }
          })


        }
      })
    })

    $('.delete').click(function () {
      var id = $(this).data('id');
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
            url: "Manage.php",
            method: "POST",
            data: {
              deletestudent: 1,
              id: id
            },
            success: function (data) {
              Swal.fire(
                'Deleted!',
                'Student has been deleted.',
                'success'
              ).then((result) => {
                if (result.isConfirmed) {
                  location.reload();
                }
              })

            }
          })






        }
      })

    })


  });
</script>