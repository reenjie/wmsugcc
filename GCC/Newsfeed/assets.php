
<!-- Modal -->
<div class="modal  fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content" style="border-left: 5px solid #d23b4d">
     
      <div class="modal-body">
           <div class="container">
            <p style="user-select: none"><br></p>
            <h6>Are you sure you want to delete this News feed ?</h6>
            <br>
             <div style="float: right;"> 
              <input type="hidden" id="aid" name="">
             
            <button class="btn btn-danger" id="deletenf" data-dismiss="modal" style="font-size: 12px;width: 80px">yes</button>
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
    <div class="modal-content" id="form" style="border-left: 5px solid #4e73df">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Add New Article</h6>
        
      </div>
      <form method="post" enctype="multipart/form-data" onsubmit="return false" action="../include/assets/manage.php" id="newsfeedsavenew">
      <div class="modal-body">
     <div class="container">
            <div class="row">
               
                 
             <input type="hidden" name="trigger" id="trigger" value="noimage">
               <div class="col-md-4" style="text-align: center;">
                  <img src="../img/undraw_moments_0y20.png" style="width: 200px;height: 200px;" id="configimage" class="img-fluid img-thumbnail">
                  <div class="form-group">
    <label for="exampleFormControlFile1"></label>
    <input type="file" class="form-control-file" id="image" name="images[]" disabled="">
  </div>
                 <p></p>
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="checkwphoto" value="option1">
  <label class="form-check-label" for="inlineCheckbox1">Upload photo</label>
</div>
  

               </div>
                <div class="col-md-8">
                    <p></p>

                       <div class="form-group">
                    <label for="exampleFormControlTextarea1"><h6 style="font-size: 12px">Enter title :</h6> </label>
                 <input type="text" name="txttitle" class="form-control" id="txttitle" required="" style="font-size: 12px">
                    
                    <span style="color: #e54354;font-size: 12px;" id="error"></span>
                  </div>
                  <p></p>
              
                      <div class="form-group">
                    <label for="exampleFormControlTextarea1"><h6 style="font-size: 12px">Enter News feed content :</h6> </label>
                  <textarea  style="font-size: 12px"  class="form-control" id="exampleFormControlTextarea1" name="nfcontent" rows="5" cols="50" required=""></textarea>
                    
                    <span style="color: #e54354;font-size: 12px;" id="error"></span>
                  </div>
              <p></p>
              <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="checkwlink" value="option1">
            <label class="form-check-label" for="inlineCheckbox1"><span id="txtlink">Add link</span></label>
             </div>

               <div class="form-group d-none" id="linkadd">
                    <label ><h6 style="font-size: 12px">Enter Link :</h6> </label>
                    <input type="text" name="linkat" style="font-size: 12px" placeholder="example : (https://wmsu.edu.ph)" class="form-control" id="txtlinks">
                    
                    
                  </div>

                </div>

               
            </div>
              

           </div> 
           

      </div>
      <div class="modal-footer">
        <button type="button" style="font-size: 12px;" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" style="font-size: 12px;" id="savenew"  class="btn btn-primary">Save</button>
      </div>
      </form>  
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="uptform" style="border-left: 5px solid #36b9cc">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit announcement</h5>
       
      </div>
       <form method="post" enctype="multipart/form-data" onsubmit="return false" action="../include/assets/manage.php" id="uptnewsfeedsavenew">
      <div class="modal-body">
           
           <div class="container">
            <div class="row">
               
                 
             <input type="hidden" name="upttrigger" id="upttrigger" value="noimage">
               <div class="col-md-4" style="text-align: center;">
                  <img src="../img/undraw_moments_0y20.png" style="width: 200px;height: 200px;" id="uptconfigimage" class="img-fluid img-thumbnail">
                  <div class="form-group">
    <label for="exampleFormControlFile1"></label>
    <input type="file" class="form-control-file" id="uptimage" name="uptimages[]" disabled="">
  </div>
                 <p></p>
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="uptcheckwphoto" value="option1">
  <label class="form-check-label" for="inlineCheckbox1">Update photo</label>
</div>

  <input type="hidden" name="nid" id="nid">
  <input type="hidden" name="defimg" id="defimg" >
               </div>
                <div class="col-md-8">
                    <p></p>

                       <div class="form-group">
                    <label for="exampleFormControlTextarea1"><h6 style="font-size: 12px">Title :</h6> </label>
                 <input type="text" name="upttxttitle" class="form-control" id="upttxttitle" required="" style="font-size: 12px">
                    
                    <span style="color: #e54354;font-size: 12px;" ></span>
                  </div>
                  <p></p>
              
                      <div class="form-group">
                    <label for="uptexampleFormControlTextarea1"><h6 style="font-size: 12px">News feed content :</h6> </label>
                  <textarea  style="font-size: 12px"  class="form-control" id="uptexampleFormControlTextarea1" name="uptnfcontent" rows="5" cols="50" required=""></textarea>
                    
                    <span style="color: #e54354;font-size: 12px;" id="error"></span>
                  </div>
              <p></p>
             

               <div class="form-group " >
                    <label ><h6 style="font-size: 12px">Link :</h6> </label>
                    <input type="text" name="uptlinkat" style="font-size: 12px" placeholder="Link not available" class="form-control" id="upttxtlinks">
                    
                    
                  </div>

                </div>

               
            </div>
              

           </div> 

      </div>
      <div class="modal-footer">
        <button type="button" style="font-size: 12px;" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" style="font-size: 12px;" id="saveedit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="addnewpeer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="peerform">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Add New Peer Facilitator</h6>
       
      </div>
       <form method="post" enctype="multipart/form-data" action="peer.php" id="formpeer">
         
    
      <div class="modal-body">
        
        <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <input type="hidden" name="peertrigger" id="peertrigger" value="noimage">
            
            <img src="../img/undraw_profile_pic_ic5t.png" style="width: 200px;height: 200px;" id="configimagepeer" class="img-fluid img-thumbnail">
                  <div class="form-group">
    <label for="exampleFormControlFile1"></label>
    <input type="file" class="form-control-file" id="imagepeer" name="imagespeer[]" disabled="">
  </div>
                 <p></p>
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="checkwphotopeer" value="option1">
  <label class="form-check-label" for="inlineCheckbox1">Upload photo</label>
</div>

          </div>
          <div class="col-sm-8">
              
              
                  <span style="font-size: 14px;font-weight: bolder" class="text-gray-800">Personal Details </span><hr>
               
                <div class="row">
                  <div class="col-md-12">
                      
                       University Email
                         <input type="email" class="form-control txt" name="em" style="font-size: 12px;" name="" required=""> 

                  </div>
                   <div class="col-md-12"></div> 
                   
                  <p></p>
                    <div class="col-md-4">
                        Last Name
                         <input type="text" class="form-control txt" name="ln" style="font-size: 12px;" name="" required="">
                    </div>
                    <div class="col-md-4">
                        First Name
                         <input type="text" class="form-control txt" name="fn" style="font-size: 12px;" name="" required="">
                    </div>
                    <div class="col-md-2">
                        M.I
                       <input type="text" class="form-control txt" name="mi" style="font-size: 12px;" name="">
                    </div>
                      <div class="col-md-2">
                        Ext.
                       <input type="text" class="form-control txt"  name="ext" style="font-size: 12px;" name="">
                    </div>
                </div>
                <br>
                <div class="row">
                    
                    <div class="col-md-6">
                          
                     Major
                         <input type="text" class="form-control txt" name="major" style="font-size: 12px;" name="" required="">
                    </div>
                      <div class="col-md-6">
                          
                             Year in School
                       
                         <input type="text" class="form-control txt" name="year" style="font-size: 12px;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required="">
                      </div>

                </div>
                

              


          </div>
        </div>
        </div>



      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="font-size: 12px" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" style="font-size: 12px">Save </button>
      </div>
         </form>  

    </div>
  </div>
</div>





<!-- Modal -->
<div class="modal fade" id="editpeermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="peereditcont">
      <div class="modal-header">
       
      </div>
       <form method="post" enctype="multipart/form-data" action="peer.php" id="formeditpeer" >
         
      
      <div class="modal-body">
            
            <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <input type="hidden" name="peertriggeredit" id="peertriggeredit" value="noimage">
            
            <img src="../img/undraw_profile_pic_ic5t.png" style="width: 200px;height: 200px;" id="configimagepeeredit" class="img-fluid img-thumbnail">
                  <div class="form-group">
    <label for="exampleFormControlFile1"></label>
    <input type="file" class="form-control-file" id="imagepeeredit" name="imagespeeredit[]" disabled="">
  </div>
                 <p></p>
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="checkwphotopeeredit" value="option1">
  <label class="form-check-label" for="inlineCheckbox1">Update photo</label>
</div>

          </div>
          <div class="col-sm-8">
              
              
                  <span style="font-size: 14px;font-weight: bolder" class="text-gray-800">Personal Details </span><hr>
               
                <div class="row">
                  <div class="col-md-12">
                      
                       University Email
                         <input type="email" class="form-control" name="emedit" id="emedit" style="font-size: 12px;" name="" required=""> 

                  </div>
                   <div class="col-md-12"></div> 
                   
                  <p></p>
                    <div class="col-md-4">
                        Last Name
                         <input type="text" class="form-control " name="lnedit" id="lnedit" style="font-size: 12px;" name="" required="">
                    </div>
                    <div class="col-md-4">
                        First Name
                         <input type="text" class="form-control " name="fnedit" id="fnedit" style="font-size: 12px;" name="" required="">
                    </div>
                    <div class="col-md-2">
                        M.I
                       <input type="text" class="form-control " name="miedit" id="miedit" style="font-size: 12px;" name="">
                    </div>
                      <div class="col-md-2">
                        Ext.
                       <input type="text" class="form-control "  name="extedit" id="extedit"  style="font-size: 12px;" name="">
                    </div>
                </div>
                <br>
                <div class="row">
                    
                    <div class="col-md-6">
                          
                     Major
                         <input type="text" class="form-control " name="majoredit" id="majoredit" style="font-size: 12px;" name="" required="">
                    </div>
                      <div class="col-md-6">
                          
                             Year in School
                       
                         <input type="text" class="form-control " name="yearedit" id="yearedit" style="font-size: 12px;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required="">
                      </div>

                </div>
              
  <input type="hidden" name="pid" id="pfid">
              


          </div>
        </div>
        </div>


      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" style="font-size: 12px" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" style="font-size: 12px">Save </button>
      </div>
       </form>  
    </div>
  </div>
</div>