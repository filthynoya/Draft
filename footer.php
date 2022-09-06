<?php 
    if (isset ($_POST['cname'])) {
        $cname = trim_data ($_POST['cname']);
        $cemail = trim_data ($_POST['cemail']);
        $csub = trim_data ($_POST['csubject']);
        $cbody = trim_data ($_POST['cmessage']);

        $error = 0;
        $errormsg = "";
        $succ = 0;

        if (!preg_match("/^[a-zA-Z-' ]*$/", $cname)) {
            $errormsg = "Only White Space and Alphabets Allowed.";
            $error++;
        }

        if (!filter_var($cemail, FILTER_VALIDATE_EMAIL)) {
            $errormsg = "Incorrect Email";
            $error++;
        }

        if ($error == 0) {
            $sql = "insert into contact (contactname, contactemail, contactsub, contactmsg) values ('$cname','$cemail','$csub','$cbody')";

            $conn->query ($sql);

            $succ = 1;
        }
    }
?>
     <footer>
            <div class="container">
                 <div class="row">
       
                      
       
                      <div class="col-md-6 col-sm-12">
                           <div class="footer-info">
                               <h2>Keep in touch</h2>
                                <p><a href="tel:010-090-0780">010-090-0780</a></p>
                                <p><a href="mailto:info@company.com">info@company.com</a></p>
                                <p><a href="#">Our Location</a></p>

                                <div class="button1 d-md-flex justify-content-md-start section-btn">
                                    <button class="smoothScroll" type="submit" id="cf-submit" name="submit" data-bs-toggle="modal"
                                      data-bs-target="#exampleModal" data-bs-whatever="@mdo"><span data-hover="Contact">Contact</span></button>
                                   
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog modal-lg modal-dialog-centered">
                                         <div class="modal-content box">
                                           <div class="modal-header">
                                               <h2 class="h1-responsive font-weight-bold text-center my-1">Contact us</h2>
                                             <button type="button" class="btn-close cancel" data-bs-dismiss="modal" aria-label="Close"></button>
                                           </div>
                                           <div class="modal-body">
                                              <!--<form>
                                               <div class="mb-3">
                                                 <label for="recipient-name" class="col-form-label">Recipient:</label>
                                                 <input type="text" class="form-control" id="recipient-name">
                                               </div>
                                               <div class="mb-3">
                                                 <label for="message-text" class="col-form-label">Message:</label>
                                                 <textarea class="form-control" id="message-text"></textarea>
                                               </div>
           
           
                                             </form>-->
           
                                             <!--Section: Contact v.2-->
                                               <section class="mb-3">
           
                                                  
                                                   <!--Section description-->
                                                   <p class="text-center w-responsive mx-auto mb-5 d-md-block d-none">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
                                                       a matter of hours to help you.</p>
           
                                                   <div class="row contact">
           
                                                       <!--Grid column-->
                                                       <div class="col-md-9 mb-md-0 mb-5">
                                                           <form id="contact-form" name="contact-form" action="" method="POST">
           
                                                               <!--Grid row-->
                                                               <div class="row">
           
                                                                   <!--Grid column-->
                                                                   <div class="col-md-6 input-container">
                                                                       <div class="md-form mb-0">
                                                                           <input type="text" id="name" name="cname" required>
                                                                           <label for="name" class="">Your name</label>
                                                                       </div>
                                                                   </div>
                                                                   <!--Grid column-->
           
                                                                   <!--Grid column-->
                                                                   <div class="input-container col-md-6">
                                                                       <div class="md-form mb-0">
                                                                           <input type="text" id="email" name="cemail" required >
                                                                           <label for="email" class="">Your email</label>
                                                                       </div>
                                                                   </div>
                                                                   <!--Grid column-->
           
                                                               </div>
                                                               <!--Grid row-->
           
                                                               <!--Grid row-->
                                                               <div class="input-container row">
                                                                   <div class="col-md-12">
                                                                       <div class="md-form mb-0">
                                                                           <input type="text" id="subject" name="csubject" required>
                                                                           <label for="subject" class="">Subject</label>
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                               <!--Grid row-->
           
                                                               <!--Grid row-->
                                                               <div class="input-container row">
           
                                                                   <!--Grid column-->
                                                                   <div class="col-md-12">
           
                                                                       <div class="md-form mb-0">
                                                                           <textarea type="text" id="message" name="cmessage" rows="2" class="md-textarea" required></textarea>
                                                                           <label for="message">Your message</label>
                                                                       </div>
           
                                                                   </div>
                                                               </div>
                                                               <!--Grid row-->
                                                               <div class="text-center text-md-left">
                                                               <!--<a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>-->
                                                               <a class="btn btn-primary" onclick="validateForm();">Send</a>
                                                               <!--<input type="submit" class="form-control submit" value="SEND" onclick="validateForm();">-->
           
                                                           </div>
           
                                                           </form>
           
                                                           
                                                           <div class="status"></div>
                                                       </div>
                                                       <!--Grid column-->
           
                                                       <!--Grid column-->
                                                       <div class="col-md-3 text-center  d-md-block d-none">
                                                           <ul class="list-unstyled mb-0">
                                                               <li><i class="fas fa-map-marker-alt fa-2x"></i>
                                                                   <p>San Francisco, CA 94126, USA</p>
                                                               </li>
           
                                                               <li><i class="fas fa-phone mt-3 fa-2x"></i>
                                                                   <p>+ 01 234 567 89</p>
                                                               </li>
           
                                                               <li><i class="fas fa-envelope mt-3 fa-2x"></i>
                                                                   <p>contact@mdbootstrap.com</p>
                                                               </li>
                                                           </ul>
                                                       </div>
                                                       <!--Grid column-->
           
                                                   </div>
           
                                               </section>
                                               <!--Section: Contact v.2-->
           
                                             
           
           
                                           </div>
                                           <div class="modal-footer">
                                             
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                              
                        </div>
                      </div>
       
                      <div class="col-md-6 col-sm-12">
                              
                           <h2>About Us</h2>
                           <p>Sed vestibulum posuere ante, eget blandit metus. Morbi sodales feugiat erat, et placerat sapien suscipit ut.</p>
                           <ul class="social-icon">
                                <li><a href="#" class="fa fa-twitter"></a></li>
                                <li><a href="#" class="fa fa-facebook"></a></li>
                                <li><a href="#" class="fa fa-instagram"></a></li>
                                <li><a href="#" class="fa fa-linkedin"></a></li>
                           </ul>
                           
                      </div>
       
                      <div class="clearfix"></div>
       
                      <div class="col-md-12 col-sm-12">
                           <div class="copyright-text">
                                <p>Copyright © 2018 Company Name 
                                
                                | Design: Tooplate</p>
                           </div>
                      </div>
                      
                 </div>
            </div>
     </footer>

     <script>
          function validateForm() {
        
               var name =  document.getElementById('name').value;
               if (name == "") {
                    document.querySelector('.status').innerHTML = "Name cannot be empty";
                    return false;
               }
    
               var email =  document.getElementById('email').value;
               if (email == "") {
                    document.querySelector('.status').innerHTML = "Email cannot be empty";
                    return false;
               } else {
                    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    if(!re.test(email)){
                         document.querySelector('.status').innerHTML = "Email format invalid";
                         return false;
                    }
               }
               var subject =  document.getElementById('subject').value;
               if (subject == "") {
                    document.querySelector('.status').innerHTML = "Subject cannot be empty";
                    return false;
               }
               var message =  document.getElementById('message').value;
               if (message == "") {
                    document.querySelector('.status').innerHTML = "Message cannot be empty";
                    return false;
               }
               document.querySelector('.status').innerHTML = "Sending...";
               document.getElementById('contact-form').submit();
          }
     </script>

    <script>
        <?php
            if ($error != 0) {
                echo 'alert ("'.$errormsg.'")';
            }

            if ($succ != 0) {
                echo 'alert ("Success")';
            }
        ?>
</script>

     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/modernizr.custom.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>