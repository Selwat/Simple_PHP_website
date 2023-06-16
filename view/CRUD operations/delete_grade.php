<?php

    $conn = new mysqli("localhost", "root", "", "dziennik");

    $id = $_GET['id'];

    $sql = "DELETE FROM grades WHERE id = ?";
    $sth = $conn->prepare($sql);
    $sth->bind_param("i", $id);

    if ($sth->execute()) {
        header("Location: ../logged.php");
    } else {
        echo "Wystąpił błąd podczas usuwania oceny: " . $conn->error;
    }

?>
