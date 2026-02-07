<?php
include 'db.php';

$message = "";
$messageType = "";

// ❗IMPORTANT: form submit check
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['register'])) {
    return; // page load par kuchh bhi execute nahi hoga
}

// 🔹 Sanitize input
$name  = trim($_POST['name'] ?? '');
$email = strtolower(trim($_POST['email'] ?? ''));
$otp   = trim($_POST['otp'] ?? '');
$pass  = $_POST['password'] ?? '';
$cpass = $_POST['cpassword'] ?? '';

// 1️⃣ Empty check
if ($name === '' || $email === '' || $otp === '' || $pass === '' || $cpass === '') {
    $message = "All fields are required!";
    $messageType = "error";
    return;
}

// 2️⃣ Password match
if ($pass !== $cpass) {
    $message = "Password not matching!";
    $messageType = "error";
    return;
}

// 3️⃣ OTP verify (Google Apps Script)
$scriptUrl = "https://script.google.com/macros/s/AKfycbxLt5PDJktqkcpheu3N3K3bDk7zQZ3ebMyEhwfRn1MLHm6W7IKWEq4ydijdCgdppIodgw/exec";

// 🔥 IMPORTANT LINE (missing before)
$ch = curl_init($scriptUrl);

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST           => true,
    CURLOPT_TIMEOUT        => 15,
    CURLOPT_FOLLOWLOCATION => true,   // 🔥 redirect fix
    CURLOPT_MAXREDIRS      => 5,
    CURLOPT_POSTFIELDS     => http_build_query([
        'email' => $email,
        'otp'   => $otp
    ])
]);

$response = curl_exec($ch);

if ($response === false) {
    curl_close($ch);
    $message = "OTP server not responding";
    $messageType = "error";
    return;
}

curl_close($ch);

// 🔹 Decode JSON
$result = json_decode($response, true);

// ❌ Invalid response
if (!isset($result['status'])) {
    $message = "";
    $messageType = "error";
    return;
}

// ❌ OTP failed
if ($result['status'] !== 'success') {
    $message = $result['message'] ?? "Invalid OTP!";
    $messageType = "error";
    return;
}

// 4️⃣ Check email exists
$stmt = $conn->prepare("SELECT id FROM user_login WHERE email = ?");
$stmt->execute([$email]);

if ($stmt->fetch()) {
    $message = "Email already registered!";
    $messageType = "error";
    return;
}

// 5️⃣ Password hash
$hash = password_hash($pass, PASSWORD_DEFAULT);

// 6️⃣ Insert user
$insert = $conn->prepare(
    "INSERT INTO user_login (name, email, password) VALUES (?, ?, ?)"
);
$insert->execute([$name, $email, $hash]);

echo "✅ Registration Successful! <a href='index.html'>Login Now</a>";
?>
