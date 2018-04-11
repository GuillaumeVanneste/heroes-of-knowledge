<?php

    include 'includes/handle_form_Co.php';

    $query = $pdo->query('SELECT * FROM users');
    $users = $query->fetchALL();

?>


    <?php foreach($errorMessages as $message): ?>
        <p style="color: red;"><?= $message ?></p>
    <?php endforeach; ?>

    <?php foreach($successMessages as $message): ?>
        <p style="color: green;"><?= $message ?></p>
    <?php endforeach; ?>

    <form action="#" method="post">
        <input id="coMailName" type="text" name="coMailName">
        <label for="coMailName">CO MAIL NAME</label>

        <br>
      
        <input id="coPass" type="password" name="coPass">
        <label for="coPass">CoPass</label>

        <br>

      
        <input type="submit">
    </form>

<a href="index.php?link=SignUp">Sign Up</a>
  