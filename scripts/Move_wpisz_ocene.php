<?php
    session_start();
    $_SESSION["logged"]["content"] = 6;
    header("location: ../view/logged.php");

