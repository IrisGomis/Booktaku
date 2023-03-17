<?php
include('connection.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = :username";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $username);

$stmt->execute();

$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    session_start();
    $_SESSION['user_id'] = $user['id'];
    header("Location: index.php");
    exit();
} else {
    header("Location: signup.php");
    exit();
}
?>
