<?php
session_start();
$_SESSION["logged"]["content"] = 8;
header("location: ../view/logged.php");


