<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = trim($_POST['fname']);
  $lname = trim($_POST['lname']);
  $email = trim($_POST['email']);
  $password = $_POST['pass'];
  $username = $fname . " " . $lname;

  $check = $conn->prepare("SELECT * FROM users WHERE email = ?");
  $check->bind_param("s", $email);
  $check->execute();
  $result = $check->get_result();

  if ($result->num_rows > 0) {
    echo "<script>alert('⚠️ Email already registered!'); window.location.href='register.html';</script>";
  } else {
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $insert = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $insert->bind_param("sss", $username, $email, $hashed);

    if ($insert->execute()) {
      echo "<script>alert('✅ Registration successful! Please login.'); window.location.href='loginpage.html';</script>";
    } else {
      echo "<script>alert('❌ Database Error: " . addslashes($conn->error) . "'); window.location.href='register.html';</script>";
    }
  }
} else {
  echo "<script>alert('Please submit the form properly.'); window.location.href='register.html';</script>";
}
?>
