<?php

    $query = $pdo->query("SELECT clue FROM questions WHERE id=$current_question");  //rajouter l'id en cours en fonction de la question
    $indice = $query->fetch();
    $textClue = $indice->clue; // Clue of the current question

    $query = $pdo->query("SELECT clue FROM users WHERE username='$current_user'"); // get the number of clue left
    $user_clue = $query->fetch();

    $clueTotal = $user_clue->clue;
    $clueLower = $clueTotal - 1;

    if(!empty($_POST['clue']))
    {
      if($clueTotal > 0 && $clueTotal <= 3)
      {
          $query = $pdo->query("UPDATE users SET clue=$clueLower WHERE username=$current_user");
          echo $textClue;
      }
    }