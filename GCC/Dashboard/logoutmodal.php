<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-size: 12px" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="font-size: 12px">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" style="font-size: 12px" data-dismiss="modal">Cancel</button>
                    <?php 
                    if(isset($coll)){
                        ?>
                          <a class="btn btn-primary" href="../../../logout.php?GCC" style="font-size: 12px">Logout</a>
                        <?php
                    }else {
                        ?>
                          <a class="btn btn-primary" href="../../logout.php?GCC" style="font-size: 12px">Logout</a>
                        <?php
                    }

                     ?>
                  
                </div>
            </div>
        </div>
    </div>