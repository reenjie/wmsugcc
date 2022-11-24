<?php 
session_start();
include '../create_form/connect.php';
	if(isset($_POST['searchfor'])){ 
		?>
		
			<div class="col-md-4 ele" data-role="searchfor" style="margin: 10px;">
			<a href="../Homepage/" style="text-decoration: none">		
			<div class="card shadow " style="border-left:5px solid #1cba6e">
		 	
		 	 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><h6>Homepage</h6></div>
                                        </div>
                                        <div class="col-auto">
                                        	
                                            <i class="fas fa-laptop-house fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
		 	 </div> 
		 	 

		 	</div> 
		 	</a>

			</div>


			<div class="col-md-4 ele" data-role="searchfor" style="margin: 10px;">
			<a href="../Newsfeed/" style="text-decoration: none">		
			<div class="card shadow " style="border-left:5px solid #1cba6e">
		 	
		 	 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><h6>Newsfeed</h6></div>
                                        </div>
                                        <div class="col-auto">

                                            <i class="far fa-newspaper fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
		 	 </div> 
		 	 

		 	</div> 
		 	</a>

			</div>

			<div class="col-md-4 ele" data-role="searchfor" style="margin: 10px;">
			<a href="../Manage_pds/?manageform" style="text-decoration: none">		
			<div class="card shadow " style="border-left:5px solid #1cba6e">
		 	
		 	 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><h6>Manage Forms</h6></div>
                                        </div>
                                        <div class="col-auto">

                                            <i class="fas fa-align-justify fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
		 	 </div> 
		 	 

		 	</div> 
		 	</a>

			</div>

			<div class="col-md-4 ele" data-role="searchfor" style="margin: 10px;">
			<a href="../Calendar/" style="text-decoration: none">		
			<div class="card shadow " style="border-left:5px solid #1cba6e">
		 	
		 	 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><h6>Manage Calendar</h6></div>
                                        </div>
                                        <div class="col-auto">

                                            <i class="far fa-calendar-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
		 	 </div> 
		 	 

		 	</div> 
		 	</a>

			</div>

			
			<div class="col-md-4 ele" data-role="searchfor" style="margin: 10px;">
			<a href="../Manage_pds/?viewresponse" style="text-decoration: none">		
			<div class="card shadow " style="border-left:5px solid #1cba6e">
		 	
		 	 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><h6>Form Responses</h6></div>
                                        </div>
                                        <div class="col-auto">

                                            <i class="fas fa-align-justify fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
		 	 </div> 
		 	 

		 	</div> 
		 	</a>

			</div>

		


		
		<div class="col-md-4 ele" data-role="searchfor" style="margin: 10px;">
			<a href="../Announcement/" style="text-decoration: none">		
			<div class="card shadow " style="border-left:5px solid #1cba6e">
		 	
		 	 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><h6>Announcements</h6></div>
                                        </div>
                                        <div class="col-auto">

                                            <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
		 	 </div> 
		 	 

		 	</div> 
		 	</a>

			</div>

			<div class="col-md-4 ele" data-role="searchfor" style="margin: 10px;">
			<a href="../Manage_pds/?createform" style="text-decoration: none">		
			<div class="card shadow " style="border-left:5px solid #1cba6e">
		 	
		 	 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><h6>create form</h6></div>
                                        </div>
                                        <div class="col-auto">

                                             <i class="fas fa-align-justify fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
		 	 </div> 
		 	 

		 	</div> 
		 	</a>

			</div>

			<div class="col-md-4 ele" data-role="searchfor" style="margin: 10px;">
			<a href="../Newsfeed/?addpeerfacilitator" style="text-decoration: none">		
			<div class="card shadow " style="border-left:5px solid #1cba6e">
		 	
		 	 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><h6>Add peer facilitator</h6></div>
                                        </div>
                                        <div class="col-auto">

                                            <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
		 	 </div> 
		 	 

		 	</div> 
		 	</a>

			</div>

			<div class="col-md-4 ele" data-role="searchfor" style="margin: 10px;">
			<a href="../Newsfeed/?addarticle" style="text-decoration: none">		
			<div class="card shadow " style="border-left:5px solid #1cba6e">
		 	
		 	 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><h6>Add New Article</h6></div>
                                        </div>
                                        <div class="col-auto">
                                        
                                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
		 	 </div> 
		 	 

		 	</div> 
		 	</a>

			</div>

				
		
			<div class="col-md-4 ele" data-role="searchfor" style="margin: 10px;">
			<a href="../Manage_pds/?sendformlink" style="text-decoration: none">		
			<div class="card shadow " style="border-left:5px solid #1cba6e">
		 	
		 	 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><h6>Send form link</h6></div>
                                        </div>
                                        <div class="col-auto">

                                            <i class="fas fa-link fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
		 	 </div> 
		 	 

		 	</div> 
		 	</a>

			</div>

			<div class="col-md-4 ele" data-role="searchfor" style="margin: 10px;">
			<a href="../Announcement/?addannouncement" style="text-decoration: none">		
			<div class="card shadow " style="border-left:5px solid #1cba6e">
		 	
		 	 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><h6>post announcement</h6></div>
                                        </div>
                                        <div class="col-auto">

                                            <i class="fas fa-scroll fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
		 	 </div> 
		 	 

		 	</div> 
		 	</a>

			</div>

		

			<div class="col-md-4 ele" data-role="searchfor" style="margin: 10px;">
			<a href="../Homepage/" style="text-decoration: none">		
			<div class="card shadow " style="border-left:5px solid #1cba6e">
		 	
		 	 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><h6>Manage Hompage</h6></div>
                                        </div>
                                        <div class="col-auto">

                                            <i class="fas fa-cogs fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
		 	 </div> 
		 	 

		 	</div> 
		 	</a>

			</div>

			<div class="col-md-4 ele" data-role="searchfor" style="margin: 10px;">
			<a href="logout.php" style="text-decoration: none">		
			<div class="card shadow " style="border-left:5px solid #1cba6e">
		 	
		 	 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><h6>Logout</h6></div>
                                        </div>
                                        <div class="col-auto">
                                        
                                            <i class="fas fa-sign-out-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
		 	 </div> 
		 	 

		 	</div> 
		 	</a>

			</div>


			<div class="col-md-4 ele" data-role="searchfor" style="margin: 10px;">
			<a href="../Records/" style="text-decoration: none">		
			<div class="card shadow " style="border-left:5px solid #1cba6e">
		 	
		 	 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><h6>Records</h6></div>
                                        </div>
                                        <div class="col-auto">
                                        
                                            <i class="fas fa-file fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
		 	 </div> 
		 	 

		 	</div> 
		 	</a>

			</div>


		
		
		
		

		
		 

		<?php
	}

 ?>