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
    <audio src="audios/audio-<?= $i ?>.mp3"
           controls
           autoplay
           loop>
    </audio>

<?php else : $i = $i / 2; ?>
    <video src="videos/video-<?= $i ?>.mp4"
           controls
           autoplay
           loop>
    </video>
<?php endif;
endif; ?>

<form action="#" method="post">
    <input id="user_answer" type="text" name="user_answer" autocomplete="off">
    <label for="user_answer">user_answer</label>
    <input type="submit">
</form>
    <br>
<form action="#" method="post">
    <input type="submit" value="<?= $clueTotal ?> clues left" name="clue" />
</form>