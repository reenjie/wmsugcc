<h6 style="font-size: 14px" class="mt-3">Advance Options : </h6>
							  			<button class="btn btn-light text-primary addcolumns"  data-formidd="<?php echo $row['form_id'] ?>"  style="font-size: 12px" ><i class="fas fa-plus-circle"></i> Add Rows</button>


							  			
							  			<button class="btn btn-light text-primary  " id="clickrow"   style="font-size: 12px;background-color: transparent;"><i class="fas fa-plus-circle"></i> Add Columns</button>

							  			<button class="btn btn-light text-danger " id="deletetable" data-formidd="<?php echo $row['form_id'] ?>" style="font-size: 12px" ><i class="fas fa-times-circle"></i> Delete table</button>
                      
							  			<?php 
							  		/*	if($ismodifiable == 0){
							  				?>
							  				
									<input type="checkbox" name="" class="modifiable" data-formidd="<?php echo $row['form_id'] ?>"> <span style="font-size: 12px;user-select: none" data-bs-toggle="tooltip" data-bs-placement="right" title="If checked, The user will be allowed to add,edit and delete columns.">Modifiable</span>
									
							  				<?php
							  			}else {
							  				?>
							  				
									<input type="checkbox" name="" class="modifiable" data-formidd="<?php echo $row['form_id'] ?>" checked> <span style="font-size: 12px;user-select: none" data-bs-toggle="tooltip" data-bs-placement="right" title="If Unchecked, The user will not be allowed modify columns.">Modifiable</span>
									
							  				<?php
							  			}
                            */
							  			 ?>



							  				<h6 style="font-size: 13px" class="mt-3 mb-3">Appearance : </h6>

							   <label class="mr-4" >
                                      
                                      <input type="radio" class="d-none" name="acolor" id="bg-info" data-formids="<?php echo $row['form_id'] ?>">
                                      <span class="" id="t1" style="padding:5px 20px;border-radius: 30px;margin-left: 4px;background-color: rgb(207, 244, 252);"></span>
                                  </label>

                                   <label class="mr-4" >
                                      
                                      <input type="radio" class="d-none" name="acolor" id="bg-danger" data-formids="<?php echo $row['form_id'] ?>">
                                      <span class=" " id="t2" style="padding:5px 20px;border-radius: 30px;margin-left: 5px;background-color: rgb(248, 215, 218);"></span>
                                  </label>


                                   <label class="mr-4">
                                      
                                      <input type="radio" class="d-none" name="acolor" id="bg-warning" data-formids="<?php echo $row['form_id'] ?>">
                                      <span class=" " id="t3" style="padding:5px 20px;border-radius: 30px;margin-left: 5px;background-color: rgb(255, 243, 205);"></span>
                                  </label>

                                   <label class="mr-4" >
                                      
                                      <input type="radio" class="d-none" name="acolor" id="bg-primary" data-formids="<?php echo $row['form_id'] ?>">
                                      <span  id="t4" style="padding:5px 20px;border-radius: 30px;margin-left: 5px; background-color: rgb(207, 226, 255);"></span>
                                  </label>
                                  <label class="mr-4" >
                                      
                                      <input type="radio" class="d-none" name="acolor" id="bg-success" data-formids="<?php echo $row['form_id'] ?>">
                                      <span class=" " id="t5" style="padding:5px 20px;border-radius: 30px;margin-left: 5px;background-color: rgb(209, 231, 221);"></span>
                                  </label>

                                    <label class="mr-4">
                                      
                                      <input type="radio" class="d-none" name="acolor" id="bg-secondary" data-formids="<?php echo $row['form_id'] ?>">
                                      <span class=" " id="t6" style="padding:5px 20px;border-radius: 30px;margin-left: 5px;background-color: rgb(226, 227, 229);"></span>
                                  </label>
