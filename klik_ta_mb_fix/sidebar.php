<?php 
session_start();
$role = $_SESSION['user_role'];
$id   = $_SESSION['id_user'];

?>
<ul class="sidebar-menu" data-widget="tree">
        <li class="header">Dashboard Dosen</li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-home"></i> <span>Home / Dashboard</span>
        </a>
         <ul class="treeview-menu">
                    <li class=""><a href="index.php" class="btn-loading"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                    <li class=""><a href="index.php?page=identitas" class="btn-loading"><i class="fa fa-user"></i> <span>Identitas</span></a></li>
                    <li class=""><a href="index.php?page=identitas" class="btn-loading"><i class="fa fa-user"></i> <span>Kompetensi Dosen</span></a></li>
                  </ul>
      </li>
      <li class="header">Menu Dosen</li>
      <li class="active treeview">
                  <a href="#">
                     <i class="fa fa-list"></i> <span>Tugas Akhir / PA</span>
                     <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                     </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class=""><a href="index.php?page=list_dosen_mhs" class="btn-loading"><i class="fa fa-file"></i> <span>Mahasiswa Bimbingan</span></a></li>
                    <li class=""><a href="index.php?page=nilai_bimbingan" class="btn-loading"><i class="fa fa-file"></i> <span>Nilai Mahasiswa Bimbingan</span></a></li>
                    <li class=""><a href="index.php?page=approval_laporan" class="btn-loading"><i class="fa fa-file"></i> <span>Approval Laporan TA</span></a></li>
                    <li class=""><a href="index.php?page=approval_perbaikan_pembimbing" style="white-space: normal" class="btn-loading"><i class="fa fa-file"></i> <span>Approval Perbaikan Sidang Pembimbing</span></a></li>
                    <li class=""><a href="index.php?page=approval_perbaikan" style="white-space: normal" class="btn-loading"><i class="fa fa-file"></i> <span>Approval Perbaikan Sidang Penguji</span></a></li>
                    <li class=""><a href="index.php?page=list_penilaian_sidang" class="btn-loading"><i class="fa fa-file"></i> <span>Jadwal Sidang</span></a></li>
                  </ul>
               </li>
      </ul>