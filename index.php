<?php 

session_start();

require 'connection.php';

if (isset($_SESSION['usser_id'])) {
    $records = $conn->prepare('SELECT id, username, email, password FROM users Where id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    if (count($results) > 0) {
        $user = $results;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Booktaku</title>
</head>
<body>
  <div class=container>
    <img class="img-logo" src="assets/images/logo-booktaku-sin-background.png" width="100"  alt="">
    <h1 class="title">BOOKTAKU</h1>
    <span>¿Aún no tienes cuenta? <a href="signup.php">Regístrate</a></span>
  </div>
  
</body>
</html>