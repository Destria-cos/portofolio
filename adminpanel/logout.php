<?php
session_start();
session_destroy();
header("Location: userpanel/index.php");
exit();
?>
