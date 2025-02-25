<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <div style="padding-top:30px;padding-bottom:30px;">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('secured.dashboard') }}">
            <div class="d-flex flex-column" >
                <div class="sidebar-brand-icon" >
                    <img src="https://cdn-icons-png.flaticon.com/512/10856/10856864.png" style="width:70px;">
                </div>
                <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
    
            </div>
        </a>
    </div>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('secured.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Screens:</h6>
                <a class="collapse-item" href="{{ route('secured.basic.info.get') }}">Basic Information</a>
                <a class="collapse-item" href="{{ route('secured.skill.get') }}">Skills</a>
                <a class="collapse-item" href="{{ route('secured.attachment.get') }}">Attachments</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="{{ route('secured.mails') }}">Recieved Mails</a>
            </div>
        </div>
    </li>

   

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    

</ul>
<!-- End of Sidebar -->