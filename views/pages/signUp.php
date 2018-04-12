<?php
    include 'includes/handle_form_Crea.php';

    $query = $pdo->query('SELECT * FROM users');
    $connection = $query->fetchALL();

?>



    <?php foreach($errorMessages as $message): ?>
        <p style="color: red;"><?= $message ?></p>
    <?php endforeach; ?>

    <?php foreach($successMessages as $message): ?>
        <p style="color: green;"><?= $message ?></p>
    <?php endforeach; ?>

    <form action="#" method="post">
        <input id="username" type="text" name="username" autocomplete="off"">
        <label for="username">username</label>

        <br>

        <input id="mail" type="mail" name="mail" autocomplete="off"">
        <label for="mail">mail</label>

        <br>

        <input id="password" type="password" name="password" autocomplete="off"">
        <label for="password">password</label>

        <br>


        <input type="submit">
    </form>
