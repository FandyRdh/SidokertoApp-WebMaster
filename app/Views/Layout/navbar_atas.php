<nav class="topnav navbar navbar-light">
    <!-- Button Slide -->
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>

    <a class="navbar-brand mr-auto">
        <img class="icon-perusahaan" src="https://www.freepnglogos.com/uploads/tut-wuri-handayani-png-logo/vector-wuri-handayani-warna-0.png" alt="" width="40px">
        &nbsp;&nbsp;&nbsp;<b>SDN SIDOKERTO</b></a>

    <ul class="nav">

        <!-- Notifikasi -->
        <!-- <li class="nav-item nav-notif">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
                <span class="fe fe-bell fe-16"></span>
                <span class="dot dot-md bg-success"></span>
            </a>
        </li> -->

        <!-- Profile -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar avatar-sm">
                    <img src="/assets/images/profile_kry/<?= session()->get('FOTO_KRY'); ?>" alt="..." style="width: 35px; height: 35px;" class="avatar-img rounded-circle">
                    &nbsp;&nbsp;
                    <label for="">
                        <center><?= session()->get('NM_KRY'); ?><br>Admin</center>
                    </label>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="/adm/kry/detail/<?= session()->get('ID_KRY'); ?>">Profile</a>
                <a class="dropdown-item" href="/Login/Logout">Logout</a>
            </div>
        </li>
    </ul>
</nav>