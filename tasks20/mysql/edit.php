<?php 
    $pdo = new PDO("mysql:host=localhost;dbname=qwert;","root", "");
    $sql = "SELECT * FROM user WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute($_GET);
    $user = $statement->fetch(PDO::FETCH_ASSOC); 
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $user["id"]; ?>"   >
            <input type="text" name="name" value="<?php echo $user["name"]; ?>">
            <input type="email" name="email" value="<?php echo $user["email"]; ?>" >
            <button type="submit">Edit</button>
        </form>
        </div>
</body>
</html>