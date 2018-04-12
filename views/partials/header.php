<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Heroes of Knowledge - <?= $link ?></title>

    <link rel="stylesheet" href="styles/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
    <link rel="manifest" href="images/favicon/site.webmanifest">
    <link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">

</head>
<body>


    <nav class="nav-extended">
        <div class="nav-wrapper">
            <a href="index.php?link=home" class="brand-logo"><img class="logo" src="images/logo.png" alt="logo"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li class="tab"><a href="index.php?link=home">Home</a></li>
                <li class="tab"><a href="index.php?link=leaderboard">Leaderboard</a></li>
                <?php if(!empty($_SESSION['username'])) : ?>
                    <li class="tab"><a href="index.php?link=question">Quiz</a></li>
                    <li><a href="index.php?link=logOut">Log Out</a></li>
                <?php else: ?>
                    <li><a href="index.php?link=signin">Sign In</a></li>
                    <li><a href="index.php?link=signup">Sign Up</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li class="tab"><a href="index.php?link=home">Home</a></li>
        <li class="tab"><a href="index.php?link=leaderboard">Leaderboard</a></li>
        <?php if(!empty($_SESSION['username'])) : ?>
            <li class="tab"><a href="index.php?link=question">Quiz</a></li>
            <li><a href="index.php?link=logOut">Log Out</a></li>
        <?php else: ?>
            <li><a href="index.php?link=signin">Sign In</a></li>
            <li><a href="index.php?link=signup">Sign Up</a></li>
        <?php endif; ?>
    </ul>

<main>