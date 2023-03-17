<?php 

session_start();

require 'connection.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, username, email, password FROM users Where id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    if (!empty($results)) {
        $user = $results;
    }
}

if(!empty($user)){
    header("Location: home.php");
    exit;
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

  <?php if(!empty($user)):?>
  <br>Bienvenida <?= $user['username']?>
  <a href="logout.php">Cerrar sesión.</a>
  <?php else: ?>

  <div class=container>
    <img class="img-logo" src="assets/images/logo-booktaku-sin-background.png" width="100"  alt="">
    <h1 class="title">BOOKTAKU</h1>
    <span>¿Aún no tienes cuenta? <a href="signup.php">Regístrate.</a> O si ya tienes cuenta <a href="login.php">entra.</a></span>
  </div>
  
  <?php endif; ?>

</body>
</html>