<?php
// it will remove the login cookie
setcookie("user_logged_in", "", time() - 3600, "/");

// go back to sign-in page
header("Location: sign-in.php");
exit();
?>