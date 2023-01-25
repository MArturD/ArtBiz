<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $pdo = new PDO("mysql:host=localhost;dbname=qwert;","root", "");
    $statement = $pdo->prepare("SELECT * FROM user WHERE id=:id");
    $statement->execute($_GET); 
    $user = $statement->fetch(PDO::FETCH_ASSOC); 
    ?>
    <h1><?php echo $user["name"] ?></h1>
    <p><?php echo $user["email"]</p>

        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing:border-box;
            }
            .create{
                background-color: orange;
                border-radius:15%;
                padding: 5px;
            }
            .creat{
                margin-top: 20px;
            }
           .cont{
            display: flex;
            justify-content: center;
           }
           th{
            width: 125px;
           }
           a{;
            background-color: #329eff;
            border-radius: 5px;
            color: black;
            text-decoration: none;
            padding: 2px;
           }
           td{
            pading-top: 20px;
            text-align: center;
           }
    </style>
</body>
</html>