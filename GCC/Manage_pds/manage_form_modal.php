


<div class="modal fade bd-example-modal-lg" id="manageform" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  	
   <div class="modal-content" >
   	<div class="modal-header" >
   		<h5 >Manage Forms</h5> 
   		<span id="closebtn" data-dismiss="modal" style="cursor:pointer;"><i style="font-size: 20px;" class="far fa-times-circle"></i></span>
   	</div>
   	<div class="modal-body" id="tablecontent" >
   		
   <?php 
   $fetch -> manage_form_content();
    ?>



   	</div>
      <div class="modal-footer">
      	 
       
      
      </div>
    </div>
     
  </div>
</div>





<div class="modal fade bd-example-modal-lg" id="sendformlinks" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    
   <div class="modal-content" >
    <div class="modal-header" >
      <h5 >Form Links</h5> 
      <span id="closebtn" data-dismiss="modal" style="cursor:pointer;"><i style="font-size: 20px;" class="far fa-times-circle"></i></span>

    </div>
    <div class="modal-body" id="tablecontentlink" >
      
   <?php 
   $fetch -> sendlinkform_content();
    ?>

 

    </div>
      <div class="modal-footer" style="text-align: center;justify-content: center;">
       
       
        
      </div>
    </div>
     
  </div>
</div>








<!-- Modal -->
<div class="modal fade" id="responses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5>Responses</h5>
      <span style="text-align: center;"> Showing  <span id="numberofres" class="text-danger" style="font-weight: bolder;padding :5px; "></span>Response</span> 
       
         <div class="float-right"> <input type="text" style="font-size: 12px;" id="myInput" class="form-control" name="" placeholder="Search"></div> 
         
      </div>
      <div class="modal-body" style="height: 400px;overflow-y: scroll;">
      
      <div class="container">
          
         <div class="response-content">
            <!--contents-->
        

             <!--contents-->
              
             </div>  

              <div class="container d-none" style="text-align: center;" id="dispnone" >
                      <img src="../img/undraw_void_3ggu.png" class="img-fluid " style="width: 350px">
                      <h6 class="text-secondary" style="font-weight: bolder">No Search Data Found : <span style="color: red" id="txtval"></span></h6>
              </div> 

        </div>

            


              
             


      </div>
      <div class="modal-footer">

        
         
        <button type="button" class="btn btn-secondary" style="font-size: 12px;" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
<style type="text/css">
  #txtmsg {
      padding: 10px;
    max-width: 100%;
    line-height: 1.5;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-shadow: 1px 1px 1px #999;
    border:none;
    outline:none;
    border: 1px solid #e0e2f5;
    width: 400px;
  }
</style>

<!--<link rel="stylesheet" type="text/css" href="../include/assets/datatables/datatable.css?v=14">
<script type="text/javascript" src="../include/assets/datatables/datatable.js?v=1"> </script> -->

<script type="text/javascript" src="../../offline/sweetalert.js"></script>
<link rel="stylesheet" type="text/css" href="../../offline/datatable.css"/>
 
<script type="text/javascript" src="../../offline/datatable.js"></script>








<script type="text/javascript">
	$(document).ready(function() {

    

    $('#table_id').DataTable();
     $('#table_ids').DataTable();
     response_view();

     function response_view(){
     
         var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
        const data = this.responseText;
      
         $('.response-content').html(data);
         var size = $(".response-content > .ele").length;
        $('#numberofres').text(size);
                     }
                  };
          xhttp.open("POST", "response_view.php",true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("response_content=1");
              
                       
     }


     $('#myInput').keyup(function(){ 
       var value = $(this).val().toLowerCase();
        $('div[data-role="recipe"]').filter(function() {
            $(this).toggle($(this).find('h6').text().toLowerCase().indexOf(value) > -1)
          
         
      
         var size = $(".response-content > .ele").length;
         var count = $('div.ele:hidden').length;

          const eq = size-count;
            $('#numberofres').text(eq);
         
         if(count >= size ){
            $('#dispnone').removeClass('d-none');
            $('#txtval').text(value);
         }else {
           $('#dispnone').addClass('d-none');
         }
        });

     
     })



     $('#sendlinkclick').click(function() { 
     tablecontentlink();
     })

    $('.edit').click(function() { 
      var csformid = $(this).data('csformid');
           
        
               
             var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
            const data = this.responseText;
          
          window.location.href= "../create_form";


                         }
                      };
              xhttp.open("POST", "form_session.php",true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("setedit=1&csformid="+csformid);
                  
                           
    })

    $('.exitnow').click(function(){
          var csformid = $(this).data('csformid');

              var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
            const data = this.responseText;
          location.reload();



                         }
                      };
              xhttp.open("POST", "form_session.php",true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("saveexit=1&csformid="+csformid);

    })

    $('.delete').click(function() { 
       var csformid = $(this).data('csformid');
       var formname = $(this).data('formname');
      

          Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete its!'
}).then((result) => {
  if (result.isConfirmed) {
    var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
            const data = this.responseText;
          
          tablecontent();
             Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )

                         }
                      };
              xhttp.open("POST", "form_session.php",true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("deleteform=1&csformid="+csformid);

 
  }
})

        
          


    })
   

    function tablecontent(){
       
        var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
            const data = this.responseText;
            $('#tablecontent').html(data);
        
                         }
                      };
              xhttp.open("POST", "form_session.php",true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("content=1");
    }
     function tablecontentlink(){
       
        var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
            const data = this.responseText;
            $('#tablecontentlink').html(data);
        
                         }
                      };
              xhttp.open("POST", "form_session.php",true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("contentlink=1");
    }

    $('.viewform').click(function() { 
       var csformid = $(this).data('csformid');

        var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
            const data = this.responseText;
          
                window.location.href= "form_view.php";
                         }
                      };
              xhttp.open("POST", "form_session.php",true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("viewform=1&csformid="+csformid);

    })
    $('.send').click(function() { 
      var formname = $(this).data('formname');
      var formid = $(this).data('csformid');
      $('#formidentity').text(formname);

    
    })
      
    $('#btnretry').click(function() { 
    $('.sendlinkemail').trigger('click');
    })
  
 

     $('.sendlinkemail').click(function() { 
      
        var email = $('#txtemail').val();
        var txtmsg = $('#txtmsg').val();
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(email.match(mailformat))
        {
            /* 
             var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
            const data = this.responseText;
          
              // Your condition here if data success.
          
                         }
                      };
              xhttp.open("POST", "address.php",true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("compare=1&val="+val);
                */  
                           

            //$('#receiver').modal('hide');
             
             
              if(navigator.onLine){
                //internet connection
                 $('#txtemail').attr('style','outline: none; border:  1px solid #59657d;width: 250px; padding: 8px;');
            $('#error1').text('');
              $('#note').html('Sending link <i class="fas fa-spinner fa-pulse"></i>');
                var showit = setInterval(function(){
          $('#note').html('Form Link sent successfully ✓');
           $('#error1').text('');
            $('#txtemail').val('');
            $('#txtmsg').val('');

         clearInterval(showit);
      },3000);

        var hideit = setInterval(function(){
          $('#note').html('');

         clearInterval(hideit);
      },5000);
      
               } else {
               //No internet connection
               $('#errornote').html('There is no Internet Connection.. ');
               }

      
        }else if(email=='') {
          $('#error1').text('Recepient cannot be Empty!');
          $('#txtemail').attr('style','outline: none; border:  1px solid red;width: 250px; padding: 8px;');
          $('#txtemail').focus();
        }
        else {
          $('#error1').text('Invalid Recepient');
           $('#txtemail').attr('style','outline: none; border:  1px solid red;width: 250px; padding: 8px;');
            $('#txtemail').focus();
        }

     
         
    })
     $('#txtemail').keyup(function(event){ 

       var txtval = $(this).val();

        if(txtval == ''){
           $('#error1').text('');
            $('#txtemail').attr('style','outline: none; border:  1px solid #59657d;width: 250px; padding: 8px;');
        }else {
             $('#error1').text('');
            $('#txtemail').attr('style','outline: none; border:  1px solid #59657d;width: 250px; padding: 8px;');
            var keyCode = (event.keyCode ? event.keyCode : event.which);   
    if (keyCode == 13) {
        $('.sendlinkemail').trigger('click');
    }
  
        }
     })


     $('#closebtns').click(function() { 
       $('#error1').text('');
       })


} );
      	
</script>