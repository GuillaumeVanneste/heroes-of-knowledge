<h1>Welcolme <? if(!empty($current_user)) : echo $current_user; endif; ?> !</h1>

<?php if(!empty($_SESSION['username'])) : ?>
<a href="index.php?link=logOut">Log Out</a>
<a href="index.php?link=question">Question</a>
<?php else: ?>
<a href="index.php?link=signin">Sign In</a>
<a href="index.php?link=signup">Sign Up</a>
<?php endif; ?>
<a href="index.php?link=leaderboard">Leaderboard</a>