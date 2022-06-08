  $(document).ready(function () {

    $('#savenew').click(function () {
      var newannouncment = $('#exampleFormControlTextarea1').val();
      if (newannouncment == '') {
        $('#exampleFormControlTextarea1').focus();
        $('#exampleFormControlTextarea1').attr('style', 'border:1px solid #e54354;font-size:12px');
        $('#error').text('This field is required *');
      } else {



        $('#addnew').modal('hide');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            const data = this.responseText;


            contents();
            Swal.fire(
              'Announcement ',
              'Added Successfully!',
              'success'
            );
            $('#changecolor').attr('style', 'border:1px solid #1bc86f');
            $('#cn').html('<h6 style="font-size: 14px;" class="m-0 font-weight-bold text-primary" >New Announcement added Successfully ✓</h6>');
            var clear = setInterval(function () {
              $('#cn').html('<h6 style="font-size: 14px;" class="m-0 font-weight-bold text-primary" >Contents</h6>');
              $('#changecolor').removeAttr('style');
              clearInterval(clear);
            }, 3000);

          }
        };
        xhttp.open("POST", "../include/assets/manage.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("addnew=1&cont=" + newannouncment);


      }
    })

    $('#saveedit').click(function () {
      var editann = $('#txtann').val();
      var id = $('#aidedit').val();
      if (editann == '') {
        $('#txtann').focus();
        $('#txtann').attr('style', 'border:1px solid #e54354;font-size:12px');
        $('#erroredit').text('This field is required *');
      } else {



        $('#edit').modal('hide');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            const data = this.responseText;


            contents();
            Swal.fire(
              'Announcement ',
              'Updated Successfully!',
              'success'
            );
            $('#changecolor').attr('style', 'border:1px solid #1bc86f');
            $('#cn').html('<h6 style="font-size: 14px;" class="m-0 font-weight-bold text-primary" >Announcement Updated successfully ✓</h6>');
            var clear = setInterval(function () {
              $('#cn').html('<h6 style="font-size: 14px;" class="m-0 font-weight-bold text-primary" >Contents</h6>');
              $('#changecolor').removeAttr('style');
              clearInterval(clear);
            }, 4000);

          }
        };
        xhttp.open("POST", "../include/assets/manage.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("updateann=1&cont=" + editann + "&id=" + id);


      }
    })
    $('#addnew').on('hidden.bs.modal', function (e) {
      $('#exampleFormControlTextarea1').attr('style', 'font-size: 12px');
      $('#error').text('');
      $('#exampleFormControlTextarea1').val('');
    })
    $('#edit').on('hidden.bs.modal', function (e) {
      $('#txtann').attr('style', 'font-size: 12px');
      $('#erroredit').text('');

    })

    $('#exampleFormControlTextarea1').keyup(function () {
      $('#exampleFormControlTextarea1').attr('style', 'font-size: 12px');
      $('#error').text('');
    })
    $('#txtann').keyup(function () {
      $('#txtann').attr('style', 'font-size: 12px');
      $('#erroredit').text('');
    })

    $('#deleteann').click(function () {
      var aid = $('#aid').val();


      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const data = this.responseText;


          contents();
          $('#changecolor').attr('style', 'border:1px solid #1bc86f');
          $('#cn').html('<h6 style="font-size: 14px;" class="m-0 font-weight-bold text-primary" >Announcement DELETED successfully ✓</h6>');
          var clear = setInterval(function () {
            $('#cn').html('<h6 style="font-size: 14px;" class="m-0 font-weight-bold text-primary" >Contents</h6>');
            $('#changecolor').removeAttr('style');
            clearInterval(clear);
          }, 3000);

        }
      };
      xhttp.open("POST", "../include/assets/manage.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("deleteaid=1&aid=" + aid);









    })




    contents();

    function contents() {

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const data = this.responseText;

          // Your condition here if data success.
          $('#contentss').html(data);
        }
      };
      xhttp.open("POST", "../include/assets/manage.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("content=1");


    }
  });