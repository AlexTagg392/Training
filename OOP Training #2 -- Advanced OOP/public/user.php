<?php include ('includes/header.php'); ?>


 

  
<?php include("includes/functions.php") ?>
   

<div class="container">
 
    <div class="col-sm-12" style="padding: 10px; background-color: white; border: 1px solid #ddd;"><i class="fa fa-user" style="font-size:28px"> Profile of </i> <button id="deleteuser" class="btn btn-default pull-right">Delete User</button></div> <hr> <br><br>
    
     <div class="alert alert-info text-center"><br>
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&nbsp;&nbsp; &times;</a>


        <div class="progress">
          <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="50"
          aria-valuemin="0" aria-valuemax="100" style="width:50%; background-color: #6c1f74;">
          <p style="color:white; font-size=14px;">50% Profile Completed (update profile) </p>
          </div>
        </div>
  
        <div class="progress" style="">
          <div class="progress-bar progress-bar-success progress-bar-success" role="progressbar" aria-valuenow="100"
          aria-valuemin="0" aria-valuemax="100" style="width:100%; background-color: #6c1f74;">
          <p style="color:white; font-size=14px;">100% Profile Completed (success)</p>
          </div>
        </div> 

  

    </div>



    <div style="padding: 20px; background-color: white; border: 1px solid #ddd;" id="page-content">
        
     <button type="button" class="btn btn-default">Premium Account ID: <span class="badge"></span></button> <button type="button" class="btn btn-default">Basic Account ID: <span class="badge"></span></button>
         
    <a href="complete-order.php?order=3"><button type="button" class="btn btn-default">Saved Order <span class="badge"> $ </span></button>Checkout</a>
    
          
           <br><br>
          
           
            
            <div class="row" style=" padding: 2px; border-bottom: 4px solid #841990;">
              <div class="col-md-3 col-sm-4 text-center"><br><br>
              <a href="edit-profile.php"><img src="" class="img-rounded pull-left img-responsive" alt="Upload a Profile Image and complete your Profile" width="100%" height="180" style="border: 1px solid #841990;"></a>
              
              </div><br>
              
              <div class="col-md-6 col-sm-12" >
                <h1>Fullname here</h1>
                 
                 <h4 style="color: #ccc">Profession</h4>
                 
                  <p>Summary</p><br>
              </div>
              
              <div class="col-md-3 col-sm-12" style="border-left: 1px solid #ddd;">
                 
                <h5 style="color: #841990"><a href="" target="_blank" style="color: #841990"><i class="fa fa-eye"></i> View Certification</a></h5><hr>
                           
                <h5 data-toggle="modal" data-target="#colmsg" style="color: #841990"><i class="fa fa-envelope btn btn-default"></i> Message (Name of User)</h5><br>
                  
                <a href="" style="color:#841990">Status: </a><br><hr>    
                 
                <h5 style="color: #841990">Membership Reason: <br><br> </h5><hr>
   
              </div>
              <br>
              
            </div><br>
           
           

        </div> <br>
        
        
         <!-- Modal -->
                    <div id="colmsg" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                        
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Messaging Member</h4>
                          </div>
                          <div class="modal-body">
                        
                            <form class="" role="form" method="post" action="">

                                <div class="form-group">
                                    <label for="receiver_email">Email <span class="required">*</span></label>
                                    <input type="text" aria-required="true" size="30" name="receiver_email" value="" class="form-control" placeholder="" disabled>
                                </div>
                                
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea aria-required="true" rows="8" cols="45" name="message" id="message" class="form-control" placeholder="Type Message Here "></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="checkbox-inline"><span class="required"></span><input type="checkbox" value="2" name="notify">Notify by Email</label>
                                </div>

                                <div class="form-group">
                                    <!-- <input type="submit" value="Send" id="contact_form_submit" name="contact_submit" class="theme_button"> -->
                                    <button type="submit" id="contact_form_submit" name="msg_col" class="btn btn-default">Submit</button>
                                </div>
                            </form>
                        
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                      

                      </div>
                    </div>

  
</div><!--page content-->

<?php include ('includes/footer.php'); ?>