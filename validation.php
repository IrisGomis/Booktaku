<?php
include('connection.php');

$connect = connection();

$USER=$_POST['username'];
$PASSWORD=$_POST['password'];

$consult = "SELECT * FROM users where username = '$USER' and password ='$PASSWORD'";
$result = mysqli_query($connect, $consult);

$rows = mysqli_num_rows($result);

if($rows){
    header("Location:home.php");
}
else{
    include("index.php");
}

mysqli_free_result($result);
mysqli_close($connect);
?>
