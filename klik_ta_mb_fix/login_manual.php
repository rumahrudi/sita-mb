<?php
//login manual

					session_start();
                    $_SESSION['user_nik'] = '123456';
                    $_SESSION['user_jabatan'] = 'TU';
                    $_SESSION['id_user'] = '40';
                    $_SESSION['nama'] = 'Tata Usaha';
                    
                    $length = 32;
                    $_SESSION['token'] = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);
?>
