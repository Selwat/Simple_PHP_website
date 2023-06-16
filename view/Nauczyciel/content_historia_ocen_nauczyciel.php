<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Historia zmiany ocen dla wszystkich uczniow</h1>
                        <table>
                            <?php
                                $conn = new mysqli("localhost", "root", "", "dziennik");
                                $sql = "SELECT * FROM history";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    echo "<table>";
                                    echo "<tr><th>Imie Studenta</th><th>Nazwisko Studenta</th><th>Poprzednia Ocena</th><th>Obecna Ocena</th><th>Przedmiot</th><th>Opis</th><th>Kiedy Zmieniono</th></tr>";
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["Student_Name"] . "</td>";
                                        echo "<td>" . $row["Student_LastName"] . "</td>";
                                        echo "<td>" . $row["OldGrade"] . "</td>";
                                        echo "<td>" . $row["NewGrade"] . "</td>";
                                        echo "<td>" . $row["subject"] . "</td>";
                                        echo "<td>" . $row["opis"] . "</td>";
                                        echo "<td>" . $row["Date"] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                } else {
                                    echo "Brak danych do wyświetlenia.";
                                }
                            ?>
                        </table>
                </div>
            </div>
        </div>
    </div>


</div>


