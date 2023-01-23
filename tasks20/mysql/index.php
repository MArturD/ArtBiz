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
    $pdo = new PDO("mysql:host=localhost;dbname=qwert;","root", ""); // подключение к базе данных
    $statement = $pdo->prepare("SELECT * FROM user"); // выводит все строки таблицы user
    $statement->execute(); // выполняет запрос и получает данные из БД
    $users = $statement->fetchALL(PDO::FETCH_ASSOC); // передаем данные в переменную users
    ?>
    <div class="cont">
        <div class="creat">
            <a href="create.php" class="create">Create</a>
        </div>
        <table>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <div class="top">
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user["id"] ?></td>
                    <td><?php echo $user["name"] ?></td>
                    <td><?php echo $user["email"] ?></td>
                    <td>
                        <a href="#">Show</a>
                        <a href="#">Edit</a>
                        <a href="#">Delete</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </div>
            </table>
        </div>
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