<?php
    require_once('../Classes/db_connect.php');
    require_once('../Classes/DataInsert.php');
    $conn = connectToDatabase();

    $desc = $_POST['desc'];
    $title = $_POST['title'];
    $tag = $_POST['tag'];

    $tag = str_replace("#", "", $tag);
    $dataInserter = new DataInserter($conn);

    $dataToInsert = [
        'title' => $title,
        'description' => mysqli_real_escape_string($conn, $desc),
        'tag' => $tag,
        'user_id' => '1',
    ];

    $dataInserter->insertData('posts', $dataToInsert);
    header('location: ../../html/index.php');
    $conn->close();
?>