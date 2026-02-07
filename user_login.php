<?php
if (isset($_POST['login'])){
session_start();
include 'db.php';

$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)) {
    die("Email and password required");
}

$stmt = $conn->prepare("SELECT id, email, password FROM user_login WHERE email = ?");
$stmt->execute([$email]);

if ($stmt->rowCount() === 1) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (password_verify($password, $user['password'])) {
        session_regenerate_id(true);
        $_SESSION['user'] = $user['email'];
        $_SESSION['uid']  = $user['id'];

        header("Location: index.php");
        exit;
    }
}

echo "Invalid email or password";
}
?>
