<?php
var_dump($_FILES);
for ($i=0; $i<count($_FILES['avatar']['name']); $i++ ){
    upload_file($_FILES['avatar']['name'][$i], $_FILES['avatar']['tmp_name'][$i]);
}
function upload_file($filename,$tmp_name){
    $result =pathinfo($filename);
    $filename = uniqid() . "." . $result['extension'];
    move_uploaded_file($tmp_name, 'upload/' . $filename);

    $avatar= $filename;
    $pdo = new PDO("mysql:host=localhost;dbname=qwert", "root", "");
    $sql = "UPDATE `login_table` SET avatar=:avatar WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        "avatar" => $avatar,
        "id" => 3
    ]);

}
function get_id(){
$pdo = new PDO("mysql:host=localhost;dbname=qwert", "root", "");
$statement = $pdo->query("SELECT * FROM `login_table` WHERE id=:id");
}
