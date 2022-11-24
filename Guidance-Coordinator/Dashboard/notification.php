<!---------------REAL TIME AJAX NOTIFICATIONS-------------------->
<!---Loaded Message REQUEST and ITS CONTENTS---->
<script src="../../sweetalert.js"></script>
 <script src="../../js/jquery.js"></script>
             <script type="text/javascript">
                 
                 $(document).ready(function() {
                            
                    alertmessagerequest();
                    messagerequestcontent();
                    notificationbellcount();
                    notificationbellcontent();
                    setInterval(function(){
                      alertmessagerequest();
                      messagerequestcontent();
                      notificationbellcount();
                      notificationbellcontent();
                    },30000);
                    function alertmessagerequest(){

                          
                             var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                             if (this.readyState == 4 && this.status == 200) {
                            const data = this.responseText;
                          if(data.match('0')){
                             $('#messagerequestcount').hide();
                          }else { 
                             $('#messagerequestcount').show();
                             $('#messagerequestcount').text(data);
                          }

                           
                        
                                               }
                                            };
                                xhttp.open("POST", "../notify/real-notification.php",true);
                                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                xhttp.send("getnotify=1");
                          
                          
                                        
                                             

                    }

                    function messagerequestcontent(){
                      

                       var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                             if (this.readyState == 4 && this.status == 200) {
                            const data = this.responseText;
                        
                            $('#messagerequest').html(data);
                        
                                               }
                                            };
                                xhttp.open("POST", "../notify/real-notification.php",true);
                                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                xhttp.send("getmessagerequest=1");
                    }

                    function notificationbellcount(){
                      

                        var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                             if (this.readyState == 4 && this.status == 200) {
                            const data = this.responseText;
                          if(data.match('0')){
                             $('#notificationbellcount').hide();
                          }else { 
                             $('#notificationbellcount').show();
                             $('#notificationbellcount').text(data+"+");
                          }

                           
                        
                                               }
                                            };
                                xhttp.open("POST", "../notify/real-notification.php",true);
                                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                xhttp.send("getnotifybell=1");
                    }

                     function notificationbellcontent(){
                      

                       var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                             if (this.readyState == 4 && this.status == 200) {
                            const data = this.responseText;
                        
                            $('#notificationbell').html(data);
                        
                                               }
                                            };
                                xhttp.open("POST", "../notify/real-notification.php",true);
                                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                xhttp.send("getnotificationbell=1");
                    }

                    $('#closemessagerequestt').click(function() { 
                      var id = $('#notification_id').val();
                    
                       var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200) {
              const data = this.responseText;
             
                    alertmessagerequest();
                    messagerequestcontent();
                  
             
                           }
                        };
                xhttp.open("POST", "../notify/real-notification.php",true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("setread=1&id="+id);
                    })
                       $('#closemessagerequests').click(function() { 
                      var id = $('#notification_id1').val();
                    
                       var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200) {
              const data = this.responseText;
             
                   notificationbellcount();
                      notificationbellcontent();
                  
             
                           }
                        };
                xhttp.open("POST", "../notify/real-notification.php",true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("setread=1&id="+id);
                    })
                    $('.replymessagerequest').click(function() { 
                      var requestor = $('#requestor').text();
                      var email =$('#studemail').text();
                      var studid = $('#studentids').val();
                      var title = $('#titlenotif').text();
                      $('#studentidtosend').val(studid);
                        $('#notiftitles').text(title);
                    $('#replyrequestor').text(requestor);
                    $('#emailrequestor').text(email);

                      var id = $('#notification_id').val();
                    
                       var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200) {
              const data = this.responseText;
             
                    alertmessagerequest();
                    messagerequestcontent();
                  
             
                           }
                        };
                xhttp.open("POST", "../notify/real-notification.php",true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("setread=1&id="+id);



                    })

                    $('#sendreplynoticeform').on('submit', function(event){
                       event.preventDefault();
                                $('#replysender').html('Sending <i class="fas fa-spinner fa-pulse"></i>');
                                var sending =setInterval(function(){
                                    var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                 if (this.readyState == 4 && this.status == 200) {
                                const data = this.responseText;
                             $('#replysender').html('Send <i class="far fa-paper-plane"></i>');
                              Swal.fire(
                              'Message Sent!',
                              'Your Message was Sent Successfully!',
                              'success'
                            )
                              $('#sendreplynotification').modal('hide');
                                             }
                                          };
                                  xhttp.open("POST", $('#sendreplynoticeform').attr('action'),true);
                                  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                  xhttp.send($('#sendreplynoticeform').serialize());
                                  clearInterval(sending);
                                },2000);
                               
                                      
                                               
                       });
                    $('#sendreplynotification').on('hidden.bs.modal', function (e) {
                        $('.radnotif').prop('checked',false);
                        $('#message-text').val('');
                      })

                    $('.deletenotificationss').click(function() { 
                     var id = $('#notification_id').val();
                     var id1 = $('#notification_id1').val();

                     Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e74a3b',
                    cancelButtonColor: '#f6c23e',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                         if (this.readyState == 4 && this.status == 200) {
                        const data = this.responseText;
                         alertmessagerequest();
                      messagerequestcontent();
                      notificationbellcount();
                      notificationbellcontent();
                       $('#messagerequestcontentsview').modal('hide');
                       
                       $('#notificationbellcontentview').modal('hide');
                      Swal.fire(
                        'Deleted!',
                        'Notification Deleted Successfully!',
                        'success'
                      )
                       alertmessagerequest();
                    messagerequestcontent();
                                     }
                                  };
                          xhttp.open("POST", "../notify/real-notification.php",true);
                          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                          xhttp.send("deletenotification=1&id="+id);
                    }
                  })
                      
                      
                              
                                       

                    })

                       });      
                       
             </script>

          
             <!-- Messageopen -->
             <div class="modal fade" id="messagerequestcontentsview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                 <div class="modal-content">
                 
                  <div class="modal-body">

                    <button class="btn btn-light" style="font-size: 12px;float: right;" id="closemessagerequestt" data-dismiss="modal"><i class="fas fa-times text-secondary"></i></button>
           <button class="btn btn-light deletenotificationss" style="font-size: 12px;float: right;"><i class="fas fa-trash text-secondary"></i></button>
          

           <div class="container shadow mb-2 py-3" style="text-align: center;"> 
                <span class="badge-success" id="notifstatus" style="font-size: 10px;padding: 5px;border-radius: 10px;text-transform: uppercase;float: left;"></span> <br style="user-select: none">
             
                 <h5 id="titlenotif" class="mt-4" style="font-weight: bold"></h5>
              <input type="hidden" name="" id="studentids">
              <br style="user-select: none">
               <div class="card">
                 
                  <div class="card-body">
                      <p style="text-align:left;font-size: 13px" id="contentnotif"></p>
                  </div> 
                  
               </div> 
               
              
             
              <br style="user-select: none">
              <span id="requestor" style="font-size: 15px; " class="text-secondary"></span><br style="user-select: none">
              <span id="studemail" style="font-size: 12px; " ></span>

        <input type="hidden" name="" id="notification_id">
          </div>
          
            <button type="button" class="btn btn-light mt-4 ml-2 replymessagerequest"  style="font-size: 12px;float: right;width: 100px" id="closemessagerequest"
            data-dismiss="modal" data-toggle="modal" data-target="#sendreplynotification" data-backdrop="static" data-keyboard="false" >Reply <i class="fas fa-reply"></i></button>

          


        </div>
                   
                 </div>
               </div>
             </div>

               <!-- Messageopen -->
             <div class="modal fade" id="notificationbellcontentview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                 <div class="modal-content">
                 
                  <div class="modal-body">
                   
            <button class="btn btn-light" style="font-size: 12px;float: right;" id="closemessagerequests" data-dismiss="modal"><i class="fas fa-times text-secondary"></i></button>
           <button class="btn btn-light deletenotificationss" style="font-size: 12px;float: right;"><i class="fas fa-trash text-secondary"></i></button>
           <button class="btn btn-light" style="font-size: 12px;float: right;"><i class="far fa-eye text-secondary"></i></button>


           <div class="container shadow mb-2 py-3" style="text-align: center;"> 
                <span class="badge-success" id="notifstatus1" style="font-size: 10px;padding: 5px;border-radius: 10px;text-transform: uppercase;float: left;"></span> <br style="user-select: none">
              
                 <h4 id="titlenotif1" class="mt-4" style="font-weight: bold"></h4>
              <input type="hidden" name="" id="studentids1">
              <br style="user-select: none">

          <p style="text-align:center;font-size: 13px" class="text-success" id="contentnotif1"></p>
            <!--<div style="font-size: 14px;font-weight: bold;" id="query2"></div>-->
        
           <div class="row">
              <div class="col-md-6">
               <div style="font-size: 14px;font-weight: bold;" id="query1"></div>
           
              </div> 
              <div class="col-md-6">
                  <div style="font-size: 14px;font-weight: bold;" id="query3"></div>
              </div> 
              
           </div> 
           
           
         
           
             
              <br style="user-select: none">
              <span id="requestor1" style="font-size: 15px; " class="text-secondary"></span><br style="user-select: none">
              <span id="studemail1" style="font-size: 12px; " ></span>

        <input type="hidden" name="" id="notification_id1">
        <input type="hidden" name="" id="notifformid">
          </div>
          
          
          
          


        </div>
                   
                 </div>
               </div>
             </div>


         
             
             <!-- Modal -->
             <div class="modal fade" id="sendreplynotification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                 <div class="modal-content">
                   <form method="post" action="../create_form/real-notification.php" id="sendreplynoticeform" onsubmit="return false">
                         <input type="hidden" name="sendreply">                 
                  
                  
                   <div class="modal-header">
                        <span >To:    <span class="badge badge-success" id="replyrequestor" style="font-size: 14px"></span></span>
                        <span id="emailrequestor" style="font-size: 12px"></span>
                <input type="hidden" name="studentidtoreply" id="studentidtosend">
                   </div>
                   <div class="modal-body">
                    <div class="container">
                       <div class="card shadow-sm ">
                         <div class="card-body" style="text-align: center;">
                        <span style="font-size: 12px">Requested for : </span>
                      <h6 class="text-danger" id="titlenotifrecall"></h6>
                    
                      <div class="custom-control custom-radio custom-control-inline mb-4">
                <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input radnotif" value="APPROVED" required="">
                <label class="custom-control-label" for="customRadioInline1" style="font-size: 14px">Approve</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input radnotif" value="DISAPPROVED" required="">
                <label class="custom-control-label" for="customRadioInline2" style="font-size: 14px">Disapprove</label>
              </div>
              <input type="hidden" name="titleofnotif" id="notiftitles">
                         </div>  
                       </div> 
                       
                      
                      <br>
                    
                      <textarea placeholder="Type your message here.."   name="messagemail" style="font-size: 13px;border:none;outline: none;width: 100%;" id="message-text" rows="10"></textarea>

                  </div>
                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-light" data-dismiss="modal" style="font-size: 12px">Cancel</button>
                     <button type="submit" class="btn btn-light" id="replysender" style="font-size: 12px">Send <i class="far fa-paper-plane"></i></button>
                   </div>
                    </form>
                 </div>
               </div>
             </div>
<!---------------REAL TIME AJAX NOTIFICATIONS END HERE-------------------->