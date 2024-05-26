<?php
///link dinamis
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
  if(isset($_GET['page'])){
    $page = $_GET['page'];
    switch ($page) {
      case 'home':
        include "home.php";
        break;
      case 'login':
        include "login.php";
        break;
      case 'register':
        include "register.html";
        break;
      case 'dashboard':
        include "dashboard.php";
        break;
      case 'dashboard2':
        include "dashboard2.php";
        break;
      case 'admin':
        include "admin.php";
        break;
      case 'tu':
          include "tu.php";
          break;
      case 'identitas':
        include "identitas.php";
        break;
      case 'identitas_mhs':
        include "identitas_mhs.php";
        break;
      case 'identitas_ta':
        include "identitas_ta.php";
        break;
      case 'profile':
        include "profile.php";
        break;
      case 'list_dosen':
        include "list_dosen.php";
        break;
      case 'list_dosen_mhs':
        include "list_dosen_mhs.php";
        break;
      case 'list_mhs':
        include "list_mhs.php";
        break;
      case 'assign_pembimbing_mhs':
        include "assign_pembimbing_mhs.php";
        break;
      case 'assign_jadwal_sidang':
        include "assign_jadwal_sidang.php";
        break;
      case 'assign_jadwal_sidang2':
        include "assign_jadwal_sidang2.php";
        break;
      case 'list_mhs_dosen':
        include "list_mhs_dosen.php";
        break;
      case 'list_pengajuan':
        include "list_pengajuan.php";
        break;
      case 'import_mhs':
        include "import_mhs.php";
        break;     
      case 'periode_sidang':
        include "periode_sidang.php";
        break;
      case 'daftar_sidang':
        include "daftar_sidang.php";
        break;
      case 'daftarin_sidang':
          include "daftarin_sidang.php";
          break;
      case 'jadwal_sidang':
        include "jadwal_sidang.php";
        break;
      case 'logbook_bimbingan':
        include "logbook_bimbingan.php";
        break;
      case 'request_approval_laporan':
        include "request_approval_laporan.php";
        break;
      case 'approval_laporan':
        include "approval_laporan.php";
        break;
        case 'approval_prasidang':
          include "approval_prasidang.php";
          break;
      case 'approval_perbaikan':
        include "approval_perbaikan.php";
        break;
      case 'approval_perbaikan_pembimbing':
        include "approval_perbaikan_pembimbing.php";
        break;
      case 'penilaian_sidang':
        include "penilaian_sidang.php";
        break;
      case 'penilaian_sidang2':
        include "penilaian_sidang2.php";
        break;
      case 'penilaian_sidang_anggota':
        include "penilaian_sidang_anggota.php";
        break;
        case 'penilaian_sidang_baru':
          include "penilaian_sidang_baru.php";
          break;
      case 'list_penilaian_sidang':
        include "list_penilaian_sidang.php";
        break;
      case 'berita_acara_sidang':
        include "berita_acara_sidang.php";
        break;
      case 'list_judul_pembimbing':
        include "list_judul_pembimbing.php";
        break;
      case 'export_jadwal_sidang':
        include "export_jadwal_sidang.php";
        break;
      case 'rekap_nilai_sidang':
        include "rekap_nilai_sidang.php";
        break;
      case 'export_rekap_penilaian_sidang':
        include "export_rekap_penilaian_sidang.php";
        break;
      case 'logbook_bimbingan_dosen':
        include "logbook_bimbingan_dosen.php";
        break;
      case 'riwayat_sidang_mhs':
        include "riwayat_sidang_mhs.php";
        break;
      case 'nilai_bimbingan':
        include "nilai_bimbingan_baru.php";
        break; 
        case 'nilai_bimbingan_baru':
          include "nilai_bimbingan_baru.php";
          break; 
      case 'nilai_ta1':
        include "nilai_ta1.php";
        break;   
        case 'nilai_ta1_baru':
          include "nilai_ta1_baru.php";
          break;
      case 'nilai_ta1_a':
        include "nilai_ta1_a.php";
        break;
      case 'nilai_ta2':
        include "nilai_ta2.php";
        break;   
        case 'nilai_ta2_baru':
          include "nilai_ta2_baru.php";
          break;  
      case 'nilai_ta2_a':
        include "nilai_ta2_a.php";
        break; 
        case 'rekap_nilai_ta1_lama':
          include "rekap_nilai_ta1.php";
          break; 
      case 'rekap_nilai_ta1':
        include "rekap_nilai_ta1_baru.php";
        break; 
      case 'rekap_nilai_ta2_lama':
        include "rekap_nilai_ta2.php";
        break; 
        case 'rekap_nilai_ta2':
          include "rekap_nilai_ta2_baru.php";
          break; 
      case 'export_rekap_nilai_ta1':
        include "export_rekap_nilai_ta1.php";
        break; 
        case 'export_rekap_nilai_ta1_baru':
          include "export_rekap_nilai_ta1_baru.php";
          break; 
      case 'export_rekap_nilai_ta2':
        include "export_rekap_nilai_ta2.php";
        break;
        case 'export_rekap_nilai_ta2_baru':
          include "export_rekap_nilai_ta2_baru.php";
          break;
        case 'cetak_berita_acara':
          include "cetak_berita_acara.php";
          break;
          case 'request_pra_sidang':
            include "request_pra_sidang.php";
            break;
            case 'berkas_final':
              include "berkas_final.php";
              break;
              case 'qr_sign':
                include "qr_sign.php";
                break;
                case 'list_berkas_final':
                  include "list_berkas_final.php";
                  break;
                  case 'list_berkas_final_dosen':
                    include "list_berkas_final_dosen.php";
                    break;
                    case 'list_berkas_final_admin':
                      include "list_berkas_final_admin.php";
                      break;
                      case 'list_berkas_final_kps':
                        include "list_berkas_final_kps.php";
                        break;
                  case 'verifikasi_berkas_final':
                  include "verifikasi_berkas_final.php";
                  break;
                  case 'verifikasi_berkas_final_dosen':
                    include "verifikasi_berkas_final_dosen.php";
                    break;
                    case 'riwayat_perbaikan_sidang':
                      include "riwayat_perbaikan_sidang.php";
                      break;
                      case 'data_sidang_tu':
                        include "data_sidang_tu.php";
                        break;
                        case 'diskusi_revisi':
                          include "diskusi_revisi.php";
                          break;
                          case 'revisi_sidang':
                            include "revisi_sidang.php";
                            break;
      default:
        echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
        break;
    } 
  }else{
    session_start();
    $role = $_SESSION['user_jabatan'];
    if($role == 'Dosen'){
      include "dashboard.php";
    }
    else if($role == 'Mahasiswa'){
      include "dashboard2.php";
    }
    else if($role == 'Admin'){
      include "admin.php";
    }
    else if($role == 'TU'){
      include "tu.php";
    }
    else{
      include "home.php";
    }
    
  }
?>