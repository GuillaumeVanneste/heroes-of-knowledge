<?php

session_start();

if(!empty($_SESSION['username']))
    $current_user = $_SESSION['username']->username;

// Config 
include_once 'includes/config.php';

// Rooting
if(!empty($_GET['link']))
{
    $link = $_GET['link'];
    switch ($link)
    {
        case 'home' :
            $page = 'home';
            break;
        
        case 'signin' :
            $page = 'signIn';
            break;

        case 'signup' :
            $page = 'signUp';
            break;

        case 'logOut' :
            $page = 'logout';
            break;

        case 'question' :
            $page = 'question';
            break;

        case 'leaderboard' :
            $page = 'leaderboard';
            break;

        case 'add' :
            $page = 'add';
            break;
    }
} else
{
    $link = 'home';
    $page = 'home';
}


// Includes HTML
include_once 'views/partials/header.php';
include_once 'views/pages/'.$page.'.php';
include_once 'views/partials/footer.php';


