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

        $userAnswerReplace = str_replace([" ", ",", ":", "#", "%", "$", ".", "?", "!", "/", "-", "+", "_", "<", ">", "=", "(", ")", "~", "*", "the"], "", $userAnswerLC);  // retirer les caracteres relou
        $answerReplace = str_replace([" ", ",", ":", "#", "%", "$", ".", "?", "!", "/", "-", "+", "_", "<", ">", "=", "(", ")", "~", "*", "the"], "", $answerLC);

        $userAnswerLength = strlen($userAnswerReplace);     // Calc lenght
        $answerLength = strlen($answerReplace);

        $marge = floor($answerLength * 0.2);
        $levenshtein = levenshtein($userAnswerReplace, $answerReplace);
        $margeLeven = floor($answerLength * 0.10);

        if ($userAnswerReplace == $answerReplace)
        {
            $successMessages = 'Tu as trouvé la bonne réponse !';
            $query = $pdo->query("UPDATE users SET score='$current_question'");
            $current_question = switchQuestion();
            $question = getQuestion();
            $answer = getAnswer();
        }
        else if (($userAnswerLength) <= ($answerLength + $marge)
            && ($userAnswerLength) >= ($answerLength - $marge))
        {
            if($levenshtein==$margeLeven)
            {
                $successMessages = 'Tu as trouvé la bonne réponse !';
                $query = $pdo->query("UPDATE users SET score='$current_question'");
                $current_question = switchQuestion();
                $question = getQuestion();
                $answer = getAnswer();
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