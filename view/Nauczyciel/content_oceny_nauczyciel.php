<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Oceny uczniów</h1>
                        <table>
                            <?php
                            $conn = new mysqli("localhost", "root", "", "dziennik");

                            $sql = "SELECT * FROM users JOIN grades ON users.id = grades.student_id WHERE users.role = 'uczeń'";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo "<table>";
                                echo "<tr><th>Imie</th><th>Nazwisko</th><th>Ocena</th><th>Przedmiot</th><th>Opis</th><th>Akcje</th></tr>";
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["Name"] . "</td>";
                                    echo "<td>" . $row["LastName"] . "</td>";
                                    echo "<td>" . $row["grade"] . "</td>";
                                    echo "<td>" . $row["subject"] . "</td>";
                                    echo "<td>" . $row["opis"] . "</td>";
                                    echo "<td><a href='CRUD operations/edit_grade.php?id=" . $row["id"] . "'>Edytuj</a> | <a href='CRUD operations/delete_grade.php?id=" . $row["id"] . "'>Usuń</a></td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "Brak danych do wyświetlenia.";
                            }
                            ?>
                        </table>
                    <h1 class="m-0">Wpisz ocenę</h1>

                    <form action="CRUD operations/insert_grade.php" method="POST">
                        <label>Imię ucznia:</label>
                        <input type="text" name="imie_ucznia"> <br><br>

                        <label>Nazwisko ucznia:</label>
                        <input type="text" name="nazwisko_ucznia"><br><br>

                        <label>Ocena:</label>
                        <input type="text" name="ocena"><br><br>

                        <label>Przedmiot:</label>
                        <input type="text" name="przedmiot"><br><br>

                        <label>Opis:</label>
                        <input type="text" name="opis"><br><br>

                        <input type="submit" value="Dodaj ocenę">
                    </form>

                </div>
            </div>
        </div>
    </div>


</div>




