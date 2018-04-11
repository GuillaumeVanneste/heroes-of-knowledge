<?php
    echo '<pre>';
    //var_dump($_POST);
    echo '</pre>';

    $errorMessages = [];
    $successMessages = [];
    $page = !empty($_GET["page"]) ? $_GET["page"] : '';
    $id = !empty($_GET["id"]) ? $_GET["id"] : '';

    // Form sent
    if(!empty($_POST)) // si il est envoyé 
    {

        // Retrieve form data
        $username = trim($_POST['username']);
        $mail = trim($_POST['mail']);
        $password = trim($_POST['password']);// rebot âge et garde les valeurs
                                              // same

        // Test errors
        if(empty($username))
        {
            $errorMessages[] = 'Missing username';
        }
        else if(empty($mail))
        {
            $errorMessages[] = 'Missing mail';
        }



        // Success
        if(empty($errorMessages))
        {
            $prepare = $pdo->prepare('
                INSERT INTO
                    users (username, mail, password)
                VALUES
                    (:username, :mail, :password)
           ');

            $passwordHash = password_hash($password, PASSWORD_BCRYPT);

            $prepare->bindValue('username', $username);
            $prepare->bindValue('mail', $mail);
            $prepare->bindValue('password', $passwordHash);



            $prepare->execute();

            $successMessages[] = 'User registered';

            $_POST['username'] = '';
            $_POST['mail'] = '';
            $_POST['password'] = '';
        }
    }
    else
    {
        $_POST['username'] = '';  // si y a rien d'envoyé 
        $_POST['mail'] = ''; 
        $_POST['password'] = ''; 
    }



        if ($page == 'delete')
    {
        $prepare = $pdo->prepare('DELETE FROM users WHERE id = '.$id);
        $execute = $prepare->execute();
    }