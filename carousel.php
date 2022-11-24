
 <div class="mb-5" style="text-align: center;position: relative; ">
 
<div class="bg-image" id="bgimage">
  </div>

<div id="carouselExampleFade"  class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">

        <?php 
              $carousel = "SELECT * FROM `carousel` ";
                          $resultcc = mysqli_query($con,$carousel); // run query
                          $countcc= mysqli_num_rows($resultcc); // to count if necessary
                         //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                       if ($countcc>=1){
                         //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                           while($row = mysqli_fetch_array($resultcc)){
                            $statuscc = $row['status'];
                            $src = 'GCC/img/'.$row['imagename'];
                            if($statuscc == 1){
                              ?>
                               <div class="carousel-item active" >
                          <img class="d-block w-100 citem" src="<?php echo $src ?>" alt="First slide">
                        </div>
                              <?php
                            }else {
                              ?>
                       <div class="carousel-item" >
                    <img class="d-block w-100 citem" src="<?php echo $src ?>" alt="Third slide">
                  </div>
                              <?php
                            }
                          
                           }
                    }

         ?>
 
  


  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>	
</div> 

<script src="js/jquery.js"></script>

<script type="text/javascript">
  
  $(document).ready(function() {
var src = $('.active').find('img').attr('src');
  $('#bgimage').attr('style','background-image:url('+src+')');
    
  $('#carouselExampleFade').on('slid.bs.carousel', function () {
   
   
    
    var src = $('.active').find('img').attr('src');
    $('#bgimage').attr('style','background-image:url('+src+')');
    
  })      
  });

        
</script>