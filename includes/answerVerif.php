<?php

    $errorMessages = '';
    $successMessages = '';

    function switchQuestion()
    {
        global $pdo;
        global $current_user;

        $query = $pdo->query("SELECT score FROM users WHERE username='$current_user'");
        $user_score = $query->fetch();

        $current_question = $user_score->score + 1;

        return $current_question;
    }

    function getQuestion()
    {
        global $pdo;
        global $current_question;

        $query = $pdo->query("SELECT question FROM questions WHERE id='$current_question'");
        $storage = $query->fetch();

        $question = $storage->question;

        return $question;
    }

    function getAnswer()
    {
        global $pdo;
        global $current_question;

        $query = $pdo->query("SELECT answer FROM questions WHERE id='$current_question'");
        $storage = $query->fetch();

        $answer = $storage->answer;

        return $answer;
    }

    $current_question = switchQuestion();
    $question = getQuestion();
    $answer = getAnswer();

    if(!empty($_POST['user_answer']))
    {
        $userAnswer = ($_POST['user_answer']);

        $userAnswerLC = strtolower($userAnswer);     // Lowercase
        $answerLC = strtolower($answer);

        $userAnswerReplace = str_replace(["des ", "une ","un ","the ", " ", ",", ":", "#", "%", "$", ".", "?", "!", "/", "-", "+", "_", "<", ">", "=", "(", ")", "~", "*"], "", $userAnswerLC);  // retirer les caracteres relou
        $userAnswerReplace = str_replace(["é", "è", "ê"], "e", $userAnswerReplace);

        $answerReplace = str_replace(["des ", "une ","un ","the ", " ", ",", ":", "#", "%", "$", ".", "?", "!", "/", "-", "+", "_", "<", ">", "=", "(", ")", "~", "*"], "", $answerLC);
        $answerReplace = str_replace(["é", "è", "ê"], "e", $answerReplace);

        $userAnswerLength = strlen($userAnswerReplace);     // Calc lenght
        $answerLength = strlen($answerReplace);

        $marge = floor($answerLength * 0.2);
        $levenshtein = levenshtein($userAnswerReplace, $answerReplace);
        $margeLeven = floor($answerLength * 0.15);

        if ($userAnswerReplace == $answerReplace)   //win or lose
        {
            $successMessages = 'Tu as trouvé la bonne réponse !';
            $query = $pdo->query("UPDATE users SET score='$current_question' WHERE username='$current_user'");
            $current_question = switchQuestion();
            $question = getQuestion();
            $answer = getAnswer();
        }
        else if (($userAnswerLength) <= ($answerLength + $marge)
            && ($userAnswerLength) >= ($answerLength - $marge))
        {
            if($levenshtein==$margeLeven+1)
            {
                $successMessages = 'Tu as trouvé la bonne réponse !';
                $query = $pdo->query("UPDATE users SET score='$current_question' WHERE username='$current_user'");
                $current_question = switchQuestion();
                $question = getQuestion();
                $answer = getAnswer();
            }
            else if($levenshtein==($margeLeven+2))
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