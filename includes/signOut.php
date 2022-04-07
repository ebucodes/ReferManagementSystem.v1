<?php
session_start();
$_SESSION['id'] = false;
session_destroy();
header("location:../users/");
?>