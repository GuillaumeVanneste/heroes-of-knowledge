<?php

include 'includes/answerVerif.php';

$query = $pdo->query('SELECT * FROM users');
$users = $query->fetchALL();

if($errorMessages) : ?>
<p><?= $errorMessages ?></p>
<?php endif;

if($successMessages) : ?>
<p><?= $successMessages ?></p>
<?php endif; ?>

<form action="#" method="post">
    <input id="user_answer" type="text" name="user_answer">
    <label for="user_answer">user_answer</label>

    <br>
      
    <input type="submit">
</form>