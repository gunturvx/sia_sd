<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">

                <div class="sidebar-brand-text mx-3">SDN Cipari 02</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu Utama
            </div>

            <li class="nav-item">
                <a class="nav-link" href="?page=jadwal">
                    <i class="fas fa-clipboard-check"></i>
                    <span>Jadwal Mengajar</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#sidebarLayouts" data-toggle="collapse" data-target="#sidebarLayouts"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Presensi</span>
                </a>
                <div id="sidebarLayouts" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <ul class="nav nav-collapse">
									<?php


									foreach ($mengajar as $dm) { ?>
									<li>
										<a href="?page=absen&pelajaran=<?=$dm['id_mengajar'] ?> ">
											<span class="sub-item"><!-- <?=strtoupper($dm['mapel']); ?> -->KELAS (<?=strtoupper($dm['nama_kelas']); ?>)</span>
										</a>
									</li>
								<?php } ?>
								</ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#rekapAbsen" data-toggle="collapse" data-target="#rekapAbsen"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-tasks"></i>
                    <span>Rekap Absen</span>
                </a>
                <div id="rekapAbsen" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <ul class="nav nav-collapse">
									<?php


									foreach ($mengajar as $dm) { ?>
									<li>
										<a href="?page=rekap&pelajaran=<?=$dm['id_mengajar'] ?> ">
											<span class="sub-item"><!-- <?=strtoupper($dm['mapel']); ?> -->KELAS (<?=strtoupper($dm['nama_kelas']); ?>)</span>
										</a>
									</li>
								<?php } ?>
								</ul>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            
            <!-- Nav Item - Logout -->
            <li class="nav-item active">
                <a class="nav-link" href="logout.php"  class="collapsed">
                <i class="fas fa-arrow-alt-circle-left"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>