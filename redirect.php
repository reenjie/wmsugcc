<?php 
	if($redirect=='Rationale'){

		include 'Rationale.php';

	}else if ($redirect == 'Vision'){
		include 'vision.php';
	}else if ($redirect == ''){
		
	}else if ($redirect == 'Mission'){
		include 'mission.php';
	}else if ($redirect == 'Objectives'){
		include 'objective.php';
	}else if ($redirect == 'Guidance Staffs'){
		include 'staffs.php';
		
	}else if ($redirect == 'Calendar'){
		include 'calendar_.php';
	}else if ($redirect == 'Events'){
		include 'events.php';
	}else if ($redirect == 'Contact Us'){
		include 'contacts.html';
	}else if ($redirect == 'Announcements'){
		include 'announcements_.php';
	}else if ($redirect == 'Developers'){
		include 'Developers.php';
	}


	

 ?>