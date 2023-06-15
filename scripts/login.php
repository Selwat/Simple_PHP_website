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
            $sql = "SELECT * FROM users WHERE users.Email=?";
            $sth = $conn->prepare($sql);

            $sth->bind_param("s", $_POST["Email"]);
            $sth->execute();
            $result = $sth->get_result();

            if ($result->num_rows == 1){

                $user = $result->fetch_assoc();

                if (password_verify($_POST["Hasło"], $user["Password"]))
                {
                    $_SESSION["logged"]["Name"] = $user["Name"];
                    $_SESSION["logged"]["LastName"] = $user["LastName"];
                    $_SESSION["logged"]["session_id"] = session_id();
                    $_SESSION["logged"]["role"] = $user["role"];
                    $_SESSION["logged"]["Email"] = $user["Email"];
                    $_SESSION["logged"]["DataUrodzenia"] = $user["Birthday"];
                    $_SESSION["logged"]["NumerTelefonu"] = $user["PhoneNumber"];
                    $_SESSION["logged"]["content"]=1;

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

