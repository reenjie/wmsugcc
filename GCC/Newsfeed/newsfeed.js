  $(document).ready(function() {

                                                        const inpfile = document.getElementById("image"); //id of input tag type file
                                                        const regform=document.getElementById ("form"); // div containing the form
                                                        const previewimage=regform.querySelector("#configimage"); // id of img tag
                                    
                                                         inpfile.addEventListener("change",function () {
                                                            const file = this.files[0];
                                    
                                                            if(file) {
                                                                const reader = new FileReader();
                                                                
                                                                
                                                                reader.addEventListener("load",function() {
                                                                    previewimage.setAttribute("src",this.result);
                                                                   
                                                                });
                                                                reader.readAsDataURL(file);
                                                            }
                                                         });


                                                       const inpfile1 = document.getElementById("uptimage"); //id of input tag type file
                                                        const regform1=document.getElementById ("uptform"); // div containing the form
                                                        const previewimage1=regform1.querySelector("#uptconfigimage"); // id of img tag
                                    
                                                         inpfile1.addEventListener("change",function () {
                                                            const file1 = this.files[0];
                                    
                                                            if(file1) {
                                                                const reader1 = new FileReader();
                                                                
                                                                
                                                                reader1.addEventListener("load",function() {
                                                                    previewimage1.setAttribute("src",this.result);
                                                                   
                                                                });
                                                                reader1.readAsDataURL(file1);
                                                            }
                                                         });


                                         $('#checkwphoto').click(function() {
                                              if($(this).prop("checked") == true) {
                                                   $('#image').removeAttr('disabled'); 
                                                   $('#image').attr('required','true');  
                                                   $('#trigger').val('wimage');  

                                                 }
                                              else if($(this).prop("checked") == false) {
                                                      $('#image').attr('disabled','true');  
                                                      $('#image').removeAttr('required');  
                                                      $('#trigger').val('noimage');                        
                                               }
                                          });


                                          $('#checkwlink').click(function() {
                                               if($(this).prop("checked") == true) {
                                                      $('#linkadd').removeClass('d-none');  
                                                      $('#txtlink').text('Remove link');    
                                                      $('#txtlinks').attr('required','true');                  
                                                  }
                                               else if($(this).prop("checked") == false) {
                                                     $('#linkadd').addClass('d-none');    
                                                     $('#txtlink').text('Add link');  
                                                     $('#txtlinks').removeAttr('required');                             
                                                }
                                             });

                                           $('#uptcheckwphoto').click(function() {
                                                if($(this).prop("checked") == true) {
                                                        $('#uptimage').removeAttr('disabled'); 
                                                   $('#uptimage').attr('required','true');  
                                                   $('#upttrigger').val('wimage');                             
                                                   }
                                                else if($(this).prop("checked") == false) {
                                                       $('#uptimage').attr('disabled','true');  
                                                      $('#uptimage').removeAttr('required');  
                                                      $('#upttrigger').val('noimage');                               
                                                 }
                                              });
                                        $('#newsfeedsavenew').on('submit', function(event){
                                           event.preventDefault();
                                           var formData = new FormData(this);
                                                  $.ajax({
                                                           url : $(this).attr('action'),
                                                           data:formData,
                                                            cache:false,
                                                            contentType: false,
                                                            processData: false,
                                                            method: "POST",
                                                          
                                                             success : function(data){
                                                               $('#addnew').modal('hide');
                                                        contents ();
                                                         Swal.fire(
                                                    'News feed ',
                                                    'Added Successfully!',
                                                    'success'
                                                    );  
                                                       
                                                             }
                                                          })
                                           });
                                        $('#uptnewsfeedsavenew').on('submit', function(event){
                                           event.preventDefault();
                                           var formData = new FormData(this);
                                                  $.ajax({
                                                           url : $(this).attr('action'),
                                                           data:formData,
                                                            cache:false,
                                                            contentType: false,
                                                            processData: false,
                                                            method: "POST",
                                                          
                                                             success : function(data){
                                                               $('#edit').modal('hide');
                                                        contents ();
                                                         Swal.fire(
                                                    'News feed ',
                                                    'Updated Successfully!',
                                                    'success'
                                                    );  
                                                        
                                                             }
                                                          })
                                           });
                                        

                                          $('#addnew').on('hidden.bs.modal', function (e) {
                                                     $('#linkadd').addClass('d-none');    
                                                     $('#txtlink').text('Add link'); 
                                                      $('#image').val('');   
                                                      $('#image').attr('disabled','true'); 
                                                      $('#txtlinks').removeAttr('required'); 
                                                       $('#txtlinks').val('');  
                                                      $('#checkwphoto').prop('checked', false);   
                                                       $('#checkwlink').prop('checked', false)
                                                      $('#exampleFormControlTextarea1').val('');
                                                      $('#configimage').attr('src','../img/undraw_moments_0y20.png');
                                                      $('#txttitle').val('');
                                                       $('#trigger').val('noimage');
                             })
                                           $('#edit').on('hidden.bs.modal', function (e) {
                                                     
                                                      $('#uptimage').val('');   
                                                      $('#uptimage').attr('disabled','true'); 
                                                      
                                                      $('#uptcheckwphoto').prop('checked', false);   
                                                       $('#upttrigger').val('noimage'); 
                                                      $('#exampleFormControlTextarea1').val('');
                                                       $('#trigger').val('noimage');
                                                      
                             })
                                              
                                       
                                          
                                           contents (); 
                                              function contents (){
                                                  
                                                   var xhttp = new XMLHttpRequest();
                                                  xhttp.onreadystatechange = function() {
                                                   if (this.readyState == 4 && this.status == 200) {
                                                  const data = this.responseText;
                                                
                                                    // Your condition here if data success.
                                                  $('#contentss').html(data);
                                                               }
                                                            };
                                                    xhttp.open("POST", "../include/assets/manage.php",true);
                                                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                                    xhttp.send("contentfornewsfeed=1");
                                                        
                                                                 
                                              } 

                                               function peercontents (){
                                                  
                                                   var xhttp = new XMLHttpRequest();
                                                  xhttp.onreadystatechange = function() {
                                                   if (this.readyState == 4 && this.status == 200) {
                                                  const data = this.responseText;
                                                
                                                    // Your condition here if data success.
                                                  $('#contentss').html(data);
                                                               }
                                                            };
                                                    xhttp.open("POST", "peer.php",true);
                                                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                                    xhttp.send("contentfornewsfeedpeer=1");
                                                        
                                                                 
                                              } 

                                              $('#article').click(function() { 
                                                contents ();
                                                $('#peer').removeClass('active');
                                                $('#article').addClass('active');
                                                $('#addbtn').attr('data-target','#addnew');
                                              })

                                              $('#peer').click(function() { 
                                              peercontents ();
                                              $('#article').removeClass('active');
                                              $('#peer').addClass('active');
                                               $('#addbtn').attr('data-target','#addnewpeer');
                                              })

                                               $('#checkwphotopeer').click(function() {
                                                    if($(this).prop("checked") == true) {
                                                              $('#imagepeer').removeAttr('disabled');   
                                                              $('#imagepeer').attr('required','true');  
                                                              $('#peertrigger').val('wimage');        

                                                       }
                                                    else if($(this).prop("checked") == false) {
                                                               $('#imagepeer').attr('disabled','true');   
                                                                $('#imagepeer').removeAttr('required');    
                                                                 $('#peertrigger').val('noimage');                      
                                                     }
                                                  });


                                                const inpfile12 = document.getElementById("imagepeer"); //id of input tag type file
                                                        const regform12=document.getElementById ("peerform"); // div containing the form
                                                        const previewimage12=regform12.querySelector("#configimagepeer"); // id of img tag
                                    
                                                         inpfile12.addEventListener("change",function () {
                                                            const file12 = this.files[0];
                                    
                                                            if(file12) {
                                                                const reader12 = new FileReader();
                                                                
                                                                
                                                                reader12.addEventListener("load",function() {
                                                                    previewimage12.setAttribute("src",this.result);
                                                                   
                                                                });
                                                                reader12.readAsDataURL(file12);
                                                            }
                                                         });

                                                         
                                                         $('#addnewpeer').on('hidden.bs.modal', function (e) {
                                                          $('#imagepeer').val('');
                                                           $('#imagepeer').attr('disabled','true'); 
                                                          $('#configimagepeer').attr('src','../img/undraw_profile_pic_ic5t.png');
                                                          $('.txt').val('');
                                                           $('#checkwphotopeer').prop('checked',false);
                                                            $('#peertrigger').val('noimage');  
                                                         })


                                                            $('#formpeer').on('submit', function(event){
                                                                 event.preventDefault();
                                                               var formData = new FormData(this);
                                                              $.ajax({
                                                                 url : $(this).attr('action'),
                                                                   data:formData,
                                                                    cache:false,
                                                                    contentType: false,
                                                                    processData: false,
                                                                    method: "POST",
                                                                                                                
                                                                   success : function(data){
                                                                     $('#addnewpeer').modal('hide');
                                                   Swal.fire(
                                                    'News feed ',
                                                    'Added Successfully!',
                                                    'success'
                                                    );        
                                                     peercontents ();                       
                                                                    }
                                                                   })
                                                        });
                                                      


                                                              $('#checkwphotopeeredit').click(function() {
                 if($(this).prop("checked") == true) {
                         $('#imagepeeredit').removeAttr('disabled'); 
                           $('#imagepeeredit').attr('required','true');
                            $('#peertriggeredit').val('wimage');                       
                    }
                 else if($(this).prop("checked") == false) {
                             $('#imagepeeredit').attr('disabled','true'); 
                             $('#imagepeeredit').removeAttr('required');  
                              $('#peertriggeredit').val('noimage');                            
                  }
               });


                                                         $('#editpeermodal').on('hidden.bs.modal', function (e) {
                                                            $('#imagepeeredit').val(''); 
                                                             $('#checkwphotopeeredit').prop('checked',false);
                                                             $('#peertriggeredit').val('noimage');
                                                               $('#imagepeeredit').attr('disabled','true'); 
                                                             
                                                         })

                                                          $('#formeditpeer').on('submit', function(event){
                                                               event.preventDefault();
                                                             var formData = new FormData(this);
                                                            $.ajax({
                                                               url : $(this).attr('action'),
                                                                 data:formData,
                                                                  cache:false,
                                                                  contentType: false,
                                                                  processData: false,
                                                                  method: "POST",
                                                                                                              
                                                                 success : function(data){
                                                        $('#editpeermodal').modal('hide');
                                                                   Swal.fire(
                                                    'News feed ',
                                                    'Added Successfully!',
                                                    'success'
                                                    );     
                                                               peercontents ();   
                                                                                                           
                                                                  }
                                                                 })
                                                      });


                                                           const inpfile10 = document.getElementById("imagepeeredit"); //id of input tag type file
                                                        const regform10=document.getElementById ("peereditcont"); // div containing the form
                                                        const previewimage10=regform10.querySelector("#configimagepeeredit"); // id of img tag
                                    
                                                         inpfile10.addEventListener("change",function () {
                                                            const file10= this.files[0];
                                    
                                                            if(file10) {
                                                                const reader10 = new FileReader();
                                                                
                                                                
                                                                reader10.addEventListener("load",function() {
                                                                    previewimage10.setAttribute("src",this.result);
                                                                   
                                                                });
                                                                reader10.readAsDataURL(file10);
                                                            }
                                                         });

                                                         
  

                                        });

          