<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors = [];
        foreach ($_POST as $key => $value) {
            if (empty($value)) {
                $errors[] = "Wypelnij pole $key";
            }
        }
        if (!empty($errors)) {
            $_SESSION["bledy"] = implode("<br>", $errors);
            echo "<script>history.back()</script>";
        }
        else
        {
            require_once "./db_conn.php";
            $sql = "SELECT * FROM users WHERE users.Email=:email";

            $sth = $dbh->prepare($sql);
            $sth->bindParam(':email', $_POST["Email"], PDO::PARAM_STR);
            $sth->execute();

            if ($sth->rowCount() == 1){
                $result = $sth->fetchAll(pdo::FETCH_ASSOC);

                if (password_verify($_POST["Hasło"], $result[0]["Password"]))
                {
                    $_SESSION["logged"]["Name"] = $result[0]["Name"];
                    $_SESSION["logged"]["LastName"] = $result[0]["LastName"];
                    $_SESSION["logged"]["session_id"] = session_id();
                    $_SESSION["logged"]["role"] = $result[0]["role"];
                    header("location: ../view/logged.php");
                }
                else
                {
                    $_SESSION["bledy"] = "Błędny login lub hasło!";
                    echo "<script>history.back();</script>";
                }
            }
            else
            {
                $_SESSION["bledy"] = "Błędny email lub hasło!";
                echo "<script>history.back();</script>";
                exit();
            }
        }
    }

