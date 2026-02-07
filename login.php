<?php
session_start();
include 'db.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $u = $_POST['username'];
    $p = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->execute([$u,$p]);

    if($stmt->rowCount()==1){
        $_SESSION['admin']=true;
        header("Location: admin.php");
        exit;
    } else {
        $error = "Invalid Login!";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
<h2>Login</h2>
<form method="post">
<input name="username" placeholder="Username"><br>
<input name="password" placeholder="Password" type="password"><br>
<button>Login</button>
</form>
<?php if(isset($error)) echo $error; ?>
</body>
</html>