<?php
    session_start();

    if (isset($_POST['search'])) {
        if ($_POST['search']) {
            $search = $_POST['search'];
        } else {
            $search = null;
        }
    }

    header("location: ../../html/index.php?search=$search");
    exit();
?>