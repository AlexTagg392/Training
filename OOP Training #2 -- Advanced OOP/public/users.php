<?php include ('includes/header.php');

  include 'includes/functions.php';
?>
  

<script>



</script>

<div class="container">
    
       
              <h4 class="">Refine Search <a href="admin/pages/index.php" class="btn btn-default pull-right">Back To Account</a></h4> <br> 
                 <div style="padding: 20px; border: 1px solid #ddd; background-color: #fff;">
                    
                    <div class="row">
                      
                        <div class="col-md-3">
                           <p>Select Country</p>
                            <div class="form-group">
                              
                              <select class="form-control" id="country">
                             
                               
                                <option>Select Country</option>
                              
                              </select>
                            
                            </div>
                        </div>
                         <div class="col-md-3">
                           <p>Select Membership</p>
                            <div class="form-group">
                              
                              <select class="form-control" id="member">
                             
                               
                                <option>Select Membersip</option>
                              
                              </select>
                            
                            </div>
                        </div>
                         <div class="col-md-6">
                         <p>Which Profession ?</p>
                          <input class='form-control' type="text" name='search' id='search' placeholder='Start Typing..'>
                         </div>
                         
                          <br><br><br>
                             <p class="text-center" style="color: blue;">Error Messages Here</p>
                          <div id="result">
                          
                                  
                          </div>
                    </div>
                 </div><br>
               
                <section id="contact" class="grey_section" style="padding: 20px; border: 1px solid #ddd; background-color: #fff;">
                    <!--<div class="container"> container disabled-->
                        <div class="row">                    
                            <div>
                                <header class="section_header">
                                     <h5 class="">Veiwing Members</h5><hr>
                                   
                                    
                                </header>
                            <div class="widget col-md-12 to_animate">

                                   <table class="table table-bordered table-hover" style="background-color: #fff">
                                        
                                        <tr class="info">
                                        <td class="text-center"><strong>Full Name</strong></td>
                                        <td class="text-center"><strong>Email</strong></td>
                                        <td class="text-center"><strong>Location</strong></td>
                                        <td class="text-center"><strong>Image</strong></td>
                                        <td class="text-center"><strong>Profession</strong></td>
                                        <td class="text-center"><strong>Profile</strong></td>
                                        </tr>
                                 
                                        <tr>
                                        <td class="text-center"><br></td>
                                        <td class="text-center"><br></td>
                                        <td class="text-center"><br></td>
                                        <td class="text-center"><img src="" class="img-rounded" alt="Image" width="50" height="60"></td>
                                        <td class="text-center"><br></td>
                                        <td class="text-center"><br><a href="user.php">View Profile</a></td>
                                        </tr>
                                  
                                    </table>
                                
                            </div>
                                    
                            </div>

                        </div>
                    <!--<div"> container disabled-->
                </section>
  
</div>



<?php include ('includes/footer.php'); ?>