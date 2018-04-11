<?php
    include 'includes/handle_form_Crea.php';

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
  
