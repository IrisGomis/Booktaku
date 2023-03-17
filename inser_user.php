<?php 

include('connection.php');
$connect = connection();

$id = null;
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO users VALUES('$id', '$username', '$email', '$password')";
$query = mysqli_query($connect, $sql);

if($query){
    Header("Location: singup.php");
};
?>