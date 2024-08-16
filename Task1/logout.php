<?php
require 'config.php';
$_SESSION = [];
session_unset();
session_destroy();
echo
    "<script> alert(Successfully logged out); </script>";
header("Location: home1.php");

?>
