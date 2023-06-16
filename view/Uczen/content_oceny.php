<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Oceny Ucznia</h1>
                    <table>
                        <?php

                        $conn = new mysqli("localhost", "root", "", "dziennik");
                        $uczen= $_SESSION["logged"]["Name"];
                        $sql = "SELECT grade, subject, opis FROM grades INNER JOIN users ON grades.student_id = users.id WHERE users.Name = '$uczen'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<table>";
                            echo "<tr><th>Ocena</th><th>Przedmiot</th><th>Opis</th></tr>";

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["grade"] . "</td>";
                                echo "<td>" . $row["subject"] . "</td>";
                                echo "<td>" . $row["opis"] . "</td>";
                                echo "</tr>";
                            }

                            echo "</table>";
                        } else {
                            echo "Brak ocen dla użytkownika o imieniu $uczen.";
                        }

                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
