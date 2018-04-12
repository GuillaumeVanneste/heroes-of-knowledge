<h1>Welcolme <?= $_SESSION['username']->username ?> !</h1>

<?php if(!empty($_SESSION['username'])) : ?>
<a href="index.php?link=LogOut">Log Out</a>
<?php else: ?>
<a href="index.php?link=SignIn">Sign In</a>
<a href="index.php?link=SignUp">Sign Up</a>
<?php endif; ?>
<a href="index.php?link=Question">Question</a>
<a href="index.php?link=Leaderboard">Leaderboard</a>