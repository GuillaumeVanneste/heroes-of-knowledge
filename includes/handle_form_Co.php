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
        $mail = trim($_POST['coMailName']);
        $coPass = trim($_POST['coPass']); // rebot âge et garde les valeurs
                                              // same

        // Test errors
        if(empty($mail))
        {
            $errorMessages[] = 'Missing username';
        }
        else if(empty($coPass))
        {
            $errorMessages[] = 'Missing Password';
        }


        // Success
        if(empty($errorMessages))
        {     
         
            $password = md5($coPass);
            $query = $pdo->query("SELECT username FROM connection WHERE mail='$mail' && password='$password'");
            $query->execute();
            $user = $query->fetch();
          
            if($user == false)
            {
              $errorMessages[] = 'Wrong Mail or Password';
            }
            else{
              $successMessages[] = "wp";
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
        $prepare = $pdo->prepare('DELETE FROM connection WHERE id = '.$id);
        $execute = $prepare->execute();
    }
    }