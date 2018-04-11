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
        <input id="username" type="text" name="username" value="<?= $_POST['username'] ?>">
        <label for="username">username</label>

        <br>

        <input id="mail" type="mail" name="mail" value="<?= $_POST['mail'] ?>">
        <label for="mail">mail</label>

        <br>

        <input id="password" type="password" name="password" value="<?= $_POST['password'] ?>">
        <label for="password">password</label>

        <br>


        <input type="submit">
    </form>

<a href="index.php?link=SignIn">Sign In</a>
