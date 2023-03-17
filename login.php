<?php

session_start();

require 'connection.php';

if (!empty($_POST['username']) && !empty($_POST['password'])){
  $records = $conn->prepare('SELECT id, username, email, password FROM users WHERE username=:username');
  $records->bindParam(':username', $_POST['username']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if (count($results) > 0 && password_verify($_POST['password'], $results['password'])){
    $_SESSION['user_id'] = $results['id'];
    header('Location: index.php');
  }
  else{
    $message = 'Usuario no encontrado';
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
  <title>Login</title>
</head>
<body>
  <div class=container>
    <img class="img-logo" src="assets/images/logo-booktaku-sin-background.png" width="100"  alt="">
    <h1 class="title">BOOKTAKU</h1>

    <?php if (!empty($message)) : ?>
      <p><?= $message ?></p>
    <?php endif;?>

    <div class="user-form">
      <form action="login.php" method="POST">

        <input type="text" name="username" id="" placeholder="Nickname">
        <input type="password" name="password" id="" placeholder="Contraseña">

        <input type="submit" name="" id="" value="Entrar">
      </form>
      <span>¿Aún no tienes cuenta? <a href="signup.php">Regístrate</a></span>
    </div>
  </div>
</body>
</html>