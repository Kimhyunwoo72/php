<?php
include "../connect/session.php";
    unset($_SESSION['memberID']);
    unset($_SESSION['youName']);
    unset($_SESSION['youEmail']);

    Header("location: ../pages/main.php");
?>