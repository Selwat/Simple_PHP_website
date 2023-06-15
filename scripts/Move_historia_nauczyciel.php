<?php
session_start();
$_SESSION["logged"]["content"] = 7;
header("location: ../view/logged.php");

