<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="cont">
        <form action="/tasks20/mysql/store.php" method="post">
            <label>Name
                <input type="text" name="name">
            </label>
            <label>Mail
                <input type="email" name="email">
            </label>
            <button type="submit">Create</button>
        </form>
        </div>

        <style>
            *{
                margin: 0;
                padding: 0;
            }
            .cont{
                margin-top: 10px;
            }
            form input,button,label{
                display: block;
                margin: 0 auto;
                margin-top: 10px;
                text-align: center;
            }
            label{
                text-decoration: none;
                color:#227c77;
                font-weight: normal;
            }
            input{
                height: 30px;
                border-radius: 20px;
                border: 2px solid #58fbf3;
                color: #227c77;
                padding: 2px 4px;
            }
            button{
                padding: 5px 10px;
                border-radius:15%;
                text-decoration: none;
                border: none;
                color:#ffff00;
                background-color: #00d8db;
            }
        </style>
</body>
</html>