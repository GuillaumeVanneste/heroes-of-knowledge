<?php

    $query = $pdo->query('SELECT * FROM users ORDER BY score DESC');
    $users = $query->fetchALL();
    $i = 1;


   // $query = $pdo->query('UPDATE users SET score='.$Question' WHERE username='.$username)

?>

  
    <h2>Leaderboard</h2>

    <div class="row">
        <div class="col s12 m8 offset-m2">
            <table class="centered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Score</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $_user):
                        if($i<=10) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $_user->username ?></td>
                                <td><?= $_user->score ?></td>
                            </tr>
                            <?php
                            $i++;
                        endif;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
