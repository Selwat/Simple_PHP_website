<?php
    session_start();
    if (!isset($_SESSION["logged"]) || $_SESSION["logged"]["session_id"] != session_id() || session_status() != 2)
    {
        header("location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel główny</title>
</head>
<body>
<?php
    echo '<a href="../scripts/logout.php">Wyloguj</a>';
?>
</body>
</html>