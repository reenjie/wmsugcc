<?php 

include 'GCC/create_form/connect.php';


                                    date_default_timezone_set('Asia/Manila');
                                    $day = date('j');
                                    if($day >= 15){
                                        $monthnow = 'mid-'.date('F');
                                    }else {
                                        $monthnow = date('F'); 
                                    }
                                
                                     $getsummer = "select * from sem_year   ";
                                                     $gettingsummerto_From = mysqli_query($con,$getsummer); 
                                                   
                                                 while($row = mysqli_fetch_array($gettingsummerto_From)){
                                                    $sy = $row['sy_id'];
                                                    $ms = $row['month_start'];
                                                    $me = $row['month_end'];

                                                   

                                                    if($sy == 1){
                                                        
                                                        $summer_from = $row['month_start'];   
                                                        $summer_end  = $row['month_end'];    
                                                        $m1_s = $row['m_start'];
                                                        $m1e_s = $row['m_end'];
                                                    }else if ($sy == 2){
                                                          
                                                         $firstsem_from = $row['month_start'];   
                                                        $firstsem_end  = $row['month_end'];   
                                                        $m2_s = $row['m_start'];
                                                        $m2e_s = $row['m_end'];
                                                    }else if ($sy == 3){
                                                      
                                                        $secondsem_from = $row['month_start'];   
                                                        $secondsem_end  = $row['month_end']; 
                                                        $m3_s = $row['m_start'];
                                                        $m3e_s = $row['m_end'];  
                                                    }


                                                          


                                                     }

                                              

                                                     //summer
                                                       $monthsummer = "select * from months where mid in (select mid from months where mid BETWEEN '$m1_s' and '$m1e_s' )   ";
                                                           $gettingmonthsummer = mysqli_query($con,$monthsummer); 
                                                         
                                                       while($row = mysqli_fetch_array($gettingmonthsummer)){
                                                        $mid = $row['mid'];

                                                            $months = $row['month'];

                                                            if($monthnow == $months){
                                                              $_SESSION['sem'] = 'summer';
                                                            }        
                                                           }


                                                             //firstsem
                                                       $monthfirstsem = "select * from months where mid in (select mid from months where mid BETWEEN '$m2_s' and '$m2e_s' )   ";
                                                           $gettingmonthfirstsem = mysqli_query($con,$monthfirstsem); 
                                                         
                                                       while($row = mysqli_fetch_array($gettingmonthfirstsem)){
                                                        $mid = $row['mid'];

                                                            $months = $row['month'];

                                                            if($monthnow == $months){
                                                                $_SESSION['sem'] = '1stsem';
                                                            }        
                                                           }

                                                            //secondsemester
                                                       $monthsecondsemester= "select * from months where mid in (select mid from months where mid BETWEEN '$m3_s' and '$m3e_s' )   ";
                                                           $gettingmonthsecondsemester = mysqli_query($con,$monthsecondsemester); 
                                                         
                                                       while($row = mysqli_fetch_array($gettingmonthsecondsemester)){
                                                        $mid = $row['mid'];

                                                            $months = $row['month'];



                                                          
                                                           if($monthnow == $months){
                                                               $_SESSION['sem'] = '2ndsem';


                                                              
                                                            } 

                                                           }


                                              




 ?>