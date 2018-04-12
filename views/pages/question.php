<?php

include 'includes/answerVerif.php';

if($errorMessages) : ?>
<p><?= $errorMessages ?></p>
<?php endif;

if($successMessages) : ?>
<p><?= $successMessages ?></p>
<?php endif; ?>

<p><?= $question ?></p>

<form action="#" method="post">
    <input id="user_answer" type="text" name="user_answer" autocomplete="off">
    <label for="user_answer">user_answer</label>

    <br>
      
    <input type="submit">
</form>