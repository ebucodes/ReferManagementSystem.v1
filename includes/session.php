<?php
    include("config.php");
    session_start();
    //Query to store session
    if (!isset($_SESSION["id"])) {
        header("location:users/index.php");
    } else {
        $session_id = $_SESSION['id'];
        $session_query = ("SELECT * FROM users WHERE id = '$session_id'") or die(mysqli_errno($conn));
        $session_result = mysqli_query($conn, $session_query);
        $user_info = mysqli_fetch_array($session_result);
    }
?>