<?php

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
    }
} else
{
    $link = 'SignIn';
    $page = 'signIn';
}


// Includes HTML
include_once 'views/partials/header.php';
include_once 'views/pages/'.$page.'.php';
include_once 'views/partials/footer.php';


