<?php
//  $ldap['user'] = "cn=Supardianto,dc=polibatam,dc=ac,dc=id";
//  $ldap['pass'] = "password";
//  $ldap['host']   = "192.168.5.17" ; // Contoh 192.168.110.103
//  $ldap['port']   = 389;
 
//  $ldap['conn'] = ldap_connect( $ldap['host'], $ldap['port'] )
//      or die("Could not connect to {$ldap['host']}" );
 
//  ldap_set_option($ldap['conn'], LDAP_OPT_PROTOCOL_VERSION, 3);
//  $ldap['bind'] = @ldap_bind($ldap['conn'], $ldap['user'], $ldap['pass']);
//  ldap_close( $ldap['conn'] );

//  if( !$ldap['bind'] )
//  {
//       echo "Username / Password Salah";
//  } else {
//       echo "Login sukses";
// }

?>

<?php


$ldap_dn = "cn=admin,dc=polibatam,dc=ac,dc=id";
$ldap_password = "Rahasia-123";

$ldap_con = ldap_connect("192.168.5.17");

ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);

if(ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {

    $filter = "(cn=admin)";
    $result = ldap_search($ldap_con,"dc=polibatam,dc=ac,dc=id",$filter) or exit("Unable to search");
    $entries = ldap_get_entries($ldap_con, $result);
    
    print "<pre>";
    //print_r ($entries);
    echo json_encode($entries);
    print "</pre>";
} else {
    echo "Invalid user/pass or other errors!";
}



?>

<?php
// $username = $_POST['username'];
// $password = $_POST['password'];


// $ldapconfig['host'] = '192.168.5.17';//CHANGE THIS TO THE CORRECT LDAP SERVER
// $ldapconfig['port'] = '389';
// $ldapconfig['basedn'] = 'dc=polibatam,dc=ac,dc=id';//CHANGE THIS TO THE CORRECT BASE DN
// $ldapconfig['usersdn'] = 'ou=users,dc=polibatam,dc=ac,dc=id;ou=mhs,dc=polibatam,dc=ac,dc=id';//CHANGE THIS TO THE CORRECT USER OU/CN
// $ds=ldap_connect($ldapconfig['host'], $ldapconfig['port']);

// ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
// ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);
// ldap_set_option($ds, LDAP_OPT_NETWORK_TIMEOUT, 10);

// $dn="uid=".$username.",".$ldapconfig['usersdn'].",".$ldapconfig['basedn'];
// if(isset($_POST['username'])){
// if ($bind=ldap_bind($ds, $dn, $password)) {
//   echo("Login correct");//REPLACE THIS WITH THE CORRECT FUNCTION LIKE A REDIRECT;
// } else {

//  echo "Login Failed: Please check your username or password";
// }
// }
?>
<!-- <!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<form action="" method="POST">
<input name="username">
<input type="password" name="password">
<input type="submit" value="Submit">
</form>
</body>
</html> -->