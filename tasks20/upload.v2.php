<?php
session_start();
//var_dump($_FILES);
function uploadImg($fileName, $tmp) {
    // 1. название
    $imgName = $fileName;
    $imgNameInfo = pathinfo($imgName);
    $imgNameType = $imgNameInfo["extension"];
    $newNameImg = uniqid() . "." . $imgNameType; //63ea0f1bc1659.jpg

    // 2. сохранить
    $result = move_uploaded_file($tmp, 'uploads/' . $newNameImg);
    if ($result) {
        $result = $newNameImg;
    }
    return $result;
}
$arrListFiles =[];
$countArrayFiles = count($_FILES["file"]["name"]);
var_dump($countArrayFiles);
for ($i = 0; $i < $countArrayFiles; $i++) {
    $fileName = $_FILES['file']['name'][$i];
    $tmpName = $_FILES['file']['tmp_name'][$i];
    $arrListFiles[] = [uploadImg($fileName, $tmpName), $fileName];
}

//var_dump($arrListFiles);

$gallery = json_encode($arrListFiles);

function connectBD() {
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    $pdo = new PDO("mysql:host=localhost;dbname=qwert;", "root", "", $options);
    return $pdo;
}
$pdo = connectBD();
$sql = "INSERT INTO gallery (images) VALUES (:images)";
$statement = $pdo->prepare($sql);
$statement->execute([
    'images' => $gallery,
]);
$id = $pdo->lastInsertId();
$_SESSION["galleryID"] = $id;

header("Location: task_19v2.php");