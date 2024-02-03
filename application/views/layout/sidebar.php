<ul style="background-color:#181818" class="navbar-nav  sidebar sidebar-dark toggled" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('Dashboard') ?>">
    <div class="sidebar-brand-icon ">
       <!-- <img width="45px;" src="<?php echo base_url('assets/img/beacukai.png') ?>" alt=""> -->
    </div>
    <div class="sidebar-brand-text mx-3">Admin</div>
</a>
<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<!-- <div class="sidebar-heading">
    Interface
</div> -->
<!-- Nav Item - Tables -->
<!-- <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('Companies') ?>">
    <i class="fas fa-industry"></i>
        <span>Perusahaan</span></a>
</li> -->
<!-- <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('users') ?>">
    <i class="fas fa-users"></i>
        <span>Daftar Akun</span></a>
</li> -->

<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('profil') ?>">
    <i class="fas fa-user"></i>
        <span>Profil Akun</span></a>
</li>

<li class="nav-item">
                <a class="nav-link " href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Setting</span>
                </a>
                <div id="collapsePages" class="collapse " aria-labelledby="headingPages" data-parent="#accordionSidebar" style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pengaturan:</h6>
                        <a class="collapse-item" href="<?php echo base_url('roles') ?>">Hak Akses</a>
                        <a class="collapse-item" href="<?php echo base_url('role_page') ?>">Page Roles</a>
                    </div>
                </div>
            </li>
<!-- Nav Item - Utilities Collapse Menu -->


<!-- Divider -->
<hr class="sidebar-divider">



<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->