<?php
session_start();

/* cache disable */
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="gu">
<head>
<meta charset="UTF-8">
<title>Index Page</title>

<style>
body{font-family:Noto Sans Gujarati;background:#f2f2f2}
.nav{background:#222;color:#fff;padding:10px}
.nav span{cursor:pointer;margin-right:15px}
.box{display:none;background:#fff;padding:20px;margin:20px}
</style>
</head>

<body>

<div class="nav">
<?php if(!isset($_SESSION['user'])){ ?>

    <!-- LOGIN LINK -->
    <span onclick="showBox('loginBox')">Login</span>

<?php } else { ?>

    <!-- ACCOUNT LINK -->
    Welcome, <?= htmlspecialchars($_SESSION['user']) ?> |
    <span onclick="showBox('accountBox')">Account</span>
    <a href="user_logout.php" style="color:red">Logout</a>

<?php } ?>
</div>

<!-- LOGIN BOX -->
<?php if(!isset($_SESSION['user'])){ ?>
<div id="loginBox" class="box">
    <h3>Login</h3>
    <form method="post" action="login_check.php">
        Email:<br>
        <input type="email" name="email" required><br><br>
        Password:<br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</div>
<?php } ?>

<!-- ACCOUNT BOX -->
<?php if(isset($_SESSION['user'])){ ?>
<div id="accountBox" class="box">
    <h3>My Account</h3>
    <p><b>Email:</b> <?= htmlspecialchars($_SESSION['user']) ?></p>
    <p><b>Password:</b> ********</p>
</div>
<?php } ?>

<script>
function showBox(id){
    document.querySelectorAll('.box').forEach(b=>{
        b.style.display="none";
    });
    document.getElementById(id).style.display="block";
}
</script>

</body>
</html>
