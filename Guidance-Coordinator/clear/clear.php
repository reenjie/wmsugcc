<?php 
include '../../GCC/create_form/connect.php';


   $selectallnotification = "SELECT * FROM `notification` ";
   date_default_timezone_set('Asia/Manila');
   $dateofnowtocompare = date('Y-m-d');

                   $resultselectnotify = mysqli_query($con,$selectallnotification); // run query
                 
                    while($takenotif = mysqli_fetch_array($resultselectnotify)){
                    $notification_ids = $takenotif['noti_id'];
                    $dateofnotification = $takenotif['date_notified'];
                    $addthirtydays = strtotime($dateofnotification."30 days");
                    $thirtydays = date("Y-m-d",$addthirtydays);

                    if($thirtydays < $dateofnowtocompare){
                      $deleteallnotification = "DELETE FROM `notification` WHERE status='read' and noti_id = '$notification_ids' ";
                      mysqli_query($con,$deleteallnotification);

                    }
                }
             
   

    ?>