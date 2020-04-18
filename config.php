<!-- add connector to database -->
<?php
$server = "localhost";
$user = "root";
$password = "";
$database_name = "dapodik";

$db = mysqli_connect($server, $user, $password, $database_name);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>