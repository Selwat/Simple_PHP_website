<style>
    .tabela {
        margin-left: 8vw;
        margin-top: 20vh;
        width: 40vw;
        border-collapse: collapse;
        margin-bottom: 20px;
        font-family: Arial, sans-serif;
    }

   td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
        color: white;
    }
    th {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
        color: grey;
    }

    th {
        background-color: #f9f9f9;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: grey;
    }

    tr:hover {
        background-color: grey;
    }
    .m-0{
        padding-left:2vw;
    }
</style>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <h1 class="m-0">Oceny Ucznia</h1>
                <div class="col-sm-6">
                    
                    <table>
                        <?php

                        $conn = new mysqli("localhost", "root", "", "dziennik");
                        $uczen= $_SESSION["logged"]["Name"];
                        $sql = "SELECT grade, subject, opis FROM grades INNER JOIN users ON grades.student_id = users.id WHERE users.Name = '$uczen'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<table class='tabela'>";
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
