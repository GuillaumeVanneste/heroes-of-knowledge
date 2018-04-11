<?php

    include 'includes/handle_form_Co.php';

    $query = $pdo->query('SELECT * FROM connection');
    $connection = $query->fetchALL();

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
  
      <h2>Users</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>username</th>
            <th>mail</th>
            <th>password</th>
        </tr>
      <?php foreach($connection as $_user): ?>
        <tr>
            <td><?= $_user->id ?></td>
            <td><?= $_user->username ?></td>
            <td><?= $_user->mail ?></td>
            <td><?= $_user->password ?></td>   
            <td><a href="index.php?page=delete&id=<?= $_user->id ?>" title="delete" >X </a></td>
        </tr>
      <?php endforeach; ?>
    </table>
  