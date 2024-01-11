<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo d-flex">
            <a href="javascript:void(0)" class="simple-text logo-mini">
                <img class="img-fluid rounded-circle avatar" src="/assets/img/profile.jpg" alt="" srcset="">
            </a>
            <a href="javascript:void(0)" class="simple-text logo-normal">
                Copyscibers Client </a>
        </div>
        <ul class="nav">
            <li class="nav-item {{ (Route::currentRouteName() === 'index') ? 'active' : '' }}">
                <a class="nav-link" href="/">
                    <i class="fas fa-heartbeat fa-fw"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item dropdown {{ (Route::currentRouteName() === 'project.index') ? 'active' : '' }}">
                <a class="nav-link" href="/project" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-folder-closed" aria-hidden="true"></i>
                    <p>Projects</p>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('project.index')}}">Create Project</a></li>
                    <li><a class="dropdown-item" href="{{route('task.pending')}}">Pending Tasks</a></li>
                    <li><a class="dropdown-item" href="{{route('task.index')}}">Ongoing Tasks</a></li>
                    <li><a class="dropdown-item" href="{{route('task.complete')}}">Complete Tasks</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ (Route::currentRouteName() === 'pmanager.index') ? 'active' : '' }}">
                <a class="nav-link" href="/pmanager" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-users-gear" aria-hidden="true"></i>
                    <p>Recruits</p>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Onboarding Form</a></li>
                    <li><a class="dropdown-item" href="#">NDA Agreements</a></li>
                    <li><a class="dropdown-item" href="{{route('recruit.index')}}">Manage Recruits</a></li>
                </ul>
            </li>
            <li class="nav-item {{ (Route::currentRouteName() === 'invoice.index') ? 'active' : '' }}">
                <a class="nav-link" href="/invoice">
                    <i class="fa-solid fa-comments-dollar"></i>
                    <p>Invoices</p>
                </a>
            </li>
            <li class="nav-item dropdown {{ (Route::currentRouteName() === 'pmanager.index') ? 'active' : '' }}">
                <a class="nav-link" href="/pmanager" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-users-gear" aria-hidden="true"></i>
                    <p>SEO Tools</p>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Plagiarism Checker</a></li>
                    <li><a class="dropdown-item" href="#">AI Copy Checker</a></li>
                    <li><a class="dropdown-item" href="#">Titlecase Converter</a></li>
                    <li><a class="dropdown-item" href="#">Grammar Checker</a></li>
                </ul>
            </li>
            <li class="nav-item {{ (Route::currentRouteName() === 'message.index') ? 'active' : '' }}">
                <a class="nav-link" href="/message">
                    <i class="fa-solid fa-comments-dollar"></i>
                    <p>Messages</p>
                </a>
            </li>
            <li class="nav-item {{ (Route::currentRouteName() === 'task.show') ? 'active' : '' }}">
                <a class="nav-link" href="/task/completed">
                    <i class="fa-solid fa-shop-lock"></i>
                    <p>Completed</p>
                </a>
            </li>
        </ul>
    </div>
</div>