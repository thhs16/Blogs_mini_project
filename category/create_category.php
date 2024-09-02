<?php
    require_once('../db/00_db_connection.php');

    $category_Require_Status = false;

    if ( isset( $_POST['btn_create'] )){

        if( $_POST['category'] != ""){

            $category = $_POST['category'];

            $sql = "insert into category (name) values (?)";
            $res = $pdo->prepare($sql);
            $res->execute([$category]); // Arr type

            // echo 'A new category is added to db';
            $category_Require_Status = false;
        } else {
            $category_Require_Status = true;
        }
        header('Location:./list_page.php');
        // header("Refresh:1");
    }