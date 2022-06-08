
                                                              <tr>

                                                                    <td>
                                                                        <?php 
                                                                        if($stat == 0){
                                                                            ?>
                                                                              <a href="JavaScript:void()" class="text-secondary"  style="font-size:13px;cursor: not-allowed;" ><i class="fas fa-print"></i></a>
                                                                            <?php

                                                                        }else{
                                                                              ?>
                                                                              <a href="referral-view.php?tokenid=<?php echo $rows['rh_id'] ?>&&id=<?php echo $rows['stud_id'] ?>&status=<?php echo $stat ?>" target="_blank" style="font-size:13px"><i class="fas fa-print"></i></a>
                                                                            <?php
                                                                        }

                                                                         ?>
                                                                        
                                                                        
                                                                      

                                                                    </td>
                                                                    <td>
                                                                        <?php 
                                                                        if($stat == 1){
                                                                            ?>
                                                                            <span class="badge badge-primary">New</span>
                                                                            <?php
                                                                        }else if ($stat == 0){
                                                                               ?>
                                                                            <span class="badge badge-warning">Unfinished</span>
                                                                            <?php 
                                                                        }else if ($stat == 2){
                                                                            ?>
                                                                            <span class="badge badge-info">Pending</span>
                                                                            <?php 
                                                                        }else if ($stat == 3){
                                                                                ?>
                                                                            <span class="badge badge-success">Completed</span>
                                                                            <?php 
                                                                        }


                                                                         ?>
                                                                        

                                                                    </td>
                                                                    <td>Ref_<?php echo $rows['rh_id']  ?></td>
                                                                    <td><?php echo $studemail ?></td>
                                                                    <td><?php echo $student_Fullname ?></td>
                                                                    <td><span style="font-weight:bolder;"><?php echo $rows['subject'] ?></span></td>
                                                                    <td><span style="font-style:italic"><?php echo $rows['referred_by'] ?></span></td>
                                                                    <td><?php echo date('F j,Y',strtotime($rows['datecreated'])) ?></td>
                                                                   
                                                              </tr>
                                                          