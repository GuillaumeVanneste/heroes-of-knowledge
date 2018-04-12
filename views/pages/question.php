<?php

include_once 'includes/answerVerif.php';
include_once 'includes/clue.php';

if($errorMessages) : ?>
<p><?= $errorMessages ?></p>
<?php endif;

if($successMessages) : ?>
<p><?= $successMessages ?></p>
<?php endif; ?>

<p><?= $question ?></p>

<?php
if($current_question % 5 == 0) : $i = $current_question / 5;
if($i % 2 == 1) : ?>
    <audio src="audios/audio-<?= $i ?>.mp3"></audio>
<? else : $i = $i / 2; ?>
    <video src="videos/video-<?= $i ?>.mp4"></video>
<? endif;
endif; ?>

<form action="#" method="post">
    <input id="user_answer" type="text" name="user_answer" autocomplete="off">
    <label for="user_answer">user_answer</label>
</form>
    <br>
<form action="#" method="post">
    <input type="submit" value="<?= $clueTotal ?> clues left" name="clue" />
    <input type="submit">
</form>