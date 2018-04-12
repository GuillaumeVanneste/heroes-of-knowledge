<?php

    include 'includes/handle_form_Co.php';

    $query = $pdo->query('SELECT * FROM users');  // Sign IN
    $users = $query->fetchALL();

?>

    <div class="row">
        <div class="col s12">
            <?php foreach($errorMessages as $message): ?>
                <p style="color: red;"><?= $message ?></p>
            <?php endforeach; ?>

            <?php foreach($successMessages as $message): ?>
                <p style="color: green;"><?= $message ?></p>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="row">
        <form class="col s12 m4 offset-m4" action="#" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input id="coMailName" type="text" name="coMailName" autocomplete="off">
                    <label for="coMailName">Mail</label>
                </div>
                <div class="input-field col s12">
                    <input id="coPass" type="password" name="coPass" autocomplete="off">
                    <label for="coPass">Password</label>
                </div>
            </div>

            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>