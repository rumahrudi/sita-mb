<?php
                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                include 'config.php';
				$id = mysqli_real_escape_string($conn,$_GET['id_jadwal']);
				$id = base64_decode($id);
				$set_time = $conn->query("SET lc_time_names ='id_ID'");
                     $sql = $conn->query("SELECT *,DATE_FORMAT(`tanggal_sidang`, '%d %M %Y') as `tanggal_sidang` FROM `tb_jadwal_sidang` WHERE id_jadwal = $id");
                     $data = mysqli_fetch_assoc($sql);
                        $periodsidang = $data['periode_sidang'];
                        $idjadwal = $data['id_jadwal'];
                        $penguji_1 = $data['penguji_1'];
                        $penguji_2 = $data['penguji_2'];
						$tanggal_sidang = $data['tanggal_sidang'];
						$jenis_sidang = $data['jenis_sidang'];

                        $idmhs= $data['id_tugas_akhir'];
                        $iddosen = $data['penguji_1'];
                        $iddosen2 = $data['penguji_2'];

                        $sql2 = $conn->query("SELECT * FROM `tb_tugas_akhir` WHERE id_mhs = '$idmhs'");
                        $data2 = mysqli_fetch_assoc($sql2);
                        $id_dosen = $data2['id_dosen'];
						$judul = $data2['judul'];

                        $sql22  = $conn->query("SELECT * FROM `tb_user` WHERE `id_user` = $id_dosen ;");
                        $data22 = mysqli_fetch_assoc($sql22);
                        $nama_dosen = $data22['nama'];
                        $email_dosen = $data22['email'];

                        $sql3  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$iddosen' ;");
                        $data3 = mysqli_fetch_assoc($sql3);
                        $namadosen = $data3['nama'];

                        $sql4  = $conn->query("SELECT * FROM `tb_user` WHERE id_user = '$iddosen2' ;");
                        $data4 = mysqli_fetch_assoc($sql4);
                        $namadosen2 = $data4['nama'];

                        $sql5  = $conn->query("SELECT * FROM `tb_user_mhs` WHERE id_user_mhs = '$idmhs' ;");
                        $data5 = mysqli_fetch_assoc($sql5);
                        $namamhs = $data5['nama'];
                        $nimmhs = $data5['nim'];

                        $sql6  = $conn->query("SELECT * FROM `tb_penilaian_sidang` WHERE id_jadwal = '$idjadwal' AND id_dosen = $penguji_1;");
                        $data6 = mysqli_fetch_assoc($sql6);
                        $komentar = $data6['catatan_perbaikan'];
                        $status = $data6['status'];
                        $sidang_ulang = $data6['sidang_ulang'];

                        $sql7  = $conn->query("SELECT * FROM `tb_penilaian_sidang` WHERE id_jadwal = '$idjadwal' AND id_dosen = $penguji_2 ;");
                        $data7 = mysqli_fetch_assoc($sql7);
                        $komentar2 = $data7['catatan_perbaikan'];
                        $status2 = $data7['status'];
                        $sidang_ulang2 = $data7['sidang_ulang'];

						?>

<!doctype html>
<html lang="en">
	<head>
		<title>SITA | Cetak Berita Acara Sidang</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style type="text/css">
		.totals-row td {
			border-right:none !important;
			border-left:none !important;
		}
		
		
		td {
			white-space: nowrap;
		}
		.items-table td ,#notes { white-space:normal;}
		.totals-row td strong,.items-table th {
			white-space:nowrap;
		}
		</style>
				<style type="text/css">
			.is_logo {display:none;}
		</style>
			</head>
	<body>
		<div id="editor" class="edit-mode-wrap" style="margin-top: 20px">
			<style type="text/css">
			.is_logo {display:none;}
			</style><style type="text/css">* { margin:0; padding:0; }
body { background:#fff; font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:20px; }
#extra {text-align: right; font-size: 22px;  font-weight: 700}
.invoice-wrap { width:700px; margin:0 auto; background:#FFF; color:#000 }
.invoice-inner { margin:0 15px; padding:20px 0 }
.invoice-address { border-top: 3px double #000000; margin: 25px 0; padding-top: 25px; }
.bussines-name { font-size:18px; font-weight:100 }
.invoice-name { font-size:22px; font-weight:700 }
.listing-table th { background-color: #e5e5e5; border-bottom: 1px solid #555555; border-top: 1px solid #555555; font-weight: bold; text-align:left; padding:6px 4px }
.listing-table td { border-bottom: 1px solid #555555; text-align:left; padding:5px 6px; vertical-align:top }
.total-table td { border-left: 1px solid #555555; }
.total-row { background-color: #e5e5e5; border-bottom: 1px solid #555555; border-top: 1px solid #555555; font-weight: bold; }
.row-items { margin:5px 0; display:block }
.notes-block { margin:50px 0 0 0 }
/*tables*/
table td { vertical-align:top}
.items-table { border:1px solid #1px solid #555555; border-collapse:collapse; width:100%}
.items-table td, .items-table th { border:1px solid #555555; padding:4px 5px ; text-align:left}
.items-table th { background:#f5f5f5;}
.totals-row .wide-cell { border:1px solid #fff; border-right:1px solid #555555; border-top:1px solid #555555}
</style>
<div class="invoice-wrap">
<div class="invoice-inner">

<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody>
		<tr>
			<td align="center" valign="center">
			<p style="font-size: 18pt;">Berita Acara Sidang</p>
			</td>
		</tr>
		<tr></tr>
		<tr>
			<td align="center" valign="center">
			<p style="font-size: 12pt;">Program Studi Teknik Informatika</p>
			</td>
		</tr>
	</tbody>
</table>

<div class="invoice-address">
<p>Pada Tanggal <b><?php echo $tanggal_sidang; ?></b> telah dilaksanakan <b><?php echo $jenis_sidang; ?></b> bagi mahasiswa: <br><br>
&nbsp;&nbsp;&nbsp;&nbsp;  Nama: <?php echo $namamhs; ?><br>
&nbsp;&nbsp;&nbsp;&nbsp;  NIM : <?php echo $nimmhs; ?><br>
&nbsp;&nbsp;&nbsp;&nbsp;  Judul : <?php echo $judul; ?><br><br>
dengan penguji: <br><br>
&nbsp;&nbsp;&nbsp;&nbsp; Penguji 1 : <?php echo $namadosen; ?> <br>
&nbsp;&nbsp;&nbsp;&nbsp; Penguji 2 : <?php echo $namadosen2; ?> <br>
</p>
<br>
<p>Dengan Saran perbaikan sebagai berikut: </p>
</div>

<div id="items-list"><table class="table table-bordered table-condensed table-striped items-table">
	<thead>
		<tr>
			<th>Saran Perbaikan</th>
		</tr>
	</thead>
	<tbody>
		<tr class="totals-row">
		<td>
		<strong>Penguji 1: <?php echo $namadosen; ?></strong>
		<p><?php echo $komentar; ?></p>
		<br><br>
		<p>Cek Perbaikan: Penguji: <b><?php echo $status; ?></b></p>
		</td>		
		</tr>
		<tr class="totals-row">
		<td>
		<strong>Penguji 2: <?php echo $namadosen2; ?></strong>
		<p><?php echo $komentar2; ?></p>
		<br><br>
		<p>Cek Perbaikan: Penguji: <b><?php echo $status2; ?></b></p>
		</td>		
		</tr>		
	</tbody>
</table></div>

<div class="notes-block">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody>
		<tr>
			<td>
			<div class="editable-area" id="notes" style="">Sidang dilaksanakan secara daring/online, sehingga Berita Acara Sidang tidak menyertakan
tanda tangan penguji dan mahasiswa.
</div>
			</td>
		</tr>
	</tbody>
</table>
</div>
<br />
<br />
<br />
<br />
&nbsp;</div>
</div>
		</div>
	<style>
body {
    background: #EBEBEB;
}
.invoice-wrap {box-shadow: 0 0 4px rgba(0, 0, 0, 0.1); margin-bottom: 20px; }
#mobile-preview-close a {
position:fixed; left:20px; bottom:30px; 
background-color: #27c24c;
font-weight: 600;
outline: 0 !important;
line-height: 1.5;
border-radius: 3px;
font-size: 14px;
padding: 7px 10px;
border:1px solid #27c24c;
text-decoration:none;
}
#mobile-preview-close img {
	width:20px;
	height:auto;
}
#mobile-preview-close a:nth-child(2) {
left:190px;
background:#f5f5f5;
border:1px solid #9f9f9f;
color:#555 !important;
}
#mobile-preview-close a:nth-child(2) img {
    height: auto;
	position: relative;
top: 2px;
}
.invoice-wrap {padding: 20px;}


@media print {
  #mobile-preview-close a {
  display:none
}
.invoice-wrap {0}
body {
    background: none;
}
.invoice-wrap {box-shadow: none; margin-bottom: 0px;}

}
</style>

<div id="mobile-preview-close">
<a style="color: #fff !important;" href="index.php?page=pph_final"> <img src="img/arrow-back.png" style="float:left; margin:0 10px 0 0;"> Kembali</a>
<a style="" href="javascript:window.print();"> <img src="img/print.png" style="float:left; margin:0 10px 0 0;"> Cetak </a>

</div>

<script type="text/javascript">
var beforePrint = function() {
};

//var afterPrint = function() {
//	document.location.href='/invoices/thankyou/0';
//};

if (window.matchMedia) {
	var mediaQueryList = window.matchMedia('print');
	mediaQueryList.addListener(function(mql) {
		if (mql.matches) {
			beforePrint();
		} else {
			afterPrint();
		}
	});
}
window.onbeforeprint = beforePrint;
window.onafterprint = afterPrint;

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-73809851-1', 'auto');
  ga('send', 'pageview');


</script></body>
</html>