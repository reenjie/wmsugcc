	$(document).ready(function() {

												 $('.modifiable').click(function() {
												 	var fid = $(this).data('formidd');

												      if($(this).prop("checked") == true) {
												               
												                                    		
								  $.ajax({
									         url : "table.php",
									          method: "POST",
									           data  : {modifiable:1,yes:1,fid:fid},
									           success : function(data){
										contents();
										          }
									        })
												                                    		      
												                                    		                          		
												         }
												      else if($(this).prop("checked") == false) {
												          				                                    		
								  $.ajax({
									         url : "table.php",
									          method: "POST",
									           data  : {modifiable:1,yes:0,fid:fid},
									           success : function(data){
								contents();
										          }
									        })                                
												       }
												    });

												$('.delcolumn').click(function() { 
													var id = $(this).data('tc');
													
													 $.ajax({
													           url : "table.php",
													            method: "POST",
													             data  : {delcolumn:1,id:id},
													             success : function(data){
															contents();

													             }
													          })

												
												})

												$('.changecontents').keyup(function(){ 
													var  conid = $(this).data('conid');
													var val = $(this).val();

													 $.ajax({
													           url : "table.php",
													            method: "POST",
													             data  : {updatecontent:1,id:conid,val:val},
													             success : function(data){
															//contents();

													             }
													          })
												
												})

												$('.changeheader').keyup(function(){ 
													var tblid = $(this).data('tblid');
													var val = $(this).val();

													 $.ajax({
													           url : "table.php",
													            method: "POST",
													             data  : {updateheader:1,id:tblid,val:val},
													             success : function(data){
															//contents();

													             }
													          })
												
												})

												$('.deleteheader').click(function() { 
														var tblid = $(this).data('tblid');
															
															  $.ajax({
													           url : "table.php",
													            method: "POST",
													             data  : {deleteheader:1,tblid:tblid},
													             success : function(data){
																contents();

													             }
													          })


												
												})

												$('#deletetable').click(function() {
														var fid = $(this).data('formidd');

													
													
													   $.ajax({
													           url : "table.php",
													            method: "POST",
													             data  : {deletetable:1,fid:fid},
													             success : function(data){
																contents();
													             }
													          })
													      
													    
												})

													$('#clickrow').click(function() { 
														$('.addrows').click();
													
													})
													/*$('#clickcol').click(function() { 
														$('.addcolumns').click();
													})*/
											      	$('.addrows').click(function() { 
											      		
											      		
											      	var tcid = $(this).data('tcid');
											      		var caddtc = $('#contentid').val();
											      		var fid = $(this).data('formidd');
											      		
											      		
											      		
											      	   $.ajax({
											      		           url : "table.php",
											      		            method: "POST",
											      		             data  : {addnewrows:1,tbleid:tcid,content:caddtc,fid:fid},
											      		             success : function(data){
											      					contents();
											      			
											      			
											      		             }
											      		          })
											      		     
											      		   
											      	
											      		
											      	})
											      	$('.addcolumns').click(function() { 
											      	var tcid = $(this).data('tcid');
											      	var fid = $(this).data('formidd');
											      		 

											      		  $.ajax({
											      		           url : "table.php",
											      		            method: "POST",
											      		             data  : {addcolumn:1,fid:fid},
											      		             success : function(data){
											      			contents();
											      		             }
											      		          })
											      		
											      	
											      		    


											      	})



					function contents(){
		
		 $.ajax({
			           url : "action.php",
			            method: "POST",
			             data  : {content:1},
			             success : function(data){
							$('#content').html(data);
							checktitle();
							var scroll = setInterval(function(){
											      				$('#responsive').animate({scrollRight:0});
						},1000);
							
			             }
			          })

	}


								$('#bg-info').click(function() { 
                         				$('#tableheader').addClass('table-info');
                         				$('#tableheader').removeClass('table-danger');
                         				$('#tableheader').removeClass('table-warning');
                         				$('#tableheader').removeClass('table-primary');
                         				$('#tableheader').removeClass('table-success');
                         					$('#tableheader').removeClass('table-secondary');

                         					$('#t1').addClass('border border-5');
                         					$('#t2').removeClass('border border-5');
                         					$('#t3').removeClass('border border-5');
                         					$('#t4').removeClass('border border-5');
                         					$('#t5').removeClass('border border-5');
                         					$('#t6').removeClass('border border-5');

                         						var fid = $(this).data('formids');
                         				var color ="table-info";
                         				 
                         				  $.ajax({
                         				           url : "table.php",
                         				            method: "POST",
                         				             data  : {changecoloraa:1,color:color,fid:fid},
                         				             success : function(data){
                         				
                         				             }
                         				          })

                         				         
                         				     
                         				    

                         			
                         			})

                         			$('#bg-danger').click(function() { 
                         				$('#tableheader').removeClass('table-info');
                         				$('#tableheader').addClass('table-danger');
                         				$('#tableheader').removeClass('table-warning');
                         				$('#tableheader').removeClass('table-primary');
                         				$('#tableheader').removeClass('table-success');
                         					$('#tableheader').removeClass('table-secondary');
                         					$('#t1').removeClass('border border-5');
                         					$('#t2').addClass('border border-5');
                         					$('#t3').removeClass('border border-5');
                         					$('#t4').removeClass('border border-5');
                         					$('#t5').removeClass('border border-5');
                         					$('#t6').removeClass('border border-5');
                         						var fid = $(this).data('formids');
                         				var color ="table-danger";
                         			   $.ajax({
                         				           url : "table.php",
                         				            method: "POST",
                         				             data  : {changecoloraa:1,color:color,fid:fid},
                         				             success : function(data){
                         				
                         				             }
                         				          })
                         				         

                         			
                         			})

                         			$('#bg-warning').click(function() { 
                         				$('#tableheader').removeClass('table-info');
                         				$('#tableheader').removeClass('table-danger');
                         				$('#tableheader').addClass('table-warning');
                         				$('#tableheader').removeClass('table-primary');
                         				$('#tableheader').removeClass('table-success');
                         					$('#tableheader').removeClass('table-secondary');
                         					$('#t1').removeClass('border border-5');
                         					$('#t2').removeClass('border border-5');
                         					$('#t3').addClass('border border-5');
                         					$('#t4').removeClass('border border-5');
                         					$('#t5').removeClass('border border-5');
                         					$('#t6').removeClass('border border-5');
                         							var fid = $(this).data('formids');
                         				var color ="table-warning";
                         				 
                         				   $.ajax({
                         				           url : "table.php",
                         				            method: "POST",
                         				             data  : {changecoloraa:1,color:color,fid:fid},
                         				             success : function(data){
                         				
                         				             }
                         				          })

                         				         

                         			
                         			})

                         			$('#bg-primary').click(function() { 
                         				$('#tableheader').removeClass('table-info');
                         				$('#tableheader').removeClass('table-danger');
                         				$('#tableheader').removeClass('table-warning');
                         				$('#tableheader').addClass('table-primary');
                         				$('#tableheader').removeClass('table-success');
                         					$('#tableheader').removeClass('table-secondary');
                         					$('#t1').removeClass('border border-5');
                         					$('#t2').removeClass('border border-5');
                         					$('#t3').removeClass('border border-5');
                         					$('#t4').addClass('border border-5');
                         					$('#t5').removeClass('border border-5');
                         					$('#t6').removeClass('border border-5');
                         						var fid = $(this).data('formids');
                         				var color ="table-primary";
                         				 
                         				   $.ajax({
                         				           url : "table.php",
                         				            method: "POST",
                         				             data  : {changecoloraa:1,color:color,fid:fid},
                         				             success : function(data){
                         				
                         				             }
                         				          })

                         				          

                         			
                         			})

                         			$('#bg-success').click(function() { 
                         				$('#tableheader').removeClass('table-info');
                         				$('#tableheader').removeClass('table-danger');
                         				$('#tableheader').removeClass('table-warning');
                         				$('#tableheader').removeClass('table-primary');
                         				$('#tableheader').addClass('table-success');
                         				$('#tableheader').removeClass('table-secondary');

                         				$('#t1').removeClass('border border-5');
                         					$('#t2').removeClass('border border-5');
                         					$('#t3').removeClass('border border-5');
                         					$('#t4').removeClass('border border-5');
                         					$('#t5').addClass('border border-5');
                         					$('#t6').removeClass('border border-5');

                         				var color ="table-success";
                         				 	var fid = $(this).data('formids');
                         				  $.ajax({
                         				           url : "table.php",
                         				            method: "POST",
                         				             data  : {changecoloraa:1,color:color,fid:fid},
                         				             success : function(data){
                         			
                         				             }
                         				          })

											
                         			
                         			})

                         					$('#bg-secondary').click(function() { 
                         				$('#tableheader').removeClass('table-info');
                         				$('#tableheader').removeClass('table-danger');
                         				$('#tableheader').removeClass('table-warning');
                         				$('#tableheader').removeClass('table-primary');
                         				$('#tableheader').removeClass('table-success');
                         				$('#tableheader').addClass('table-secondary');

                         				$('#t1').removeClass('border border-5');
                         					$('#t2').removeClass('border border-5');
                         					$('#t3').removeClass('border border-5');
                         					$('#t4').removeClass('border border-5');
                         					$('#t5').removeClass('border border-5');
                         					$('#t6').addClass('border border-5');

                         				var color ="table-secondary";
                         				 	var fid = $(this).data('formids');

                         				 	
                         				  $.ajax({
                         				           url : "table.php",
                         				            method: "POST",
                         				             data  : {changecoloraa:1,color:color,fid:fid},
                         				             success : function(data){
                         					
                         				             }
                         				          })
											

                         			
                         			})



		
											      });      
										      	