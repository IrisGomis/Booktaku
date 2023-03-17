<?php
require 'connection.php';

$message = '';

if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && $_POST['password'] === $_POST['confirm_password']) {
  $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':username', $_POST['username']);
  $stmt->bindParam(':email', $_POST['email']);
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $stmt->bindParam(':password', $password);
  if ($stmt->execute()) {
    $message = 'Usuario creado';
  } else {
    $message = 'Lo sentimos, ha habido un error.';
  }
} elseif (!empty($_POST)) {
  $message = 'Las contraseñas no coinciden';
}

$sql = "SELECT * FROM users";
$stmt = $conn->query($sql);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Signup</title>
</head>
<body>
  <img class="img-logo" src="assets/images/logo-booktaku-sin-background.png" width="100"  alt="">
  <h1 class="title">BOOKTAKU</h1>
  <div class="user-form">

  <?php if(!empty($message)): ?>
    <p><?= $message?></p>
  <?php endif; ?>

    <form action="signup.php" method="POST">
      <h1>Crear Usuario</h1>

      <input type="text" name="username" id="" placeholder="Nickname">
      <input type="email" name="email" id="" placeholder="Correo electrónico">
      <input type="password" name="password" id="" placeholder="Contraseña">
      <input type="password" name="confirm_password" id="" placeholder="Confirma tu contraseña">

      <input type="submit" name="" id="" value="Registrar">
    </form>
  </div>
  <span>Si ya tienes cuenta <a href="login.php">logeate.</a></span>
</body>
</html>