<?php 

//echo $services;


	          $selectservices = "select * from pages where title ='$services' and pageid = '$redirect' ";
	          $sres = mysqli_query($con,$selectservices);
	          while($row = mysqli_fetch_array($sres)){
				?>
				 <div class="container ">

       <div class="card">
          <div class="card-body">

           
             <div class="container">
               
               <hr>

                 <div class="container">

                  <style type="text/css">
                      #serv::-webkit-scrollbar {
                    width: 5px;
                  }

                  </style>
                    <style type="text/css">
        #sd {
          height:100%;resize: none;border: none; outline:none;width: 100%;
        }
      </style>              
<script type="text/javascript">
$("#sd").height( $("#sd")[0].scrollHeight );
</script>
                   <div class="row">
                      <div class="col-md-2"></div> 
                       <div class="col-md-8" style="height: 500px; overflow-y:scroll;" id="serv">
                         <h6 style="font-weight: bold; user-select: none" class="text-primary mb-4"><?php echo $row['title'] ?></h6>
                         <textarea id="sd" readonly><?php echo $row['content'] ?></textarea>

                       </div> 
                        <div class="col-md-2"></div> 
                      
                   </div> 
                   
                  
                 </div> 
                 

             



                <hr>
                <div class="" style="text-align: center;"> 
                
              
                </div>
             </div> 
             

            
          </div>  
       </div> 
       

     
   </div>


   

				<?php
	           }


 ?>