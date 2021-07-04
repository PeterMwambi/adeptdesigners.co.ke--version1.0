 <nav class="navbar navbar-expand-lg navbar-gradient sticky-top">
     <div class="d-flex justify-content-start">
         <img src="../../../tools/assets/icon.png" class="img-fluid company-icon" alt="">
         <img src="../../../tools/assets/title.png" class="img-fluid company-title title" alt="">
     </div>
     <div class="d-flex justify-content-end">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#secondaryNavbar" aria-controls="secondaryNavbar" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
     </div>
     <div class="collapse navbar-collapse" id="secondaryNavbar">
         <ul class="navbar-nav ml-auto">
             <li class="nav-item mr-5">
                 <a class="nav-link" href="../home/"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item mr-5">
                 <a class="nav-link" href="javascript:void(0)"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
             </li>
             <li class="nav-item dropdown mr-5">
                 <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <img src="../../../Tools/Assets/man.png" class="img-fluid icon-smaller"> <?php echo Session::getValue("username") ?>
                 </a>
                 <div class="dropdown-menu navbar-gradient">
                     <a class="dropdown-item" href="../update/">Update</a>
                     <a class="dropdown-item" href="../../server/logout.php">Log Out</a>
                     <a class="dropdown-item" href="javascript:void(0)">Delete my account</a>
                 </div>
             </li>
             <li class="nav-item mr-5">
                 <a class="nav-link" href="javascript:void(0)"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp;Settings</a>
             </li>
         </ul>
     </div>
 </nav>