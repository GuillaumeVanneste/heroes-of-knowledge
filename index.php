<?php

session_start();

// Config 
include_once 'includes/config.php';

// Rooting
if(!empty($_GET['link']))
{
    $link = $_GET['link'];
    switch ($link)
    {
        case 'Home' :
            $page = 'home';
            break;
        
        case 'SignIn' :
            $page = 'signIn';
            break;

        case 'SignUp' :
            $page = 'signUp';
            break;

        case 'LogOut' :
            $page = 'logout';
            break;

        case 'Question' :
            $page = 'question';
            break;

        case 'Leaderboard' :
            $page = 'leaderboard';
            break;
    }
} else
{
    $link = 'Home';
    $page = 'home';
}


// Includes HTML
include_once 'views/partials/header.php';
include_once 'views/pages/'.$page.'.php';
include_once 'views/partials/footer.php';


