<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'booktaku';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e) {
    die('Conexión fallida:' .$e->getMessage());

}






// function connection(){
//     $host = "localhost";
//     $user = "root";
//     $pass = "";

//     $bd = "booktaku";

//     $connect = mysqli_connect($host, $user, $pass);

//     mysqli_select_db($connect, $bd);
    
//     return $connect;
// };

?>