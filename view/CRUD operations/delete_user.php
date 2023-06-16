<?php
if(isset($_GET['id'])) {
    $conn = new mysqli("localhost", "root", "", "dziennik");


    $id = $_GET['id'];

    $sqlCheckGrades = "SELECT * FROM grades WHERE student_id = $id";
    $result = $conn->query($sqlCheckGrades);

    if ($result->num_rows > 0) {

        $sqlDeleteGrades = "DELETE FROM grades WHERE student_id = $id";
        if ($conn->query($sqlDeleteGrades) === TRUE) {
            header("Location: ../logged.php");
        } else {
            echo "Nie usunięto użytkownika";
        }
    }

    $sqlDeleteUser = "DELETE FROM users WHERE ID = $id";
    if ($conn->query($sqlDeleteUser) === TRUE) {
        header("Location: ../logged.php");
    } else {
        echo "Nie usunięto użytkownika";
    }

} else {
    echo "Nieprawidłowy identyfikator użytkownika.";
}
?>

