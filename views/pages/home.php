<div class="home">
    <h1>Welcolme To Heroes Of Knowledge <?php if(!empty($current_user)) : echo $current_user; endif; ?> !</h1>

    <div class="row">
        <div class="col s12 m4 offset-m7">
            <diw class="row">
                <dic class="col s12">
                    <p>Test your knowledge on the univers of DC and Marvel with our new quiz ! Challenge your friends and become the heroes expert !</p>
                </dic>
            </diw>
            <div class="row">
                <div class="col s6 offset-s3 m6 offset-m6">
                    <a href="index.php?link=<?php if(empty($_SESSION['username'])) : ?>signin<?php else : ?>question<?php endif; ?>">
                        <button class="btn waves-effect waves-light" type="submit" name="action">
                            Go to the quiz
                            <i class="material-icons right">send</i>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
