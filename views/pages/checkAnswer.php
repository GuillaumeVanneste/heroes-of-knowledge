<?php
    include 'includes/config.php';
    include 'includes/answerVerif.php';

    $query = $pdo->query('SELECT * FROM connection');
    $connection = $query->fetchALL();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/style.css">
    <title>Document</title>
</head>
<body>


    <form action="#" method="post">
        <input id="rep" type="text" name="rep">
        <label for="rep">REP</label>

        <br>
      
        <input type="submit">
    </form>
  
  
</body>
</html>