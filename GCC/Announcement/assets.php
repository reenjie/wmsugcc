<!-- Modal -->
<div class="modal  fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content" style="border-left: 5px solid #d23b4d">

      <div class="modal-body">
        <div class="container">
          <p style="user-select: none"><br></p>
          <h6>Are you sure you want to delete this Announcement ?</h6>
          <br>
          <div style="float: right;">
            <input type="hidden" id="aid" name="">

            <button class="btn btn-danger" id="deleteann" data-dismiss="modal"
              style="font-size: 12px;width: 80px">yes</button>
            <button class="btn btn-warning" data-dismiss="modal" style="font-size: 12px;width: 80px">no</button>
          </div>
        </div>


      </div>

    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="border-left: 5px solid #4e73df">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Add New</h6>

      </div>
      <div class="modal-body">

        <div class="container">
          <p></p>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">
              <h6 style="font-size: 12px">Enter Announcement :</h6>
            </label>
            <textarea style="font-size: 12px" class="form-control" id="exampleFormControlTextarea1" rows="10"
              cols="50"></textarea>

            <span style="color: #e54354;font-size: 12px;" id="error"></span>
          </div>
          <p></p>

        </div>


      </div>
      <div class="modal-footer">
        <button type="button" style="font-size: 12px;" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" style="font-size: 12px;" id="savenew" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-left: 5px solid #36b9cc">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit announcement</h5>

      </div>
      <div class="modal-body">

        <div class="container">
          <p></p>

          <div class="form-group">
            <label for="txtann">
              <h6 style="font-size: 12px">Announcement content :</h6>
            </label>
            <textarea style="font-size: 12px" class="form-control" id="txtann" rows="10" cols="50"></textarea>
            <span style="color: #e54354;font-size: 12px;" id="erroredit"></span>
            <input type="hidden" id="aidedit" name="">

          </div>
          <p></p>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" style="font-size: 12px;" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" style="font-size: 12px;" id="saveedit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>