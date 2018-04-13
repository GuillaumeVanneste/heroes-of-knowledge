<?php

    $errorMessages = [];
    $successMessages = [];
    $page = !empty($_GET["page"]) ? $_GET["page"] : '';
    $id = !empty($_GET["id"]) ? $_GET["id"] : '';
    // Form sent
    if(!empty($_POST)) // si il est envoyé 
    {

        // Retrieve form data
        $mail = trim($_POST['coMailName']);
        $coPass = trim($_POST['coPass']); // rebot âge et garde les valeurs
                                              // same

        // Test errors
        if(empty($mail))
        {
            $errorMessages[] = 'Missing mail';
        }
        if(empty($coPass))
        {
            $errorMessages[] = 'Missing Password';
        }


        // Success
        if(empty($errorMessages))

            $query = $pdo->query("SELECT username, password FROM users WHERE mail='$mail'");
            $user = $query->fetch();

            if(password_verify($coPass, $user->password))
            {
                $_SESSION['username'] = $user->username;
                header("Location: index.php");
            }
            else
            {
                $errorMessages[] = 'Wrong Mail or Password';
            }
        }
        else
        {
            $_POST['username'] = '';  // si y a rien d'envoyé
            $_POST['mail'] = '';
            $_POST['password'] = '';
        } 

    }