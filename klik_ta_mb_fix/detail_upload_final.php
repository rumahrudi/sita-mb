<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include 'config.php';
session_start();
$token = $_SESSION['token'];
$id = mysqli_real_escape_string($conn,$_POST['rowid']);
?>
        <!-- MEMBUAT FORM -->
        <script type="text/javascript">
                  function validasiFile1(){
                      var inputFile = document.getElementById('halaman_judul');
                      var pathFile = inputFile.value;
                      var ekstensiOk = /(\.pdf|\.PDF)$/i;
                      if(!ekstensiOk.exec(pathFile)){
                          alert('Silakan upload file yang memiliki ekstensi .pdf');
                          inputFile.value = '';
                          return false;
                      }
                      else{
                        if (inputFile.files.length > 0) { 
                          for (const i = 0; i <= inputFile.files.length - 1; i++) { 
                
                              const fsize = inputFile.files.item(i).size; 
                              const file = Math.round((fsize / 1024)); 
                              // The size of the file. 
                              if (file >= 10485) { 
                                  alert( 
                                    "Ukuran File Terlalu Besar, Ukuran file yang diizinkan < 10MB"); 
                                  inputFile.value = '';
                                  return false;
                              } 
                          } 
                      } 
                      }
                  }
      </script>
        <form class="form-horizontal" action="proses_ta.php?aksi=upload_final" method="post" enctype="multipart/form-data">
        <input type="hidden" id="id_mhs" name="id_mhs" value="<?php echo $id; ?>">
            <input type="hidden" name="token" value="<?php echo $token; ?>">
                <div class="input-group">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Pilih File</button>
                          </span>
                          <input type="file" class="form-control" name="halaman_judul" id="halaman_judul" accept="application/pdf" onchange="return validasiFile1();">
                        </div> 	
                        <p class="help-block">Silahkan unggah Halaman Judul sesuai template dari Koordinator TA dalam bentuk PDF dan size < 10MB</p>
                        <br>  			  
          			<div class="modal-footer">			
                      <button class="btn btn-primary btn-block" type="submit">Upload</button>
          			</div>
        </form>
