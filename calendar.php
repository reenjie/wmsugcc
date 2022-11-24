 <!--		<div class="month">
  <ul>
   <li class="prev">&#10094;</li>
    <li class="next">&#10095;</li>-->
   <!-- <li>August<br><span style="font-size:18px">2021</span></li>
  </ul>
</div>

<ul class="weekdays">
  <li>Mo</li>
  <li>Tu</li>
  <li>We</li>
  <li>Th</li>
  <li>Fr</li>
  <li>Sa</li>
  <li>Su</li>
</ul>

<ul class="days">
  <li>1</li>
  <li>2</li>
  <li>3</li>
  <li>4</li>
  <li>5</li>
  <li>6</li>
  <li>7</li>
  <li>8</li>
  <li>9</li>
  <li><span class="active">10</span></li>
  <li>11</li>
  <li>12</li>
  <li>13</li>
  <li>14</li>
  <li>15</li>
  <li>16</li>
  <li>17</li>
  <li>18</li>
  <li>19</li>
  <li>20</li>
  <li>21</li>
  <li>22</li>
  <li>23</li>
  <li>24</li>
  <li>25</li>
  <li>26</li>
  <li>27</li>
  <li>28</li>
  <li>29</li>
  <li>30</li>
  <li>31</li>


 
</ul>-->
 <link href='calendar/lib/main.css?v=1' rel='stylesheet' />
    <script src='calendar/lib/main.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
             events: [

        <?php 
      
              $sqlevent = " SELECT * FROM `events` where status = 0  ";
                          $resultevent = mysqli_query($con,$sqlevent); // run query
                         
                           while($row = mysqli_fetch_array($resultevent)){
                            $estart = $row['start'];
                      ?>
                      {
          id            : <?php echo $row['e_id'] ?>,
          title          : '<?php echo $row['title'] ?>',
          start       : new Date(<?php echo date('Y',strtotime($estart)) ?>,<?php echo date('m',strtotime($estart)) ?>-1, <?php echo date('d',strtotime($estart)) ?>),
          backgroundColor: '<?php echo $row['bgcolor'] ?>',
          borderColor    : '<?php echo $row['brdercolor']?>', 
          allDay      : <?php echo $row['allday'] ?>,

          
        },
                      <?php
                           }
                    

         ?>
      
      ],

          initialView: 'dayGridMonth',
          themeSystem: 'bootstrap'

        });
      

      
        calendar.render();



      });

    </script>
     <div id='calendar'></div>