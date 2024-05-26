<?php 
$role = $_SESSION['user_role'];
$id   = $_SESSION['id_user'];
?>
<ul class="sidebar-menu" data-widget="tree">
        <li class="header">Dashboard Mahasiswa</li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-home"></i> <span>Home / Dashboard</span>
        </a>
         <ul class="treeview-menu">
                    <li class=""><a href="index.php" class="btn-loading"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                    <li class=""><a href="index.php?page=identitas_mhs" class="btn-loading"><i class="fa fa-user"></i> <span>Identitas</span></a></li>
                  </ul>
      </li>
      <li class="header">Menu Mahasiswa</li>
      <li class="active treeview">
                  <a href="#">
                     <i class="fa fa-list"></i> <span>Tugas Akhir / PA</span>
                     <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                     </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class=""><a href="index.php?page=list_mhs_dosen" class="btn-loading"><i class="fa fa-file"></i> <span>Daftar Dosen</span></a></li>
                    <li class=""><a href="index.php?page=identitas_ta" class="btn-loading"><i class="fa fa-file"></i> <span>Tugas Akhir/PA</span></a></li>
                    <li class=""><a href="index.php?page=request_approval_laporan" class="btn-loading"><i class="fa fa-file"></i> <span>Request Approval Laporan</span></a></li>
                    <li class=""><a href="index.php?page=request_pra_sidang" class="btn-loading"><i class="fa fa-file"></i> <span>Request Pra Sidang</span></a></li>
                    <li class=""><a href="index.php?page=daftar_sidang" class="btn-loading"><i class="fa fa-file"></i> <span>Daftar Sidang</span></a></li>
                    <li class=""><a href="index.php?page=logbook_bimbingan" class="btn-loading"><i class="fa fa-file"></i> <span>Logbook Bimbingan</span></a></li>
                    <li class=""><a href="index.php?page=berita_acara_sidang" class="btn-loading"><i class="fa fa-file"></i> <span>Berita Acara Sidang</span></a></li>
                    <li class=""><a href="index.php?page=berkas_final" class="btn-loading"><i class="fa fa-file"></i> <span>Berkas Final</span></a></li>
                  </ul>
               </li>
      </ul>