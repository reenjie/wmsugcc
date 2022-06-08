 <!-- Modal -->
      <div class="modal fade" id="usergreetings_guide" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
          <div class="modal-content">
            
            <div class="modal-body shadow" style="font-size: 14px">
               <div class="container ">
                        
                    

                        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

                         <div class="row">
                                  
                             
                                  <h6 style="font-weight: bolder;">CHANGE YOUR PASSWORD <span class="text-danger" style="font-size:11px"></span></h6>
                                
                                  <div class="container">
                                        
          <label>Enter Current Password</label>
                                                  <input type="password" style="font-size: 13px" name="txtcurrent" id="txtcurrent" class="form-control"  required="" autofocus="">

                                                 
                                                 
                                                      
                                                      <form method="post"  id="savenewpassword" action="action.php">
                                                       <br> 
                                                       <input type="hidden" name="savenewpassword">
                                                        <label>Enter New Password</label>
                                                  <input type="password" name="txtnew" style="font-size: 13px" id="txtnew" class="form-control" disabled=""> 
                                                     <div class="d-none" id="restrict">
                                                     
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
                                                  <label>ReEnter New Password</label>
                                                  <input type="password" name="txtreenter" style="font-size: 13px" id="txtreenter" class="form-control" disabled="" >
                                                  <div id="pregmatch"></div> 
                                                   
                                                        

                                                  <br> 
                                                  <button type="submit" id="btnsavepass" name="savenewpass" class="btn btn-success" disabled="" > Save Password  </button>
                                                 
                                                   </form>  
                                  </div> 
                                  


                             
                               
                            
                         </div> 
                         



               </div> 
               
            
            
              
      
             
            </div>
        
          </div>
        </div>
      </div>
      <script src="../../js/jquery.js"></script>
     
      <script type="text/javascript">
        $(document).ready(function() {
             $('#cp').click();

               $('#txtcurrent').keyup(function(){ 
                              var value = $(this).val();
                            
                                   $.ajax({
                               url : "action.php",
                                method: "POST",
                                 data  : {compare:1,currentpass:value},
                                 success : function(data){
                                          
                                   if(value == '') {
                                        $('#txtreenter').attr('disabled',true);
                                        $('#btnsavepass').attr('disabled',true);
                                         $('#pregmatch').html('');
                                     //  $('#notify').html('');  
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
                                      //  $('#notify').html('<h6 style="color: red">Password doesnt Match your current pass <i class="fas fa-exclamation-triangle"></i></h6>');
                                   }


                                  }
                                 
                                   
                                 }
                              })
                        })

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
                                   $('#pregmatch').html('<span style="color: Green">Password Match <i class="fas fa-check-circle"></i></span>');
                                  
                                 
                                   $('#btnsavepass').removeAttr('disabled');

                              } else {
                                    $('#pregmatch').html('<span style="color: red">Password does not Match <i class="fas fa-times-circle"></i> </span>');
                                     $('#btnsavepass').attr('disabled',true);
                              }    


                         })  


            
        });
     
        
              
      </script>
