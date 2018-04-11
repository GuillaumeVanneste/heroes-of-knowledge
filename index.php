<?php

// Rooting
if(!empty($_GET['link']))
{
    $link = $_GET['link'];
    switch ($link)
    {
        case 'Home' :
            $page = 'home';
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


