<?php

    $conn = new mysqli("localhost", "root", "", "dziennik");


    $imieUcznia = $_POST['imie_ucznia'];
    $nazwiskoUcznia = $_POST['nazwisko_ucznia'];
    $ocena = $_POST['ocena'];
    $przedmiot = $_POST['przedmiot'];
    $opis = $_POST['opis'];

    $sql = "INSERT INTO grades (student_id, grade, subject, opis) SELECT users.id, ?, ?, ? FROM users WHERE users.Name = ? AND users.LastName = ?";
    $sth = $conn->prepare($sql);
    $sth->bind_param("issss", $ocena, $przedmiot, $opis, $imieUcznia, $nazwiskoUcznia);

    if ($sth->execute()) {
        echo "<script>history.back()</script>";
    } else {
        echo "Wystąpił błąd podczas dodawania oceny: " . $conn->error;
    }

?>

