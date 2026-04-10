<?php
session_start();
include 'db.php';

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: loginpage.html");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Futurize</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">Futurize</div>
        <ul class="nav-links">
            <li><a href="index.html">Home</a></li>
            <li><a href="quiz.html">Quiz</a></li>
            <li><a href="dashboard.php">Career</a></li>
            <li><a href="logout.php" class="logout-btn">Logout</a></li>
        </ul>
    </nav>

    <div class="dashboard-container">
        <h2>Welcome, <?php echo htmlspecialchars($username); ?> 👋</h2>
        <p>Ready to discover your best career path?</p>

        <a href="quiz.html" class="start-btn">Start Career Quiz</a>
    </div>
</body>
</html>
