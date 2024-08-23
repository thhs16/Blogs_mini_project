<?php
    require_once('../db/00_db_connection.php');

    if ( isset( $_POST['btn_create'] )){

        $category = $_POST['category'];

        $sql = "insert into category (name) values (?)";
        $res = $pdo->prepare($sql);
        $res->execute([$category]); // Arr type

        // echo 'A new category is added to db';
        header('Location:./list_page.php');
    }