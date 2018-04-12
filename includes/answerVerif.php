<?php

    $errorMessages = '';
    $successMessages = '';
    $answer ="The Spider-man";

    if(!empty($_POST['user_answer']))
    {
        $userAnswer = ($_POST['user_answer']);

        $userAnswerLC = strtolower($userAnswer);     // Lowercase
        $answerLC = strtolower($answer);

        $userAnswerReplace = str_replace([" ", ",", "#", "%", "$", ".", "?", "!", "/", "-", "+", "_", "<", ">", "=", "(", ")", "the"], "", $userAnswerLC);  // retirer les caracteres relou
        $answerReplace = str_replace([" ", ",", "#", "%", "$", ".", "?", "!", "/", "-", "+", "_", "<", ">", "=", "(", ")", "the"], "", $answerLC);

        $userAnswerLength = strlen($userAnswerReplace);     // Calc lenght
        $answerLength = strlen($answerReplace);

        $marge = floor($answerLength * 0.2);
        $levenshtein = levenshtein($userAnswerReplace, $answerReplace);
        $margeLeven = floor($answerLength * 0.10);

        if ($userAnswerReplace == $answerReplace)
        {
            $successMessages = 'Tu as trouvé la bonne réponse !';
        }
        else if (($userAnswerLength) <= ($answerLength + $marge)
            && ($userAnswerLength) >= ($answerLength - $marge))
        {
            if($levenshtein==$margeLeven)
            {
                $successMessages = 'Tu as trouvé la bonne réponse !';
            }
            else if($levenshtein==($margeLeven+1))
            {
                $errorMessages = 'tu y es presque !';
            }
            else
            {
                $errorMessages = "Ce n'est pas la réponse attendu !";
            }
        }
        else
        {
            $errorMessages = "Ce n'est pas la réponse attendu !";
        }
    }