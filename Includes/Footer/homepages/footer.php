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
 <section class="mt-5">
     <footer class="mt-5 position-absolute w-100">
         <div class="container-fluid p-0 no gutters">
             <div class="jumbotron mb-0 bg-footer  w-100 h-25">
                 <div class="row content-for-large-width-screen">
                     <div class="col-md-4">
                         <div class="d-flex justify-content-around ">
                             <?php
                                $directories = array("../../", "../", "../../../");
                                ?>
                             <?php foreach ($directories as $directory) { ?>
                                 <?php if (file_exists($directory . "tools/assets/title.png")) { ?>
                                     <img class="img-fluid title pr-3 border-right border-dark ml-3 footer-title" src="<?php echo ($directory . "tools/assets/title.png") ?>">
                                 <?php } else {
                                        echo null;
                                    } ?>
                             <?php } ?>
                             <nav class="secondary-navbar navbar-expand-lg navbar-light">
                                 <div class="d-flex justify-content-center">
                                     <button class="navbar-toggler" type="button" data-target="#footerNavbar" data-toggle="collapse" aria-controls="footerNavbar" aria-expanded="false" aria-label="Toggle navigation">
                                         <span class="navbar-toggler-icon"></span>
                                     </button>
                                 </div>
                                 <div class="collapse navbar-collapse" id="footerNavbar">
                                     <ul class="navbar-nav">
                                         <li class="nav-item">
                                             <a class="nav-link" href="javascript:void(0)">Home <span class="sr-only">(current)</span></a>
                                         </li>
                                         <li class="nav-item ">
                                             <a class="nav-link" href="javascript:void(0)" data-toggle="dropdown">About</a>
                                             <div class="dropdown-menu">
                                                 <a class="dropdown-item" href="javascript:void(0)">Who we are</a>
                                                 <a class="dropdown-item" href="javascript:void(0)">What we do</a>
                                                 <a class="dropdown-item" href="javascript:void(0)">Terms and conditions</a>
                                                 <a class="dropdown-item" href="javascript:void(0)">Ranking</a>
                                             </div>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link" href="javascript:void(0)" data-toggle="dropdown">Contacts</a>
                                             <div class="dropdown-menu">
                                                 <a class="dropdown-item" href="javascript:void(0)">Location</a>
                                                 <a class="dropdown-item" href="javascript:void(0)">Contacts</a>
                                                 <a class="dropdown-item" href="javascript:void(0)">Live Chat</a>
                                                 <a class="dropdown-item" href="javascript:void(0)">Comment</a>
                                             </div>
                                         </li>
                                         <li class="nav-item dropdown">
                                             <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                 Services
                                             </a>
                                             <div class="dropdown-menu">
                                                 <a class="dropdown-item" href="javascript:void(0)">Products</a>
                                                 <a class="dropdown-item" href="javascript:void(0)">Services</a>
                                             </div>
                                         </li>

                                         <li class="nav-item">
                                             <a class="nav-link" href="javascript:void(0)" data-toggle="dropdown">Contacts</a>
                                             <div class="dropdown-menu">
                                                 <a class="dropdown-item" href="javascript:void(0)">Sign in</a>
                                                 <a class="dropdown-item" href="javascript:void(0)">Create Account</a>
                                             </div>
                                         </li>
                                     </ul>
                                 </div>
                             </nav>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="d-flex justify-content-center mt-2">
                             <ul class="d-inline-block ml-md-n3">
                                 <a href="javascript:void(0)"> <i class="fab fa-facebook mr-3"></i></a>
                                 <a href="javascript:void(0)"> <i class="fab fa-instagram mr-3"></i></a>
                                 <a href="javascript:void(0)"> <i class="fas fa-envelope mr-3"></i></a>
                                 <a href="javascript:void(0)"> <i class="fab fa-twitter mr-3"></i></a>
                                 <a href="javascript:void(0)"> <i class="fab fa-linkedin mr-3"></i></a>
                                 <a href="javascript:void(0)"> <i class="fab fa-snapchat mr-3"></i></a>
                             </ul>
                         </div>
                         <div class="d-flex justify-content-center">
                             <p class="lead text-center">&copy; Adept <?php echo date("Y"); ?></p>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="d-flex justify-content-around">
                             <div class="mt-n3">
                                 <h6 class="text-center text-secondary"><i class="far fa-newspaper"></i> Subscribe to our newsletter</h6>
                                 <p class="text-body text-center content-for-large-width-screen">Receive the latest news on fashion directly to your email address</p>
                                 <div class="d-flex justify-content-center">
                                     <button class="btn btn-warning p-3 shadow" data-toggle="modal" data-target="#newsletter-subscription">Subscribe</button>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <section class="content-for-small-width-screens">
                     <nav class="navbar navbar-horizontal navbar-light d-block content-for-small-width-screens">
                         <div class="d-flex justify-content-center mt-3">
                             <button class="navbar-toggler mb-3" type="button" data-toggle="collapse" data-target="#Dropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                 <span class="navbar-toggler-icon"></span>
                             </button>
                         </div>
                         <div class="collapse navbar-collapse" id="Dropdown">
                             <ul class="nav justify-content-center">
                                 <li class="nav-item">
                                     <button type="button" class="btn btn-transparent" data-toggle="modal" data-target="#Modal">
                                         Newsletter Subscription
                                     </button>
                                 </li>
                             </ul>
                         </div>
                         <div class="collapse navbar-collapse" id="Dropdown">
                             <ul class="nav justify-content-center">
                                 <li class="nav-item dropdown">
                                     <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         What we offer
                                     </a>
                                     <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                         <a class="dropdown-item" href="javascript:void(0)">Products</a>
                                         <a class="dropdown-item" href="javascript:void(0)">Services</a>
                                         <a class="dropdown-item" href="javascript:void(0)">Advertise</a>
                                         <a class="dropdown-item" href="javascript:void(0)">Partner with us</a>
                                     </div>
                                 </li>
                             </ul>
                         </div>
                         <div class="collapse navbar-collapse" id="Dropdown">
                             <ul class="nav justify-content-center">
                                 <li class="nav-item dropdown">
                                     <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         About us
                                     </a>
                                     <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                         <a class="dropdown-item" href="javascript:void(0)">Who we are</a>
                                         <a class="dropdown-item" href="javascript:void(0)">What we do</a>
                                         <a class="dropdown-item" href="javascript:void(0)">Terms & conditions</a>
                                         <a class="dropdown-item" href="javascript:void(0)">Get Involved</a>
                                     </div>
                                 </li>
                             </ul>
                         </div>
                         <div class="collapse navbar-collapse" id="Dropdown">
                             <ul class="nav justify-content-center">
                                 <li class="nav-item dropdown">
                                     <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         Reach us
                                     </a>
                                     <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                         <a class="dropdown-item" href="javascript:void(0)">Our location</a>
                                         <a class="dropdown-item" href="javascript:void(0)">Our contacts</a>
                                         <a class="dropdown-item" href="javascript:void(0)">Social Media</a>
                                         <a class="dropdown-item" href="javascript:void(0)">Comment</a>

                                     </div>
                                 </li>
                             </ul>
                         </div>
                     </nav>
                     <div class="d-flex justify-content-center ml-n4 content-for-small-width-screens">
                         <ul class="d-inline-block">
                             <a a href="javascript:void(0)"> <i class="fab fa-facebook mr-3"></i></a>
                             <a a href="javascript:void(0)"> <i class="fab fa-instagram mr-3"></i></a>
                             <a a href="javascript:void(0)"> <i class="fas fa-envelope mr-3"></i></a>
                             <a a href="javascript:void(0)"> <i class="fab fa-twitter mr-3"></i></a>
                             <a a href="javascript:void(0)"> <i class="fab fa-linkedin mr-3"></i></a>
                         </ul>
                     </div>

                     <div class="d-flex justify-content-center mx-auto content-for-small-width-screens">
                         <img src="../tools/assets/title.png" class="img-fluid title">
                     </div>

                     <div class="d-flex justify-content-center mx-auto content-for-small-width-screens">
                         <p class="text-muted">&copy; 2020</p>
                     </div>
                 </section>
             </div>

         </div>


         </div>
     </footer>
 </section>