<?php
    require_once('../Classes/db_connect.php');
    require_once('../Classes/DataInsert.php');
    $conn = connectToDatabase();

    $desc = $_POST['desc'];
    $tag = $_POST['tag'];

    $tag = str_replace("#", "", $tag);
    $dataInserter = new DataInserter($conn);

    $dataToInsert = [
        'description' => $desc,
        'tag' => $tag,
        'user_id' => '1',
    ];

    $dataInserter->insertData('posts', $dataToInsert);
    $conn->close();
?>