<?php

    $query = $pdo->query('SELECT * FROM users ORDER BY score DESC');
    $connection = $query->fetchALL();
    $i=0;


   // $query = $pdo->query('UPDATE users SET score='.$Question' WHERE username='.$username)

?>

  
      <h2>Leaderboard</h2>

    <table>
        <tr>
            <th>score</th>
            <th>username</th>
        </tr>
      <?php foreach($connection as $_user):
          if($i<10){      ?>
        <tr>
            <td><?= $_user->score ?></td>
            <td><?= $_user->username ?></td> 
        </tr>
      <?php 
         $i++;   }
          endforeach; ?>
    </table>
