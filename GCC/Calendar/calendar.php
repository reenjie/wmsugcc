<script>
	
		
		 
			 $(function () {

  
    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {

      ele.each(function () {


        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------


    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };

      }
    });


    var calendar = new Calendar(calendarEl, {
    	timeZone: 'Asia/Manila',
  
  initialView: 'dayGridMonth',
  selectable: true,
  unselectAuto: false,
  
 
  

  
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: [

      	<?php 
      
      				$sql = " SELECT * FROM `events` where status = 0  ";
      		                $result = mysqli_query($con,$sql); // run query
      		               
      		                 while($row = mysqli_fetch_array($result)){
      		                 	$estart = $row['start'];
      								?>
      								{
        	id            : <?php echo $row['e_id'] ?>,
          title          : '<?php echo $row['title'] ?>',
          start       : new Date(<?php echo date('Y',strtotime($estart)) ?>,<?php echo date('m',strtotime($estart)) ?>-1, <?php echo date('d',strtotime($estart)) ?>+1),
          backgroundColor: '<?php echo $row['bgcolor'] ?>',
          borderColor    : '<?php echo $row['brdercolor']?>', 
          allDay     	: <?php echo $row['allday'] ?>,

        	
        },
      								<?php
      		                 }
      		          

      	 ?>
      
      ],

     editable  : true,
     eventDurationEditable:false,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      
      	select:function(selectionInfo){

      		var start =selectionInfo.startStr;
      		var end = selectionInfo.endStr;
      		var allday = selectionInfo.allDay;

		
  			
  	$('#addeventdate').modal('show');


const formatDate = (dateString) => {
  const options = { year: "numeric", month: "long", day: "numeric" }
  return new Date(dateString).toLocaleDateString(undefined, options)
}
  	
  	$('#dateselected').text(formatDate(start));
  	$('#selecteddatestart').val(start);
  	$('#selecteddateend').val(end);
  	$('#alldayval').val(allday);

  

  		 

  
 	 },
 	 


     eventClick: function(eventClickInfo) {
   // alert('Event: ' + info.event.title);
  	var datestr = eventClickInfo.event.startStr;
   	$('#currenteventclicked').modal('show');
   	var eventtitle = eventClickInfo.event.title;
   	var eventid = eventClickInfo.event.id;
   	var endstr = eventClickInfo.event.endStr;
   	var bgcolor = eventClickInfo.event.backgroundColor;
   	
   
   
   	$('#eventtitleclicktxt').text(eventtitle);
    $('#txttitle').val(eventtitle);
    $('#txttitle').attr('data-eid',eventid);
   	$('#headerevent').attr('style','border-left:10px solid '+ bgcolor);
   
   	const formatDate = (dateString) => {
  const options = { year: "numeric", month: "long", day: "numeric" }
  return new Date(dateString).toLocaleDateString(undefined, options)
}

	
   	$('#dateselecteds').text(formatDate(datestr));
   	$('#deleteevent').click(function() { 
				Swal.fire({
			  title: 'Are you sure ?',
			  text: "You won't be able to revert this!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.isConfirmed) {
			   
			    $('#currenteventclicked').modal('hide');
			    //backend here

			    $.ajax({
			           url : "setevent.php",
			            method: "POST",
			             data  : {deleteevent:1,eventid:eventid,eventstart:datestr,eventtitle:eventtitle,bgcolor:bgcolor},
			             success : function(data){
			             	  eventClickInfo.event.remove();
				 Swal.fire(
			      'Deleted!',
			      'Event has been deleted.',
			      'success'
			    )
			             }
			          })
			   
			  

			  }
			})
				})	
   


  		

   			
   
    // change the border color just for fun
   // info.el.style.borderColor = '#b84c3f';
    
  

  	},

  

  	 
  	 eventDrop: function(info) {
  	 	var eventname = info.event.title;
		var eventstart = info.event.startStr;
		var eventend = info.event.endStr;
		var eventurl = info.event.url;
		var bgcolor = info.event.backgroundColor;
		var brdercolor = info.event.borderColor;
		var txtcolor = info.event.textColor;
		var eventid = info.event.id;
		
		

		
   

  
    Swal.fire({
  title: 'Do you want to save the changes?',
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: `Save`,
  denyButtonText: `Don't save`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
   
  	
  	 $.ajax({
			           url : "setevent.php",
			            method: "POST",
			             data  : {moveevent:1,eventname:eventname,eventstart:eventstart,eventend:eventend,eventurl:eventurl,bgcolor:bgcolor,brdercolor:brdercolor,txtcolor:txtcolor,eventid:eventid},
			             success : function(data){
			 Swal.fire('Saved!', '', 'success')
			             }
			          })

  } else if (result.isDenied) {
  	 info.revert();
    Swal.fire('Changes are not saved', '', 'info')
  }else {
  	 info.revert();
  }
})

  },
eventReceive :function( info ) { 

		var eventname = info.event.title;
		var eventstart = info.event.startStr;
		var eventend = info.event.end;
		var eventurl = info.event.url;
		var bgcolor = info.event.backgroundColor;
		var brdercolor = info.event.borderColor;
		var txtcolor = info.event.textColor;
		var eventid = info.event.id;
     

        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
          var stat= 'removed';

			   $.ajax({
			           url : "setevent.php",
			            method: "POST",
			             data  : {savedrop:1,eventname:eventname,eventstart:eventstart,eventend:eventend,eventurl:eventurl,bgcolor:bgcolor,brdercolor:brdercolor,txtcolor:txtcolor,eventid:eventid,stat:stat},
			             success : function(data){
			            
				  Swal.fire(
				  'Event ',
				  'Added Successfully!',
				  'success'
					).then((result) => {
  
						  if (result.isConfirmed) {
						  location.reload();
						  }
						})	
			             }
			          })
        }else {
        	var stat= 'stay';
        	  $.ajax({
			           url : "setevent.php",
			            method: "POST",
			             data  : {savedrop:1,eventname:eventname,eventstart:eventstart,eventend:eventend,eventurl:eventurl,bgcolor:bgcolor,brdercolor:brdercolor,txtcolor:txtcolor,eventid:eventid},
			             success : function(data){
			             
			             					  Swal.fire(
				  'Event ',
				  'Added Successfully!',
				  'success'
					).then((result) => {
  
						  if (result.isConfirmed) {
						  location.reload();
						  }
						})	
				
			             }
			          })
        }
	

    },

    	

    

    
    


    });

	$('#saveandclose').click(function() {  
		calendar.refetchEvents();

	});

	  $('#savenewselected').click(function() {
	  
	  	
					  var selecteddatestart = $('#selecteddatestart').val();
					  var selecteddateend = $('#selecteddateend').val();
					  var alldayval = $('#alldayval').val();

			    	var eventselected = $('#eventtitlenewselected').val();
			    	var chosencolor = $('#favcolor').val();
			    	if(eventselected == ''){
			    		$('#eventtitlenewselected').attr('style','font-size:12px;border:1px solid red');
			    		$('#eventtitlenewselected').focus();
			    		$('#erroradding').text('This field is required');
			    	}else {

			    		$('#addeventdate').modal('hide');

			    	
			    	
			    	

			    	
			    $.ajax({
			           url : "setevent.php",
			            method: "POST",
			             data  : {saveevent:1,eventname:eventselected,eventstart:selecteddatestart,eventend:selecteddateend,bgcolor:chosencolor,brdercolor:chosencolor},
			             success : function(data){

			             		calendar.addEvent({
				    title:eventselected,
				    start:selecteddatestart,
				    end: selecteddateend,
				    allDay: alldayval,
				    backgroundColor: chosencolor, //Primary (light-blue)
         			borderColor    : chosencolor, //Primary (light-blue)

 							 });


			             Swal.fire(
				  'Event ',
				  'Added Successfully!',
				  'success'
					).then((result) => {
  
						  if (result.isConfirmed) {
						  location.reload();
						  }
						})		
									
				
				
			             }
			          })
			    			


			    	}
			    
			    })

  //calendar.render();
    // $('#calendar').fullCalendar()
   calendar.render();

  
    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      // Get value and make sure it is not null
     ///ADD EVENT
      var val = $('#new-event').val()
      if (val.length == 0) {
     $('#new-event').attr('style','font-size: 12px;border:1px solid red');
						$('#error').text('This field is required');
						$('#new-event').focus();
						return
      }else {
      	// Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality

      ini_events(event)
     	
      // Remove event from text input
      $('#new-event').val('')
      			
		$('#createevent').modal('hide');
				
					     
							 
								
								   $.ajax({
								           url : "setevent.php",
								            method: "POST",
								             data  : {savedrag:1,eventtitle:val,bgcolor:currColor},
								             success : function(data){

				 Swal.fire(
				 'Draggable Event ',
				  'Added Successfully!',
				  'success'
					).then((result) => {
  
						  if (result.isConfirmed) {
						  location.reload();
						  }
						})		
								             }
								          })
								 
							  



					
      }

      

    })
  })      
		      	


</script>
<script type="text/javascript">
  
  $(document).ready(function() {


    $('#editclick').click(function() { 

       var btntxtedit =  $('#btntxt').text();
       var txttile =$('#txttitle').val();
       var eid = $('#txttitle').data('eid');

      if (btntxtedit == 'Save Changes'){
        $('#disp2').addClass('d-none');
        $('#disp1').removeClass('d-none');
        $('#btntxt').text('Edit');

             $.ajax({
                           url : "setevent.php",
                            method: "POST",
                             data  : {editevent:1,eventtitle:txttile,eid:eid},
                             success : function(data){
                  

                     Swal.fire(
         'Event',
          'Updated Successfully!',
          'success'
          ).then((result) => {
  
              if (result.isConfirmed) {
              $('#currenteventclicked').modal('hide');
              location.reload();
              }
            }) 
                             }
                          })
                 

         

      }else {
        $('#disp1').addClass('d-none');
       $('#disp2').removeClass('d-none');
       $('#txttitle').select();
       $('#btntxt').text('Save Changes');
      }
     
    })

    $('#currenteventclicked').on('hidden.bs.modal', function (e) {
      $('#disp2').addClass('d-none');
       $('#disp1').removeClass('d-none');
        $('#btntxt').text('Edit');
   })
        });  


        
</script>
