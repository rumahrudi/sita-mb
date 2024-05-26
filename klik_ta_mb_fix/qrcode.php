<?php
session_start();
//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
include_once("config.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
  }

$idpengguna = $_SESSION['id'];
$nim = $_SESSION['NIM'];
$username = $_SESSION['Username'];
$name = $_SESSION['Name'];
$email = $_SESSION['Email'];
$jabatan = $_SESSION['Jabatan'];


?>

<style>
.container{
	position: fixed;
	top: 50%;
	left: 50%;
	margin-top: -200px;
	margin-left: -150px;
}

body {
    background: #EBEBEB;
}
.invoice-wrap {box-shadow: 0 0 4px rgba(0, 0, 0, 0.1); margin-bottom: 20px; }

#ex{
position:fixed; left:320px; bottom:30px; 
background-color: #f5f5f5;
font-weight: 600;
outline: 0 !important;
line-height: 1.5;
border-radius: 3px;
font-size: 14px;
padding: 7px 10px;
border:1px solid #27c24c;
text-decoration:none;
color:#555 !important;
}

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
#mobile-preview-close a:nth-child(3) {
left:320px;
background:#f5f5f5;
border:1px solid #27c24c;
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
<?php
include "./phpqrcode/qrlib.php";
//set it to writable location, a place for temp generated PNG files
$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;

//html PNG location prefix
$PNG_WEB_DIR = 'temp/';

//ofcourse we need rights to create temp dir
if (!file_exists($PNG_TEMP_DIR))
    mkdir($PNG_TEMP_DIR);

// Filename
$filename = $PNG_TEMP_DIR. $id;

$logopath = "img/informatika.png";

// QR Code Value
$data = "http://if.polibatam.ac.id/tugas-akhir/approval.php?id=$id";
$link = "http://if.polibatam.ac.id/tugas-akhir/qrcode.php?id=$id";

// Call Function QR Code
QRcode::png($data, $filename, "H", 8, 2);

$QR = imagecreatefrompng($filename);

$logo = imagecreatefromstring(file_get_contents($logopath));

imagecolortransparent($logo , imagecolorallocatealpha($logo , 0, 0, 0, 127));
 imagealphablending($logo , false);
 imagesavealpha($logo , true);

 $QR_width = imagesx($QR);
 $QR_height = imagesy($QR);

 $logo_width = imagesx($logo);
 $logo_height = imagesy($logo);

 $logo_qr_width = $QR_width/8;
 $scale = $logo_width/$logo_qr_width;
 $logo_qr_height = $logo_height/$scale;

 imagecopyresampled($QR, $logo, $QR_width/2.3, $QR_height/2.3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);

 // Simpan kode QR lagi, dengan logo di atasnya
 imagepng($QR,$filename);
 ?>

 <img src="<?php echo $PNG_WEB_DIR.basename($filename) ?>" class=" container mb-4"/>

 <div id="mobile-preview-close">
<a style="color: #fff !important;" href="javascript:history.back()"> <img src="img/arrow-back.png" style="float:left; margin:0 13px 0 0;"> Sebelumnya</a>
<a style="" href="" onclick='copy("<?=$link; ?>")'> <img src="img/print.png" style="float:left; margin:0 13px 0 0;"> Share Tanda Tangan </a>

<script type="text/javascript">
function copy(href) {
    var dummy = document.createElement("input");
    document.body.appendChild(dummy);
    dummy.setAttribute('value', href);
    dummy.select();
    document.execCommand("copy");
    document.body.removeChild(dummy);
    alert("Link Berhasil Disalin.");
}
</script>

</div>