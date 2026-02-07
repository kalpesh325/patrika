<?php
session_start();
if(!isset($_SESSION['admin'])){ header("Location: login.php"); exit; }
?>
<!DOCTYPE html>
<html>
<head><title>Admin</title></head>
<body>
<h2>Admin Dashboard</h2>
<p>Welcome!</p>
<a href="logout.php">Logout</a>
</body>
</html>