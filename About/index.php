<?php
define("PATHNAME", true);
require "../Models/Config/core.php";
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
    <link rel="stylesheet" href="../tools/css/global/bootstrap.min.css">
    <link rel="stylesheet" href="../tools/FontAwesome/css/all.css">
    <link rel="stylesheet" href="../tools/css/global/uniform.css">
    <link rel="stylesheet" href="../tools/css/global/animate.css">
    <link rel="stylesheet" href="../tools/css/page/about.css">
    <link rel="stylesheet" href="../tools/css/global/responsive.css">
    <title>About Us</title>
</head>

<body>
    <!-- Secondary navigation bar-->
    <!-- @Content header URL links  -->
    <?php include "../Includes/header/secondary-navbar.php"; ?>
    <!-- End secondary navigation bar content -->

    <!-- Begin home content -->
    <!-- @content short product, about, contacts content description -->
    <section class="visible">

        <div class="overlay-background p-lg-5">
            <div class="d-flex">
                <div class="col-md-6">
                    <img class="img-fluid rounded img-lg ml-lg-5" src="../tools/assets/proffesional.jpg">
                </div>
                <div class="d-flex justify-content-end col-md-6">
                    <div class="text-body d-block mr-lg-5 mt-lg-3">
                        <h1 class="text-warning text-center text-nowrap">A hello Message from the CEO</h1>
                        <p class="text-justify text-center text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Pharetra magna ac placerat
                            vestibulum lectus mauris ultrices eros in. Enim ut tellus elementum sagittis vitae et.
                            Vel pretium lectus quam id leo in. Malesuada fames ac turpis egestas.
                            Id ornare arcu odio ut sem nulla. Ut etiam sit amet nisl purus. Elit sed
                            vulputate mi sit. Commodo viverra
                            maecenas accumsan lacus vel. Sollicitudin tempor id eu nisl.</p>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-gradient btn-group-sm border-0 shadow" href="javascript:void(0)">Download our magazine</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Who we are -->
    <section class="mt-lg-5">
        <div class="container">
            <div class="col-12 mt-lg-5">
                <div class="card mt-5 shadow">
                    <div class="card-header">
                        <h1 class="text-center text-warning">Who are we ?</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-fluid icon-large" src="../tools/assets/icon.png">
                            </div>
                            <div class="col-md-8">
                                <p class="text-justify mt-lg-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Massa tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada.
                                    Ante metus dictum at tempor commodo ullamcorper. Ipsum faucibus vitae aliquet nec.
                                    Malesuada fames ac turpis egestas maecenas pharetra. Euismod nisi porta lorem mollis.
                                    Volutpat commodo sed egestas egestas fringilla. Duis at consectetur lorem donec massa sapien.
                                    Nibh ipsum consequat nisl vel pretium lectus quam id leo. Et ultrices neque ornare aenean
                                    euismod elementum nisi. Urna condimentum mattis pellentesque id. Consequat id porta nibh
                                    venenatis cras.
                                    A cras semper auctor neque. Et ligula ullamcorper malesuada proin
                                    libero nunc consequat. Aliquam id diam maecenas ultricies mi.

                                    Tempor orci dapibus ultrices in iaculis nunc sed. Lectus arcu bibendum at varius vel pharetra vel.
                                    Cursus mattis molestie a iaculis at erat pellentesque adipiscing. Urna nec tincidunt praesent
                                    semper feugiat. Mattis pellentesque id nibh tortor id. Id venenatis a condimentum vitae sapien
                                    pellentesque habitant morbi. Nibh tortor id aliquet lectus proin nibh nisl. Cursus turpis
                                    massa tincidunt dui. Sit amet dictum sit amet justo donec enim diam vulputate. Dolor sit amet
                                    consectetur adipiscing. Dis parturient montes nascetur ridiculus mus mauris vitae ultricies leo.
                                    Etiam sit amet nisl purus in mollis nunc. Volutpat diam ut venenatis tellus in. Eu augue ut lectus
                                    arcu bibendum. Porta lorem mollis aliquam ut porttitor leo a diam sollicitudin.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Members -->
    <section>
        <div class="container-fluid pt-lg-5 mt-lg-5">
            <div class="col-12 p-3 overlay-background">
                <div class="d-flex justify-content-center mt-5 mb-2">
                    <h2 class="text-warning ml-lg-4">Meet the team</h2>
                </div>
                <div class="row justify-content-center mt-3 mb-5 ml-lg-5 mr-lg-2">
                    <div class="col-md-3 mr-lg-5 ml-lg-5 executive-deputy-ceo border-0">
                        <div class="card bg-transparent rounded border-0">
                            <div class="card-body p-0">
                                <img src="../tools/assets/proffesional.jpg" class="img-fluid rounded w-100 border-0 d-block executive-image-deputy-ceo">
                            </div>
                            <div class="card-footer rounded position-absolute border-0 pb-3 footer-title executive-name-section-deputy-ceo">
                                <div class="d-flex justify-content-center">
                                    <span class="lead text-light"> Peter Mwambi </span>
                                </div>
                            </div>


                            <div class="d-flex justify-content-center mt-2 border-0">
                                <span class="lead executive-title-deputy-ceo">
                                    <em> Deputy Chief Executive Officer</em>
                                </span>
                            </div>
                            <div class="position-absolute leader-banner additional-info-deputy-ceo p-3 d-none animate__animated animate__fadeIn">
                                <div class="d-flex justify-content-center mt-3">
                                    <img src="../tools/assets/title.png" class="title-md">
                                </div>
                                <div class="d-flex justify-content-center mt-1 mb-1">
                                    <img src="../tools/assets/proffesional.jpg" class="img-fluid rounded executive-image-sm w-100 border-0">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                </div>
                                <div class="d-flex justify-content-center mb-2">
                                    <a class="btn btn-overlay shadow" href="javascript:"> View bio info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mr-lg-5 ml-lg-5 executive-ceo border-0">
                        <div class="card bg-transparent rounded border-0">
                            <div class="card-body p-0">
                                <img src="../tools/assets/proffesional.jpg" class="img-fluid rounded w-100 border-0 d-block executive-image-ceo">
                            </div>
                            <div class="card-footer rounded position-absolute border-0 pb-3 footer-title executive-name-section-ceo">
                                <div class="d-flex justify-content-center">
                                    <span class="lead text-light"> Peter Mwambi </span>
                                </div>
                            </div>


                            <div class="d-flex justify-content-center mt-2 border-0">
                                <span class="lead executive-title-ceo">
                                    <em> Chief Executive Officer</em>
                                </span>
                            </div>
                            <div class="position-absolute leader-banner additional-info-ceo p-3 d-none animate__animated animate__fadeIn">
                                <div class="d-flex justify-content-center mt-3">
                                    <img src="../tools/assets/title.png" class="title-md">
                                </div>
                                <div class="d-flex justify-content-center mt-1 mb-1">
                                    <img src="../tools/assets/proffesional.jpg" class="img-fluid rounded executive-image-sm w-100 border-0">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                </div>
                                <div class="d-flex justify-content-center mb-2">
                                    <a class="btn btn-overlay shadow" href="javascript:"> View bio info</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mr-lg-5 ml-lg-5 executive-md border-0">
                        <div class="card bg-transparent rounded border-0">
                            <div class="card-body p-0">
                                <img src="../tools/assets/proffesional.jpg" class="img-fluid rounded w-100 border-0 d-block executive-image-md">
                            </div>
                            <div class="card-footer rounded position-absolute border-0 pb-3 footer-title executive-name-section-md">
                                <div class="d-flex justify-content-center">
                                    <span class="lead text-light"> Peter Mwambi </span>
                                </div>
                            </div>


                            <div class="d-flex justify-content-center mt-2 border-0">
                                <span class="lead executive-title-md">
                                    <em> Marketing Director</em>
                                </span>
                            </div>
                            <div class="position-absolute leader-banner additional-info-md p-3 d-none animate__animated animate__fadeIn">
                                <div class="d-flex justify-content-center mt-3">
                                    <img src="../tools/assets/title.png" class="title-md">
                                </div>
                                <div class="d-flex justify-content-center mt-1 mb-1">
                                    <img src="../tools/assets/proffesional.jpg" class="img-fluid rounded executive-image-sm w-100 border-0">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                </div>
                                <div class="d-flex justify-content-center mb-2">
                                    <a class="btn btn-overlay shadow" href="javascript:"> View bio info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What we do -->
    <section class="mt-lg-5">
        <div class="container-fluid">
            <div class="col-12 mt-lg-5">
                <div class="card mt-5 shadow">
                    <div class="card-header">
                        <h1 class="text-center text-warning">What we do</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-fluid icon-large" src="../tools/assets/icon.png">
                            </div>
                            <div class="col-md-8">
                                <p class="text-justify mt-lg-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Massa tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada.
                                    Ante metus dictum at tempor commodo ullamcorper. Ipsum faucibus vitae aliquet nec.
                                    Malesuada fames ac turpis egestas maecenas pharetra. Euismod nisi porta lorem mollis.
                                    Volutpat commodo sed egestas egestas fringilla. Duis at consectetur lorem donec massa sapien.
                                    Nibh ipsum consequat nisl vel pretium lectus quam id leo. Et ultrices neque ornare aenean
                                    euismod elementum nisi. Urna condimentum mattis pellentesque id. Consequat id porta nibh
                                    venenatis cras.
                                    A cras semper auctor neque. Et ligula ullamcorper malesuada proin
                                    libero nunc consequat. Aliquam id diam maecenas ultricies mi.

                                    Tempor orci dapibus ultrices in iaculis nunc sed. Lectus arcu bibendum at varius vel pharetra vel.
                                    Cursus mattis molestie a iaculis at erat pellentesque adipiscing. Urna nec tincidunt praesent
                                    semper feugiat. Mattis pellentesque id nibh tortor id. Id venenatis a condimentum vitae sapien
                                    pellentesque habitant morbi. Nibh tortor id aliquet lectus proin nibh nisl. Cursus turpis
                                    massa tincidunt dui. Sit amet dictum sit amet justo donec enim diam vulputate. Dolor sit amet
                                    consectetur adipiscing. Dis parturient montes nascetur ridiculus mus mauris vitae ultricies leo.
                                    Etiam sit amet nisl purus in mollis nunc. Volutpat diam ut venenatis tellus in. Eu augue ut lectus
                                    arcu bibendum. Porta lorem mollis aliquam ut porttitor leo a diam sollicitudin.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid mt-5 pt-lg-3">
            <div class="card mt-lg-5 shadow">
                <div class="card-header">
                    <h1 class="text-lead text-warning text-center">Terms and Conditions</h1>
                </div>
                <div class="card-body">
                    <div class="row p-3">
                        <div class="col-md-4 mt-5">
                            <img class="img-fluid icon-large mt-5" src="../tools/assets/icon.png">
                        </div>
                        <div class="col-md-8">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="products-tab" data-toggle="pill" href="#products" role="tab" aria-controls="products" aria-selected="true">Products</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="services-tab" data-toggle="pill" href="#services" role="tab" aria-controls="services" aria-selected="false">Services</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="patnership-tab" data-toggle="pill" href="#patnership" role="tab" aria-controls="patnership" aria-selected="false">Partnership</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="products" role="tabpanel" aria-labelledby="products-tab">
                                    <ol>
                                        <li> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio.
                                            Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.
                                            Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</li>
                                        <li> Donec nec justo eget felis facilisis fermentum. Aliquam
                                            porttitor mauris sit amet orci.
                                            Aenean dignissim pellentesque felis.</li>
                                        <li> Morbi in sem quis dui placerat ornare. Pellentesque odio nisi,
                                            euismod in, pharetra a,
                                            ultricies in, diam. Sed arcu. Cras consequat.</li>
                                        <li> Praesent dapibus, neque id cursus faucibus, tortor neque
                                            egestas auguae, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi,
                                            tincidunt quis, accumsan porttitor,
                                            facilisis luctus, metus.</li>
                                        <li> Phasellus ultrices nulla quis nibh. Quisque a lectus.
                                            Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam,
                                            gravida non, commodo a, sodales sit amet, nisi.</li>
                                        <li> Phasellus ultrices nulla quis nibh. Quisque a lectus.
                                            Donec consectetuer ligula vulputate sem tristique cursus.
                                            Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</li>
                                        <li> Donec nec justo eget felis facilisis fermentum. Aliquam
                                            porttitor mauris sit amet orci.
                                            Aenean dignissim pellentesque felis.</li>
                                        <li> Praesent dapibus, neque id cursus faucibus, tortor neque
                                            egestas auguae, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi,
                                            tincidunt quis, accumsan porttitor,
                                            facilisis luctus, metus.</li>
                                        <li> Integer vitae libero ac risus egestas placerat.</li>
                                        <li> Donec nec justo eget felis facilisis fermentum. Aliquam
                                            porttitor mauris sit amet orci.
                                            Aenean dignissim pellentesque felis.</li>
                                    </ol>
                                </div>
                                <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
                                    <ol>
                                        <li> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio.
                                            Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.
                                            Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</li>
                                        <li> Donec nec justo eget felis facilisis fermentum. Aliquam
                                            porttitor mauris sit amet orci.
                                            Aenean dignissim pellentesque felis.</li>
                                        <li> Morbi in sem quis dui placerat ornare. Pellentesque odio nisi,
                                            euismod in, pharetra a,
                                            ultricies in, diam. Sed arcu. Cras consequat.</li>
                                        <li> Praesent dapibus, neque id cursus faucibus, tortor neque
                                            egestas auguae, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi,
                                            tincidunt quis, accumsan porttitor,
                                            facilisis luctus, metus.</li>
                                        <li> Phasellus ultrices nulla quis nibh. Quisque a lectus.
                                            Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam,
                                            gravida non, commodo a, sodales sit amet, nisi.</li>
                                        <li> Phasellus ultrices nulla quis nibh. Quisque a lectus.
                                            Donec consectetuer ligula vulputate sem tristique cursus.
                                            Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</li>
                                        <li> Donec nec justo eget felis facilisis fermentum. Aliquam
                                            porttitor mauris sit amet orci.
                                            Aenean dignissim pellentesque felis.</li>
                                        <li> Praesent dapibus, neque id cursus faucibus, tortor neque
                                            egestas auguae, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi,
                                            tincidunt quis, accumsan porttitor,
                                            facilisis luctus, metus.</li>
                                        <li> Integer vitae libero ac risus egestas placerat.</li>
                                        <li> Donec nec justo eget felis facilisis fermentum. Aliquam
                                            porttitor mauris sit amet orci.
                                            Aenean dignissim pellentesque felis.</li>
                                    </ol>
                                </div>
                                <div class="tab-pane fade" id="patnership" role="tabpanel" aria-labelledby="patnership-tab">
                                    <ol>
                                        <li> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio.
                                            Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.
                                            Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</li>
                                        <li> Donec nec justo eget felis facilisis fermentum. Aliquam
                                            porttitor mauris sit amet orci.
                                            Aenean dignissim pellentesque felis.</li>
                                        <li> Morbi in sem quis dui placerat ornare. Pellentesque odio nisi,
                                            euismod in, pharetra a,
                                            ultricies in, diam. Sed arcu. Cras consequat.</li>
                                        <li> Praesent dapibus, neque id cursus faucibus, tortor neque
                                            egestas auguae, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi,
                                            tincidunt quis, accumsan porttitor,
                                            facilisis luctus, metus.</li>
                                        <li> Phasellus ultrices nulla quis nibh. Quisque a lectus.
                                            Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam,
                                            gravida non, commodo a, sodales sit amet, nisi.</li>
                                        <li> Phasellus ultrices nulla quis nibh. Quisque a lectus.
                                            Donec consectetuer ligula vulputate sem tristique cursus.
                                            Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</li>
                                        <li> Donec nec justo eget felis facilisis fermentum. Aliquam
                                            porttitor mauris sit amet orci.
                                            Aenean dignissim pellentesque felis.</li>
                                        <li> Praesent dapibus, neque id cursus faucibus, tortor neque
                                            egestas auguae, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi,
                                            tincidunt quis, accumsan porttitor,
                                            facilisis luctus, metus.</li>
                                        <li> Integer vitae libero ac risus egestas placerat.</li>
                                        <li> Donec nec justo eget felis facilisis fermentum. Aliquam
                                            porttitor mauris sit amet orci.
                                            Aenean dignissim pellentesque felis.</li>
                                    </ol>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-5 pt-lg-4">
        <div class="d-flex justify-content-center">
            <h2 class="text-lead text-warning">Partners</h2>
        </div>
        <div class="container mt-5">
            <div class="row ml-lg-5">
                <div class="col-lg-4">
                    <a href="javascript:void(0)" class="no-outline">
                        <img src="../tools/assets/Equity Holdings logo-01.png" class="icon-medium  partner" />
                        <!-- <img src="https://equitybank.taleo.net/careersection/theme/61/1506509782527/en/theme/images/Equity%20Holdings%20logo-01.png" class="icon-medium  partner" />  -->
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="javascript:void(0)" class="no-outline">
                        <img src="../tools/assets/mpesa-logo-AE44B6F8EB-seeklogo.com.png" class="icon-medium ml-lg-4 mr-lg-5 partner" />
                        <!-- <img src="https://seeklogo.com/images/M/mpesa-logo-AE44B6F8EB-seeklogo.com.png" class="icon-medium ml-lg-4 mr-lg-5 partner" /> -->
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="javascript:void(0)" class="no-outline">
                        <img src="../tools/assets/KCB_Kenya.jpg" class="icon-medium ml-lg-5  partner" />
                        <!-- <img src="https://marcopolis.net/images/stories/kenya-report/2016/companies/Top_10_Companies/KCB_Kenya.jpg" class="icon-medium ml-lg-5  partner" /> -->
                    </a>
                </div>
            </div>
        </div>
    </section>
    <?php include "../Includes/Footer/homepages/footer.php"; ?>










    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->
    <!-- <script src="https://use.fontawesome.com/288e6a8201.js"></script> -->

    <script src="../tools/js/global/jquery.js"></script>
    <script src="../tools/js/global/bootstrap.min.js"></script>
    <script src="../tools/js/global/uniform.js"></script>
    <script src="../tools/js/validator/subscription.js"></script>
</body>

</html>