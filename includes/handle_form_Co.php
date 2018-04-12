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
        {     
<<<<<<< HEAD
          $query = $pdo->query("SELECT username FROM users WHERE mail='$mail'");
          $query->execute();
          $user = $query->fetch();

          if($user == false || password_verify($coPass, $user->password))
          {
            $errorMessages[] = 'Wrong Mail or Password';
          }
          else
          {
            $_SESSION['username'] = $user;
            header("Location: index.php");
          }
    }
    else
    {
        $_POST['username'] = '';  // si y a rien d'envoyé 
        $_POST['mail'] = ''; 
        $_POST['password'] = ''; 
    }


=======
         
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
>>>>>>> ce825f0cbe355fbddd0c379671bca45be4e4e602

    }