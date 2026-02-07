<?php
session_start();

/* Session ke saare data clear */
$_SESSION = [];

/* Session destroy */
session_destroy();

/* Cache prevent */
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

/* Redirect to index */
header("Location: index.php");
exit;
?>