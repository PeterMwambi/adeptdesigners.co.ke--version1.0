<!-- Navigation -->
<nav class="navbar navbar-expand-lg d-block bg-light sticky-top bg-light navbar-light mainnav shadow-sm d-none p-2">

    <div class="d-flex justify-content-end">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#secondaryNavbar" aria-controls="secondaryNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="secondaryNavbar">
        <div class="justify-content-start">
            <img class="img-fluid icon-small navbar-icon content-for-small-width-screens" alt="">
            <img class="img-fluid title navbar-title ml-3" alt="">
        </div>
        <ul class="navbar-nav navbar-secondary ml-auto">
            <li class="nav-item home">
                <a class="nav-link"></a>
            </li>
            <li class="nav-item about">
                <a class="nav-link"></a>
            </li>
            <li class="nav-item contact">
                <a class="nav-link"></a>
            </li>
            <li class="nav-item notifications">
                <a class="nav-link"></a>
            </li>
            <li class="nav-item products">
                <div class="d-flex">
                    <a class="nav-link"></a>
                    <span class="badge bg-warning text-dark d-none rounded-pill shadow-lg position-absolute ml-lg-4 mt-lg-1"><?php echo Session::exists("total_items") ? Session::getValue("total_items") : 0 ?></span>
                </div>
            </li>
            <li class="nav-item dropdown accounts">
                <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                <div class="dropdown-menu shadow-lg">
                    <a class="dropdown-item"></a>
                    <a class="dropdown-item"></a>
                </div>
            </li>
        </ul>
    </div>
</nav>