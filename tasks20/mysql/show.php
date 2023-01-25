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
    <div class="cont">
        <div class="wrap">
            <div class="name">
                <p class="p_m1">Name: </p>
                <p><?php echo " " .$user["name"] ?></p>
            </div>
            <div class="email">
                <p class="p_m1">Email:</p>
                <p><?php echo " " .$user["email"] ?></p>
            </div>
        </div>
    </div>

        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing:border-box;
            }
            .cont{
                margin-top: 20px;
                width: 100%;
                display: flex;
                justify-content: center;
            }
            p{
                font-size:25px;
            }
            .name{
                display: flex;
            }
            .email{
                display: flex;
            }
            .p_m1{
                color: #227c77;
                margin-right: 20px;
            }

    </style>
</body>
</html>