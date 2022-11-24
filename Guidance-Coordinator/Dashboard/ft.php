  <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary d-none" id="ftprompt" data-toggle="modal" data-target="#firsttimelogin" data-backdrop="static" data-keyboard="false">
      Launch demo modal
    </button>
   <script src="../../js/jquery.js"></script>
   
    <script type="text/javascript">
      
      $(document).ready(function() {
            $('#ftprompt').click();


              

            $('#okbtn').click(function() { 
           
           		$('#secon').addClass('d-none');
           		$('#last').removeClass('d-none');
            })
          
            });      
            
    </script>
    <!-- Modal -->
    <div class="modal fade" id="firsttimelogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog  " role="document">
        <div class="modal-content">
        
          <div class="modal-body">
           	

           
          
          <?php 
          if(isset($_SESSION['greetings'])){

          	?>
          	<div style="font-size: 15px" id="intro">
           			<span style="font-weight: bolder;font-size: 20px">Welcome <?php echo $_SESSION['fname'] ?> to WMSU GCC System!</span> <br>
           		 <div class="container">
           		 		We are setting you up <div class="spinner-grow spinner-grow-sm" role="status">
  <span class="visually-hidden"></span>
</div> <div class="spinner-grow spinner-grow-sm" role="status">
  <span class="visually-hidden"></span>
</div> <div class="spinner-grow spinner-grow-sm" role="status">
  <span class="visually-hidden"></span>
</div>
</div> 
           		 
           		
           	</div>
            <script type="text/javascript">
              
               var first = setInterval(function(){
       $('#intro').addClass('d-none');
        $('#secon').removeClass('d-none');
              location.reload();
               clearInterval(first);
            },2000);      
                    
            </script>
          	<?php
          	unset($_SESSION['greetings']);

          }else {
          	?>
          		 <div  id="secon">
           	 	<h6>Change your Password! </h6> <br> <button class="btn btn-primary" style="float:center;font-size:13px" id="okbtn">Ok</button>
           	 </div> 
           	 

          	<?php
          }

           ?> 	

           	 <div class="d-none"  id="secon">
           	 	<h6>Change your Password! </h6> <br> <button class="btn btn-primary" style="float:center;font-size:13px" id="okbtn">Ok</button>
           	 </div> 	 

           
           	  <div class="d-none" id="last">
           	  		
           	  		
           	  		 	
				<div class="container">
			<h6> <i style="font-size: 22px;" class="fas fa-user-lock"></i></h6>
			<p></p>
				<div class="row">
					 
					 <div class="container">
					 		
					<label style="font-size: 13px">Enter Current Password</label>
                                                  <input type="password" style="font-size: 13px" name="txtcurrent" id="txtcurrent" class="form-control"  required="" autofocus="">

                                                   <div id="notify"  style="margin-top: 5px;"></div> 
                                                 
                                                    	
                                                      <form method="post"  id="savenewpassword" onsubmit="return false">
                                                       <br> 
                                                       <input type="hidden" name="savenewpassword">
                                                        <label style="font-size: 13px">Enter New Password</label>
                                                  <input type="password" name="txtnew" style="font-size: 12px" id="txtnew" class="form-control" disabled=""> 
                                                     <div class="d-none" style="font-size: 12px" id="restrict">
                                                     
                                                    <div class="card">
                                                              <div class="container">
                                                                 <ul>
                                                                    <li id="upper">Must have Uppercase _Ex.(ABCDEFGHI)</li>  
                                                                    <li id="lower">Must have a Lowercase _Ex. (abcdefghi)</li>
                                                                    <li id="numb">Must have a Number _Ex.(123456789)</li>
                                                                    <li id="chara">Must have at Least 8 Characters _Ex.(********)</li>
                                                                 </ul>
                                                                 
                                                              </div>     
                                                        </div> 
                                                         <br>
                                                         </div> 
                                                  <label style="font-size: 13px" class="mt-2">ReEnter New Password</label>
                                                  <input type="password" name="txtreenter" style="font-size: 13px" id="txtreenter" class="form-control" disabled="" >
                                                  <div id="pregmatch"></div> 
                                                   
                                                        

                                                  <br> 
                                                  <button type="submit" style="font-size: 14px" id="btnsavepass" name="savenewpass" class="btn btn-success" disabled="" > Save Password  </button>
                                                    
                                                    <button type="button" style="font-size: 14px" data-dismiss="modal" id="btnlater" class="btn btn-light text-primary">Later</button>
                                                   </form>	

					 </div> 
						  	 
				
		
					
				</div>
				</div>
				<script src="../../offline/sweetalert.js"></script>
				 <script type="text/javascript">
                                                    	
                                                    	    $(document).ready(function() {
                                                    $('#btnlater').click(function(){

                                                         $.ajax({
                                                         url : "action.php",
                                                          method: "POST",
                                                         data  : {later:1},
                                                          success : function(data){
                                                         
                                                           }
                                                         })
                                                                      
                                                    })
                                                    	      	$('#txtcurrent').focus();

                                                    	      		    $('#txtcurrent').keyup(function(){ 
                              var value = $(this).val();
                            
                                   $.ajax({
                               url : "Manage.php",
                                method: "POST",
                                 data  : {compare:1,currentpass:value},
                                 success : function(data){
                                          
                                   if(value == '') {
                                        $('#txtreenter').attr('disabled',true);
                                        $('#btnsavepass').attr('disabled',true);
                                         $('#pregmatch').html('');
                                       $('#notify').html('');  
                                        $('#txtnew').attr('disabled',true);
                                        $('#btnsavepass').attr('disabled',true);
                                        
                                  }else {
                                           if (data == 'success') {
                                        $('#txtnew').removeAttr('disabled');
                                      //  $('#txtreenter').removeAttr('disabled');
                                        $('#txtnew').attr('required',true);
                                      //  $('#txtreenter').attr('required',true);
                                      $('#txtcurrent').attr('disabled',true);
                                        $('#notify').html('');
                                         $('#txtnew').focus();
                                   }else if (data == 'fail') {
                                        $('#txtnew').removeAttr('required');
                                     //   $('#txtreenter').removeAttr('required');
                                        $('#txtnew').attr('disabled',true);
                                        $('#txtreenter').attr('disabled',true);
                                        $('#txtnew').val('');
                                        $('#txtreenter').val('');
                                         $('#pregmatch').html('');
                                         $('#btnsavepass').attr('disabled',true);
                                        $('#notify').html('<h6 style="color: red;font-size:13px">Password doesnt Match your current pass <i class="fas fa-exclamation-triangle"></i></h6>');
                                   }


                                  }
                                 
                                   
                                 }
                              })
                        })

                  $('#savenewpassword').on('submit', function(event){
                       event.preventDefault();
                     
                       			 $.ajax({
                    	                 url : "Manage.php",
                    	                  method: "POST",
                    	                   data  : $(this).serialize(),
                    	                   success : function(data){
                    	      	Swal.fire(
								  'Password Changed!',
								  'Your Password changed Successfully!',
								  'success'
								).then((result) => {
									  if (result.isConfirmed) {
									   location.reload();
									  }
									})
                    	      			//changepassword();
                    	                   }
                    	                })
                       });  

                       $('#txtnew').keyup(function(){ 
                              var newvalue = $(this).val();

                              if(newvalue == '') {
                                   $('#restrict').addClass('d-none');
                                  
                                   $('#txtreenter').attr('disabled',true);
                                   $('#txtreenter').val('');

                                        $('#btnsavepass').attr('disabled',true);
                                         $('#pregmatch').html('');
                              }else {
                                  $('#restrict').removeClass('d-none'); 
                                   var lowerCaseLetters = /[a-z]/g;
                                   var upperCaseLetters = /[A-Z]/g;
                                    var numbers = /[0-9]/g;

                                    if(newvalue.match(lowerCaseLetters) && newvalue.match(upperCaseLetters) &&  newvalue.match(numbers) && newvalue.length >= 8 ) {
                                          $('#restrict').addClass('d-none');
                                          $('#txtreenter').removeAttr('disabled');
                                        $('#txtreenter').attr('required',true);
                                    }else {

                                     if(newvalue.match(lowerCaseLetters)) {
                                        $('#lower').addClass('d-none');
                                    }else {
                                        $('#lower').removeClass('d-none');
                                        $('#txtreenter').attr('disabled',true);
                                         $('#txtreenter').val('');
                                        $('#btnsavepass').attr('disabled',true);
                                         $('#pregmatch').html('');
                                    }

                                    if(newvalue.match(upperCaseLetters)) {
                                        $('#upper').addClass('d-none');
                                    }else {
                                        $('#upper').removeClass('d-none');
                                        $('#txtreenter').attr('disabled',true);
                                         $('#txtreenter').val('');
                                        $('#btnsavepass').attr('disabled',true);
                                         $('#pregmatch').html('');
                                    }

                                    if(newvalue.match(numbers)) {
                                        $('#numb').addClass('d-none');
                                    }else {
                                        $('#numb').removeClass('d-none');
                                        $('#txtreenter').attr('disabled',true);
                                         $('#txtreenter').val('');
                                        $('#btnsavepass').attr('disabled',true);
                                         $('#pregmatch').html('');
                                    }
                                    if(newvalue.length >= 8) { 
                                       $('#chara').addClass('d-none');
                                      
                                    }else {
                                         $('#chara').removeClass('d-none');
                                         $('#txtreenter').attr('disabled',true);
                                         $('#txtreenter').val('');
                                        $('#btnsavepass').attr('disabled',true);
                                         $('#pregmatch').html('');
                                    }

                                    }

                               




                              }
                              
                         })

                        $('#txtreenter').keyup(function(){ 
                              var valuenew = $('#txtnew').val();
                              var reentervalue = $(this).val();

                              if(valuenew == reentervalue) {
                                   $('#pregmatch').html('<span style="color: Green;font-size:13px">Password Match <i class="fas fa-check-circle"></i></span>');
                                  
                                 
                                   $('#btnsavepass').removeAttr('disabled');

                              } else {
                                    $('#pregmatch').html('<span style="color: red;font-size:13px">Password does not Match <i class="fas fa-times-circle"></i> </span>');
                                     $('#btnsavepass').attr('disabled',true);
                              }    


                         })  

                                                    	      });  
                                                          	
                                                    </script>



			
           	  		
           	  		 

           	  </div> 
           	  
    
    
           
          </div>
        
        </div>
      </div>
    </div>

