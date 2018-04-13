<?php

include_once 'includes/answerVerif.php';
include_once 'includes/clue.php';


if($errorMessages) : ?>
    <div class="row">
        <div class="col s12 m6 offset-m3">
            <blockquote class="errorMessage"><?= $errorMessages ?></blockquote>
        </div>
    </div>
<?php endif;

if($successMessages) : ?>
    <div class="row">
        <div class="col s12 m6 offset-m3">
            <blockquote class="successMessage"><?= $successMessages ?></blockquote>
        </div>
    </div>
<?php endif; ?>

    <div class="row centered">
        <p class="col s12 m8 offset-m2 question"><?= $current_question.' - '.$question ?></p>
    </div>

<?php
if($current_question % 5 == 0) : $i = $current_question / 5;
if($i % 2 == 1) : ?>
    <section class="audio">
        <audio src="audios/audio-<?= $i ?>.mp3"
               autoplay
               loop>
        </audio>

        <div class="player">
            <div class="head">
                <div class="front">
                </div>
            </div>
            <div class="timeline">
                <div class="soundline">
                    <div class="current"></div>
                </div>
                <div class="controllers active">
                    <div class="play">
                        <i id="playIcon" class="fas fa-pause"></i>
                    </div>
                    <div class="pause"></div>
                </div>
            </div>
        </div>
    </section>

<?php else : $i = $i / 2; ?>
    <video class="responsive-video " src="videos/video-<?= $i ?>.mp4"
           controls
           autoplay
           loop>
    </video>
<?php endif;
endif; ?>


<div class="row">
    <form class="col s12 m8 offset-m2" action="#" method="post">
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">mode_edit</i>
                <input id="user_answer" type="text" name="user_answer" autocomplete="off">
                <label for="user_answer">Tapez votre réponse ici...</label>
            </div>
        </div>
    </form>
</div>

<div class="row">
    <form class="col s12 m8 offset-m2" action="#" method="post">
        <div class="row">
            <div class="col s12 m9">
                <p>
                    <?php if(!empty($_POST['clue'])) : if($clueTotal > 0 && $clueTotal <= 3) :
                        echo $textClue;
                    endif; endif; ?>
                </p>
            </div>
            <div class="col s12 offset-s3 m3">
                <button class="btn waves-effect waves-light" type="submit" value="clue" name="clue"><?= $clueTotal ?> Indices restants</button>
            </div>
        </div>
    </form>
</div>


<form action="#" method="post">

</form>