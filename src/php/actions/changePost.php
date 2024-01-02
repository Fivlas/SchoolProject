<?php
session_start();

if (!isset($_POST['author']) && !isset($_POST['postId']) && !isset($_SESSION['id']) && !isset($_SESSION['isAdmin'])) {
    exit();
}

if (($_POST['author'] == $_SESSION['id']) || $_SESSION['isAdmin'] == 1) {
    require_once('../Classes/db_connect.php');
    require_once('../Classes/QueryBuilder.php');
    require_once('../Classes/DeleteRows.php');
    
    $conn = connectToDatabase();
    $queryBuilder = new SQLQueryBuilder('posts', $conn);
    $postId = $_POST['postId'];
    $updateCondition = "id = $postId";

    if (isset($_POST['desc']) && !empty($_POST['desc'])) {
        $updatedDesc = ['description' => $_POST['desc']];
        $queryBuilder->update($updatedDesc, $updateCondition);
    }

    if (isset($_POST['tag'])) {
        $updatedTag = ['tag' => $_POST['tag']];
        $queryBuilder->update($updatedTag, $updateCondition);
    }

    if (isset($_POST['title']) && !empty($_POST['title'])) {
        $updatedTitle = ['title' => $_POST['title']];
        $queryBuilder->update($updatedTitle, $updateCondition);
    }

    if (isset($_FILES["img"]) && $_FILES["img"]["error"] == UPLOAD_ERR_OK) {
        $uploadDir = "../uploads/";

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $trimSpaces = str_replace(' ', '', basename($_FILES["img"]["name"]));
        $uploadFile = $uploadDir . uniqid() . '_' . $trimSpaces;

        if (move_uploaded_file($_FILES["img"]["tmp_name"], $uploadFile)) {

            $fileName = basename($uploadFile);
            $fileName = $conn->real_escape_string($fileName);

            $updatePostImg = ['img' => $fileName];
            $queryBuilder->update($updatePostImg, $updateCondition);
        }
    }

    $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
    header("Location: $referer");
    $conn->close();
    exit();
}

?>