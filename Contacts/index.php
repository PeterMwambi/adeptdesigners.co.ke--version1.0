<?php
define("PATHNAME", true);
require "../models/Config/core.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../tools/assets/icons/apple-touch-icon-iphone-60x60.png">
    <link rel="icon" sizes="60x60" href="../tools/assets/icons/apple-touch-icon-ipad-76x76.png">
    <link rel="icon" sizes="114x114" href="../tools/assets/icons/apple-touch-icon-iphone-retina-120x120.png">
    <link rel="icon" sizes="144x144" href="../tools/assets/icons/apple-touch-icon-ipad-retina-152x152.png">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
    <!-- <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../tools/css/global/bootstrap.min.css">
    <link rel="stylesheet" href="../tools/FontAwesome/css/all.css">
    <link rel="stylesheet" href="../tools/css/global/uniform.css">
    <link rel="stylesheet" href="../tools/css/global/animate.css">
    <link rel="stylesheet" href="../tools/css/page/contacts.css">
    <link rel="stylesheet" href="../tools/css/global/responsive.css">
    <title>Contact Us</title>
</head>

<body>
    <!-- Header Body-->
    <!-- @Content header URL links  -->
    <?php include "../Includes/header/header.php"; ?>
    <!-- End primary navigation bar content -->

    <!-- Secondary navigation bar-->
    <!-- @Content header URL links  -->
    <?php include "../Includes/header/secondary-navbar.php"; ?>
    <!-- End secondary navigation bar content -->

    <!-- Begin home content -->
    <!-- @content short product, about, contacts content description -->

    <section class="pb-1 ml-lg-5 mr-lg-5">
        <div class="container-fluid mb-5">
            <div class="card mt-5 shadow">
                <div class="card-header">
                    <h1 class="text-center text-warning content-for-large-width-screen"><i class="fas fa-map-marker-alt"></i> Find our locations</h1>
                    <h1 class="text-center text-warning content-for-small-width-screens"><i class="fas fa-map-marker-alt"></i> Location</h1>
                </div>
                <div class="card-body">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="../tools/assets/icon.png" class="img-fluid icon-large mt-2 content-for-large-width-screen" alt="">
                        </div>
                        <div class="col-md-8">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe src="https://www.google.com/maps/d/embed?mid=15fWhTqBCmxaf8O1bonhC-Mtgl4H-oyB3"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="content-for-large-width-screen">
                        <div class="row">
                            <div class="col-md-3">
                                <small class="small"><strong>Adept Nairobi</strong></small><br>
                                <small class="small">Gill House 4th Floor</small><br>
                                <small class="small">Afya House 2nd Floor</small>
                            </div>

                            <div class="col-md-3">
                                <small class="small"><strong>Adept Nakuru</strong></small><br>
                                <small class="small">Gill House 4th Floor</small><br>
                                <small class="small">Afya House 2nd Floor</small>
                            </div>

                            <div class="col-md-3">
                                <small class="small"><strong>Adept Mombasa</strong></small><br>
                                <small class="small">Gill House 4th Floor</small><br>
                                <small class="small">Afya House 2nd Floor</small>
                            </div>

                            <div class="col-md-3">
                                <small class="small"><strong>Adept Kisumu</strong></small><br>
                                <small class="small">Gill House 4th Floor</small><br>
                                <small class="small">Afya House 2nd Floor</small>
                            </div>
                        </div>
                    </div>
                    <div class="content-for-small-width-screens">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <small class="small"><strong>Adept Nairobi</strong></small><br>
                                <small class="small">Gill House 4th Floor</small><br>
                                <small class="small">Afya House 2nd Floor</small>
                            </div>

                            <div class="col-6 mb-3">
                                <small class="small"><strong>Adept Nakuru</strong></small><br>
                                <small class="small">Gill House 4th Floor</small><br>
                                <small class="small">Afya House 2nd Floor</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <small class="small"><strong>Adept Mombasa</strong></small><br>
                                <small class="small">Gill House 4th Floor</small><br>
                                <small class="small">Afya House 2nd Floor</small>
                            </div>

                            <div class="col-6 mb-3">
                                <small class="small"><strong>Adept Kisumu</strong></small><br>
                                <small class="small">Gill House 4th Floor</small><br>
                                <small class="small">Afya House 2nd Floor</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 pb-5">
        <div class="container">
            <div class="card shadow">
                <div class="card-header">
                    <h1 class="text-center text-warning"><i class="fas fa-phone-square-alt"></i> Contact Us</h1>
                </div>
                <div class="card-body">
                    <div class="row mt-3 mb-5 content-for-large-width-screen">
                        <div class="col-md-4">
                            <h6 class="text-secondary text-center">
                                <i class="fas fa-globe"></i>
                                Social Media
                            </h6>
                            <ul class=" d-block list-unstyled text-center mt-3">
                                <li class="pb-4"><a href="javascript:void(0)"><i class="fab fa-facebook"></i> theeadeptdesigner</a></li>
                                <li class="pb-4"><a href="javascript:void(0)"><i class="fab fa-twitter"></i> @theeadeptdesigner</a></li>
                                <li class="pb-4"><a href="javascript:void(0)"><i class="fab fa-linkedin"></i> theeadeptdesigner</a></li>
                                <li class="pb-4"><a href="javascript:void(0)"><i class="fab fa-instagram"></i> #theeadeptdesigner</a></li>
                                <li class="pb-4"><a href="javascript:void(0)"><i class="fab fa-snapchat"></i> theeadeptdesigner</a></li>
                            </ul>
                        </div>


                        <div class="col-md-4 border-left">

                            <h6 class="text-secondary text-center">
                                <i class="fas fa-phone mt-1"></i>
                                Our contacts
                            </h6>

                            <div class="text-center mt-3">
                                <i class="fas fa-city"></i> Nairobi Office<br>
                                <a href="tel:0700521998">0700521998</a>
                            </div>

                            <div class="text-center mt-3">
                                <i class="fas fa-city"></i> Nakuru Office<br>
                                <a href="tel:0734880277">0734880277</a>
                            </div>

                            <div class="text-center mt-3 ">
                                <i class="fas fa-city"></i> Mombasa Office<br>
                                <a href="tel:0726416458">0726416458</a>
                            </div>

                            <div class="text-center mt-3 ">
                                <i class="fas fa-city"></i> Kisumu Office<br>
                                <a href="tel:0773114078"> 0773114078</a>
                            </div>

                        </div>

                        <div class="col-md-4 border-left">
                            <h6 class="text-secondary text-center mt-2">
                                <i class="fas fa-envelope mt-1"></i>
                                Email links
                            </h6>
                            <div class="text-center mt-3">
                                <i class="fas fa-city"></i> Nairobi Office<br>
                                <a href="mailto:calebmwambi@gmail.com">nairobi@adeptdesigners.co.ke</a>
                            </div>

                            <div class="text-center mt-3">
                                <i class="fas fa-city"></i> Nakuru Office<br>
                                <a href="mailto:calebmwambi@gmail.com">nakuru@adeptdesigners.co.ke</a>
                            </div>

                            <div class="text-center mt-3">
                                <i class="fas fa-city"></i> Nakuru Office<br>
                                <a href="mailto:calebmwambi@gmail.com">kisumu@adeptdesigners.co.ke</a>
                            </div>

                            <div class="text-center mt-3">
                                <i class="fas fa-city"></i> Mombasa Office<br>
                                <a href="mailto:calebmwambi@gmail.com">mombasa@adeptdesigners.co.ke</a>
                            </div>

                        </div>
                    </div>

                    <div class="content-for-small-width-screens">
                        <h6 class="text-secondary text-center">
                            <i class="fas fa-globe"></i>
                            Social Media
                        </h6>
                        <ul class=" d-block list-unstyled text-center mt-3">
                            <li class="pb-3"><a href="javascript:void(0)"><i class="fab fa-facebook"></i> theeadeptdesigner</a></li>
                            <div class="collapse" id="socialMediaInfo">
                                <li class="pb-3"><a href="javascript:void(0)"><i class="fab fa-twitter"></i> @theeadeptdesigner</a></li>
                                <li class="pb-3"><a href="javascript:void(0)"><i class="fab fa-linkedin"></i> theeadeptdesigner</a></li>
                                <li class="pb-3"><a href="javascript:void(0)"><i class="fab fa-instagram"></i> #theeadeptdesigner</a></li>
                                <li class="pb-3"><a href="javascript:void(0)"><i class="fab fa-snapchat"></i> theeadeptdesigner</a></li>
                            </div>
                        </ul>
                        <div class="d-flex justify-content-center mt-n3 mb-3">
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#socialMediaInfo" aria-controls="socialMediaInfo" aria-expanded="false">
                                <h6 class="text-warning">Click to show more </h6>
                            </a>
                        </div>
                    </div>
                    <div class="content-for-small-width-screens">
                        <h6 class="text-secondary text-center">
                            <i class="fas fa-phone mt-1"></i>
                            Our contacts
                        </h6>
                        <div class="text-center mt-3">
                            <i class="fas fa-city"></i> Nairobi Office<br>
                            <a href="tel:0700521998">0700521998</a>
                        </div>
                        <div class="collapse" id="contactInfo">
                            <div class="text-center mt-3">
                                <i class="fas fa-city"></i> Nakuru Office<br>
                                <a href="tel:0734880277">0734880277</a>
                            </div>

                            <div class="text-center mt-3 ">
                                <i class="fas fa-city"></i> Mombasa Office<br>
                                <a href="tel:0726416458">0726416458</a>
                            </div>

                            <div class="text-center mt-3 ">
                                <i class="fas fa-city"></i> Kisumu Office<br>
                                <a href="tel:0773114078"> 0773114078</a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-2 mb-3">
                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#contactInfo" aria-controls="socialMediaInfo" aria-expanded="false">
                                <h6 class="text-warning">Click to show more </h6>
                            </a>
                        </div>
                    </div>
                    <div class="content-for-small-width-screens">
                        <h6 class="text-secondary text-center mt-2">
                            <i class="fas fa-envelope mt-1"></i>
                            Email links
                        </h6>
                        <div class="text-center mt-3">
                            <i class="fas fa-city"></i> Nairobi Office<br>
                            <a href="mailto:calebmwambi@gmail.com">nairobi@adeptdesigners.co.ke</a>
                        </div>
                        <div class="collapse" id="emailLinksInfo">
                            <div class="text-center mt-3">
                                <i class="fas fa-city"></i> Nakuru Office<br>
                                <a href="mailto:calebmwambi@gmail.com">nakuru@adeptdesigners.co.ke</a>
                            </div>

                            <div class="text-center mt-3">
                                <i class="fas fa-city"></i> Nakuru Office<br>
                                <a href="mailto:calebmwambi@gmail.com">kisumu@adeptdesigners.co.ke</a>
                            </div>

                            <div class="text-center mt-3">
                                <i class="fas fa-city"></i> Mombasa Office<br>
                                <a href="mailto:calebmwambi@gmail.com">mombasa@adeptdesigners.co.ke</a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-2 mb-4">
                            <a class="text-warning" href="javascript:void(0)" data-target="#emailLinksInfo" data-toggle="collapse" aria-controls="emailLinksInfo" aria-expanded="false">Click to show more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 pb-5">
        <div class="container-fluid">
            <div class="row ml-lg-2">
                <div class="col-lg-6">
                    <div class="card shadow">
                        <div class="card-header">
                            <h1 class="text-center text-warning"><i class="fas fa-comment-alt"></i> Chat <span class="content-for-large-width-screen">with us</span></h1>
                        </div>
                        <div class="card-body bg-dark">
                            <div class="toast mb-4" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
                                <div class="toast-header">
                                    <img src="../tools/assets/icon.png" class="rounded icon-small mr-2" alt="...">
                                    <img src="../tools/assets/title.png" class="rounded title-small mr-auto" alt="...">
                                    <small>20 mins ago</small>
                                </div>
                                <div class="toast-body">
                                    Hello, what can we do for you ?
                                </div>
                            </div>

                            <div aria-live="polite" aria-atomic="true" class="toastReply">
                                <div class="toast toastReplyLeftAligned" data-autohide="false">
                                    <div class="toast-header">
                                        <img src="../tools/assets/icon.png" class="rounded icon-small mr-2" alt="...">
                                        <strong class="mr-auto">User</strong>
                                        <small>11 mins ago</small>
                                    </div>
                                    <div class="toast-body bg-light">
                                        My name is Peter and I wanted to ask about ERP processing
                                    </div>
                                </div>
                            </div>

                            <div class="toast mt-5" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
                                <div class="toast-header">
                                    <img src="../tools/assets/icon.png" class="rounded icon-small mr-2" alt="...">
                                    <img src="../tools/assets/title.png" class="rounded title-small mr-auto" alt="...">
                                    <small>0 mins ago</small>
                                </div>
                                <div class="toast-body">
                                    Brilliant Question you've asked there Peter ?
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-center">
                                <form method="POST" action="javascript:void(0)">
                                    <div class="form-group">
                                        <textarea name="privateMessage" class="form-control messageAreaResizeFalse" cols="50" rows="2" placeholder="Enter your message..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-warning w-100" name="sendMessage" type="submit">Send &raquo;</button>
                                    </div>
                                </form>
                            </div>
                            <div class="d-flex justify-content-center">
                                <h6> <a href="javasctipt:void(0)" class="text-warning" data-toggle="modal" data-target="#contactFormModal">Request contact form </a></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6" id="notification-tray">
                    <div class="ml-lg-3">
                        <div class="card shadow">
                            <div class="card-header">
                                <h1 class="text-center text-warning content-for-large-width-screen"><i class="fas fa-comments"></i> Leave a comment</h1>
                                <h1 class="text-center text-warning content-for-small-width-screens"><i class="fas fa-comments"></i> Comment</h1>
                            </div>
                            <div class="card-body bg-dark">
                                <div class="overflow-auto mb-5">
                                    <div class="toast mt-3" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
                                        <div class="toast-header">
                                            <img src="../tools/assets/icon.png" class="rounded icon-small mr-2" alt="...">
                                            <img src="../tools/assets/title.png" class="rounded title-small mr-auto" alt="...">
                                            <small>0 mins ago</small>
                                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="toast-body">
                                            Hello, what can we do for you ?
                                        </div>
                                    </div>

                                    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
                                        <div class="toast-header">
                                            <img src="../tools/assets/icon.png" class="rounded icon-small mr-2" alt="...">
                                            <img src="../tools/assets/title.png" class="rounded title-small mr-auto" alt="...">
                                            <small>0 mins ago</small>
                                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="toast-body">
                                            Hello, what can we do for you ?
                                        </div>
                                    </div>

                                    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
                                        <div class="toast-header">
                                            <img src="../tools/assets/icon.png" class="rounded icon-small mr-2" alt="...">
                                            <img src="../tools/assets/title.png" class="rounded title-small mr-auto" alt="...">
                                            <small>0 mins ago</small>
                                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="toast-body">
                                            Hello, what can we do for you ?
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-center">
                                    <form method="POST" action="javascript:void(0)">
                                        <div class="form-group">
                                            <textarea name="comment" class="form-control messageAreaResizeFalse" cols="50" rows="2" placeholder="Leave a comment..."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-warning w-100" name="comment" type="submit">Comment &raquo;</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "../Includes/Footer/homepages/footer.php"; ?>











    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->
    <script src="../tools/js/global/jquery.js"></script>
    <script src="../tools/js/global/bootstrap.min.js"></script>
    <script src="../tools/js/global/uniform.js"></script>
    <script src="../tools/js/validator/subscription.js"></script>
</body>

</html>