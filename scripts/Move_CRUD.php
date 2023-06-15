<?php
    session_start();
    $_SESSION["logged"]["content"] = 4;
    header("location: ../view/logged.php");