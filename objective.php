   <div class="container ">

       <div class="card">
          <div class="card-body">

           
             <div class="container">
              
               <hr>

                 <div class="container">
                   <div class="row">
                      <div class="col-md-2"></div> 
                       <div class="col-md-8">
                         <h6 style="font-weight: bold; user-select: none" class="text-primary mb-4">Objectives</h6>
                            <h6>
          <textarea id="sd" readonly><?php 
    //$redirect
          $sql = " SELECT * FROM `pages` where title ='$redirect'  ";
                      $result = mysqli_query($con,$sql); 
                   
                       while($row = mysqli_fetch_array($result)){
                        echo $row['content'];
                       }
                

    ?></textarea>
              </h6>
                       </div> 
                        <div class="col-md-2"></div> 
                      
                   </div> 
                   
                  
                 </div> 
                 

             
  <style type="text/css">
        #sd {
          height:100%;resize: none;border: none; outline:none;width: 100%;
        }
      </style>              
<script type="text/javascript">
$("#sd").height( $("#sd")[0].scrollHeight );
</script>


                <hr>
                <div class="" style="text-align: center;"> 
                
              
                </div>
             </div> 
             

            
          </div>  
       </div> 
       

     
   </div> 