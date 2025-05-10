<?php
// login.php
session_start();
include 'koneksi.php'; // koneksi ke database

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($email && $password) {
  $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
  $stmt->bind_param("ss", $email, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $_SESSION['admin'] = true;
    echo "success";
  } else {
    echo "invalid";
  }

  $stmt->close();
}

$conn->close();
?>
