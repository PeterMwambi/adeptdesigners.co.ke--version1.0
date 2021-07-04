 <!-- Modal for subscribe to news letter -->
 <div class="modal fade" id="newsletter-subscription" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Subscribe to our News Letter</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <?php $subscription_token = Token::createInstance("SUBSCRIPTION_TOKEN"); ?>
                 <form method="POST" name="subscription-form" action="">
                     <div class="d-flex justify-content-center">
                         <div class="spinner-grow text-warning spinner" role="status">
                             <span class="sr-only">Loading...</span>
                         </div>
                         <div class="spinner-grow text-warning spinner" role="status">
                             <span class="sr-only">Loading...</span>
                         </div>
                         <div class="spinner-grow text-warning spinner" role="status">
                             <span class="sr-only">Loading...</span>
                         </div>
                     </div>
                     <div class="alert alert-success d-none auth-message">
                         <span name="confirmation-message"></span>
                     </div>
                     <div class="form-group">
                         <label for="email">Enter your Email address</label>
                         <input type="email" class="mt-1 mb-2 input-blur" name="newsletterEmail">
                         <span name="newsletterEmailErr" class="text-warning mb-2"></span>
                     </div>
                     <input type="hidden" name="subscription" value="<?php echo $subscription_token->getToken(); ?>">
                     <div class="form-group">
                         <input type="submit" class="btn btn-warning btn-lg shadow" value="Subscribe" name="submit__getUpdates">
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>

 <footer class="mt-5">
     <section class="mt-5">
         <div class="jumbotron-fluid bg-light mt-5">
             <div class="container quick-links">
                 <div class="row grid-divider">
                     <div class="col-4 my-5 border-right">
                         <div class="text-left">
                             <h6 class="text-center font-weight-bolder lead">What we offer</h6>
                             <div class="text-body">
                                 <ul class="list-group">
                                     <li class="list-group-item"><a href="javascript:void(0)">Products</a></li>
                                     <li class="list-group-item"><a href="javascript:void(0)">Services</a></li>
                                     <li class="list-group-item"><a href="javascript:void(0)">Advertise</a></li>
                                     <li class="list-group-item"><a href="javascript:void(0)">Partner with us</a></li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                     <div class="col-4 my-5 border-right">
                         <div class="text-left">
                             <h6 class="text-center font-weight-bolder lead">Get Intouch</h6>
                             <div class="text-body">
                                 <ul class="list-group">
                                     <li class="list-group-item"><a href="javascript:void(0)">Contacts</a></li>
                                     <li class="list-group-item"><a href="javascript:void(0)">Location</a></li>
                                     <li class="list-group-item"><a href="javascript:void(0)">Social Media</a></li>
                                     <li class="list-group-item"><a href="javascript:void(0)">Comment</a></li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                     <div class="col-4 my-5">
                         <div class="text-left">
                             <h6 class="text-center font-weight-bolder lead">About Us</h6>
                             <div class="text-body">
                                 <ul class="list-group">
                                     <li class="list-group-item"><a href="javascript:void(0)">Who we are</a></li>
                                     <li class="list-group-item"><a href="javascript:void(0)">What we do</a></li>
                                     <li class="list-group-item"><a href="javascript:void(0)" href="Terms & Conditions">T&Cs</a></li>
                                     <li class="list-group-item"><a href="javascript:void(0)">Get Involved</a></li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="container subscription-banner">
                 <div class="row mt-lg-3 mb-lg-3">
                     <div class="d-flex justify-content-lg-center col-lg-6">
                         <?php
                            $directories = array("../../", "../", "../../../");
                            ?>
                         <?php foreach ($directories as $directory) { ?>
                             <?php if (file_exists($directory . "tools/assets/title.png")) { ?>
                                 <img class="img-fluid title" src="<?php echo ($directory . "tools/assets/title.png") ?>">
                             <?php } else {
                                    echo null;
                                } ?>
                         <?php } ?>
                     </div>
                     <div class="col-lg-6">
                         <h5 class="text-center lead">Subscribe to our newsletter</h5>
                         <p class="text-center">Receive the latest news on fashion and trend directly on your email address</p>
                         <div class="d-flex justify-content-center">
                             <button type="button" class="btn btn-warning btn-lg" data-target="#newsletter-subscription" data-toggle="modal">Subscribe</button>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="d-flex justify-content-center">
                 <div class="col-6 mt-5">
                     <div class="text-center">
                         <i class="fas fa-quote-left"></i>
                     </div>
                     <div class="blockquote text-bold text-center">
                         Style is a way of saying who you are without having to speak
                     </div>
                 </div>
             </div>
             <ul class="col-12 d-flex justify-content-lg-center large">
                 <a a href="javascript:void(0)"> <i class="fab fa-facebook mr-3"></i></a>
                 <a a href="javascript:void(0)"> <i class="fab fa-instagram mr-3"></i></a>
                 <a a href="javascript:void(0)"> <i class="fas fa-envelope mr-3"></i></a>
                 <a a href="javascript:void(0)"> <i class="fab fa-twitter mr-3"></i></a>
                 <a a href="javascript:void(0)"> <i class="fab fa-linkedin mr-3"></i></a>
                 <a a href="javascript:void(0)"> <i class="fab fa-snapchat mr-3"></i></a>
             </ul>
             <div class="d-flex justify-content-center mx-auto bg-light  pb-5">
                 <p class="text-muted">&copy; <?php echo date("Y"); ?></p>
             </div>
         </div>
     </section>
 </footer>