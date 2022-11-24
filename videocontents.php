<div class="container " >

  <!-- Full-width images with number text -->


  <?php 
            $videocontent = " SELECT * FROM `videocontent`  ";
                        $resultvc = mysqli_query($con,$videocontent); // run query
                        $countvc= mysqli_num_rows($resultvc); // to count if necessary
                       //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                     if ($countvc>=1){
                       //while($row = mysqli_fetch_array($result)){} is where we output all the data in database

                         while($row = mysqli_fetch_array($resultvc)){

                          $videosrc = 'videos/'.$row['video'];
                          $videothumbnail = 'videos/'.$row['thumbnail'];
                          $vid = $row['vid'];
                          $videotitle[]= $row['title'];
                          $videothumbnails[]='videos/'.$row['thumbnail'];
                          $vidid[]= $row['vid'];
                          ?>
                            <div class="mySlides">
                      <div class="numbertext"><?php echo $vid ?> / $countvc</div>
                          <video  style="width: 100%; height: 300px;border-radius: 3px" poster="<?php echo $videothumbnail ?>" src="<?php echo $videosrc ?>" controls></video>
                    </div>

                          <?php 
                        }
                  }
   ?>
  <!-- Next and previous buttons 
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>-->

  <!-- Image text -->
  <div class="caption-container bg-light text-secondary" style="font-weight: bold">
    <p id="caption"></p>
  </div>

  <!-- Thumbnail images -->
  <div class="container">
    <h6>Playlist :</h6>
    <?php 
   for($i =0 ; $i<$countvc; $i ++){
    
        ?>

    <div class="column">
      <img class="demo cursor" src="<?php echo $videothumbnails[$i] ?>" style="width:100%" onclick="currentSlide(<?php echo $vidid[$i] ?>)" alt="<?php echo $videotitle[$i] ?>">
    </div>
        <?php
     }

     ?>
  

   


  </div>
</div>