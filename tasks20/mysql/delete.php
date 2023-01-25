<?php 
    $pdo = new PDO('mysql:host=localhost;dbname=qwert;','root', '');
    $sql = "DELETE FROM user WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute($_GET);

    
    header('Location: /tasks20/mysql/index.php');
    ?>