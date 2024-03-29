<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            
    <!-- Sidebar Logo -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-text mx-3">SDN Cipari 02</div>
    </a>

    <!-- Garis Pembagi -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
            <i class="fas fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Garis Pembagi -->
    <hr class="sidebar-divider">

    <!-- Judul Menu -->
    <div class="sidebar-heading">Menu Utama</div>

    <!-- Nav Item - Data Umum -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#base" data-toggle="collapse" data-target="#dataumum"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Umum</span>
        </a>
        <div id="dataumum" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="?page=master&act=kelas">Data Kelas</a>
                <a class="collapse-item" href="?page=master&act=semester">Data Semester</a>
                <a class="collapse-item" href="?page=master&act=ta">Data Tahun Ajaran</a>
                <a class="collapse-item" href="?page=master&act=mapel">Data Mata Pelajaran</a>
                <a class="collapse-item" href="?page=walas">Data Wali Kelas</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Jadwal Mengajar -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#sidebarLayouts" data-toggle="collapse" data-target="#sidebarLayouts"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-book"></i>
            <span>Jadwal Mengajar</span>
        </a>
        <div id="sidebarLayouts" class="collapse" aria-labelledby="headingTwo" data-parent="#sidebarLayouts">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="?page=jadwal&act=add">Tambah Jadwal</a>
                <a class="collapse-item" href="?page=jadwal">Daftar Mengajar</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Data Guru -->
    <l i class="nav-item">
        <a class="nav-link collapsed" href="#guru" data-toggle="collapse" data-target="#dataguru"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Data Guru</span>
        </a>
        <div id="dataguru" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="?page=guru&act=add">Tambah Guru</a>
                <a class="collapse-item" href="?page=guru">Daftar Guru</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Data Siswa -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#siswa" data-toggle="collapse" data-target="#datasiswa"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-user"></i>
            <span>Data Siswa</span>
        </a>
        <div id="datasiswa" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="?page=siswa&act=add">Tambah Siswa</a>
                <a class="collapse-item" href="?page=siswa">Daftar Siswa</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pengumuman -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#pengumuman" data-toggle="collapse" data-target="#datapengumuman"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-bullhorn"></i>
            <span>Pengumuman</span>
        </a>
        <div id="datapengumuman" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="?page=pengumuman&act=add">Tambah Pengumuman</a>
                <a class="collapse-item" href="?page=pengumuman">Daftar Pengumuman</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Rekap Absen -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#rekapAbsen" data-toggle="collapse" data-target="#rekapAbsen"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-tasks"></i>
            <span>Rekap Absen</span>
        </a>
        <div id="rekapAbsen" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php 
                $kelas = mysqli_query($con,"SELECT * FROM tb_mkelas ORDER BY id_mkelas ASC");
                foreach ($kelas as $k) 
                {?>
                <a class="collapse-item" href="?page=rekap&kelas=<?=$k['id_mkelas'] ?>"><span class="sub-item">KELAS <?=strtoupper($k['nama_kelas']); ?></span></a>
                <?php } ?>
            </div>
        </div>
    </li>

        <!-- Nav Item - Laporan -->
    <li class="nav-item">
       <a class="nav-link" href="?page=nilai">
       <i class="fas fa-book-open"></i>
       <span>Nilai</span></a>
    </li>
    
    <!-- Nav Item - Laporan -->
    <li class="nav-item">
       <a class="nav-link" href="?page=laporan">
       <i class="fas fa-book-open"></i>
       <span>Laporan</span></a>
    </li>

    <!-- <li class="nav-item">
        <a class="nav-link" href="?page=presensi">
          <i class="fas fa-fw fa-user-check"></i>
          <span>Absensi</span></a>
      </li> -->

   <!-- Garis Pemisah -->
   <hr class="sidebar-divider my-0">
   
   <!-- Nav Item - Logout -->
   <li class="nav-item active">
       <a class="nav-link" href="logout.php"  class="collapsed">
       <i class="fas fa-arrow-alt-circle-left"></i>
        <span>Logout</span></a>
   </li>

   <!-- Garis Pemisah -->
   <hr class="sidebar-divider d-none d-md-block">
</ul>