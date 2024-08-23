<?php

    require_once('../db/00_db_connection.php');

    // echo $_GET['id'];

    if( isset ( $_POST['update_btn'] ) ){
        $sql = "update category set name=? where id=?";
        $res = $pdo->prepare($sql);
        $res->execute([$_POST['new_category_name'] , $_GET['id']]);

        // echo 'success'; // not showing this

        header('Location:./list_page.php');

    }