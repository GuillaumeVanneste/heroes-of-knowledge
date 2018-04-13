<?php
    include 'includes/handle_form_Crea.php';

    $query = $pdo->query('SELECT * FROM users'); // SignUp
    $connection = $query->fetchALL();

?>


    <div class="login">
        <div class="row">
            <div class="col s12 m4 offset-m4">
                <?php foreach($errorMessages as $message): ?>
                    <blockquote class="errorMessage"><?= $message ?></blockquote>
                <?php endforeach; ?>

                <?php foreach($successMessages as $message): ?>
                    <blockquote class="successMessage"><?= $message ?></blockquote>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="row">
            <form class="col s12 m4 offset-m4" action="#" method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="username" type="text" name="username" autocomplete="off"">
                        <label for="username">username</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="mail" type="text" name="mail" autocomplete="off"">
                        <label for="mail">mail</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="password" type="password" name="password" autocomplete="off"">
                        <label for="password">password</label>
                    </div>
                </div>

                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>
            </form>
        </div>
    </div>
