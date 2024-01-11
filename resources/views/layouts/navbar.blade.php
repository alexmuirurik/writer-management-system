<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent w-100">
    <div class="container-fluid">
        <div class="navbar-wrapper me-auto">
            <div class="navbar-minimize d-inline" style="font-size: 25px">
                <a href="#" title="Sidebar Mini" class="minimize-sidebar p-0 sidebar-badge" onclick="sidebarmini()">
                    <i class="fa-solid fa-person-walking-dashed-line-arrow-right visible-on-sidebar-regular d-none"></i>
                    <i class="fa-solid fa-person-walking-dashed-line-arrow-right fa-flip-horizontal visible-on-sidebar-mini"></i>
                </a>
            </div>
            <a class="navbar-brand ml-0" href="javascript:void(0)">
                <div class="navbar-toggle d-inline">
                    <button type="button" class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
                <img class="ml-2" src="/assets/img/ddsd.png">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="navbar-collapse collapse" id="navigation" style="">
            <ul class="navbar-nav ms-auto">
                <li class="dropdown nav-item">
                    <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown"
                        aria-expanded="false">

                        <i class="fa fa-bell"></i>
                        <p class="d-lg-none text-gray-700 text-capitalize">
                            Notifications
                        </p>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-navbar p-0 pl-2 pr-2 alertlist"
                        style="width:100px;">
                        <style>
                        ul.dropdown-menu.dropdown-menu-right.dropdown-navbar.p-0 li.nav-link {
                            margin-top: 5px;
                            margin-bottom: 5px;
                            border-bottom: 0.5px solid #ccc;
                        }
                        </style>
                    </ul>
                </li>
                <li class="dropdown light-badge nav-item d-none">
                    <a href="javascript:lightmode()" class="dropdown-toggle nav-link">
                        <i class="fa-solid fa-star-and-crescent"></i>
                        <p class="d-lg-none text-gray-700 text-capitalize">
                            Dark Mode
                        </p>
                    </a>
                </li>
                <li class="dropdown dark-badge nav-item">
                    <a href="javascript:darkmode()" class="dropdown-toggle nav-link">
                        <i class="fa fa-sun"></i>
                        <p class="d-lg-none text-gray-700 text-capitalize">
                            Light Mode
                        </p>
                    </a>
                </li>
                <li class="dropdown nav-item">
                    <a href="javascript:void(0)" class="dropdown-toggle nav-link">
                        <i class="fa fa-comment"></i>
                        <p class="d-lg-none text-gray-700 text-capitalize">
                            Light Mode
                        </p>
                    </a>
                </li>
                <li class="dropdown nav-item">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-tie"></i>
                        <p class="d-lg-none text-gray-700 text-capitalize">
                            View User
                        </p>
                    </a>
                    <!-- Dropdown - User Information -->
                    <ul class="dropdown-menu p-0 dropdown-menu-right dropdown-navbar" aria-labelledby="userDropdown"
                        style="min-width: 0px">
                        <a class="dropdown-item" href="/user/copyscibersclient">
                            <i class="fas fa-user-doctor fa-sm fa-fw mr-2 text-gray-400"></i>
                            <span class="mr-2 d-lg-inline text-gray-700 small">
                                Client Copyscibers </span>
                        </a>
                        <a class="dropdown-item" href="/message">
                            <i class="fas fa-comment fa-sm fa-fw mr-2 text-gray-400 small"></i>
                            <small class="small">Contact Admin</small>
                        </a>
                        <a class="dropdown-item" href="/billing">
                            <i class="fa-solid fa-file-invoice-dollar fa-sm fa-fw mr-2 text-gray-400 small"></i>
                            <small class="small">Manage billing</small>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400 small"></i>
                            <small class="small">Logout</small>
                        </a>
                    </ul>
                </li>
                <li class="separator d-lg-none"></li>
            </ul>
        </div>
    </div>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Leaving Already?</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body d-flex">
                    <p>Select "Logout" if you are ready to end your current session.</p>
                    <a class="btn form-control flex-right col-md-3" style="color: black" href="/logout"><i
                            class="fa fa-sign-out"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>

</nav>