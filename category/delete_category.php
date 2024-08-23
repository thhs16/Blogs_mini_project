<?php

    require_once('../db/00_db_connection.php');

    #http://localhost/blogs_mini_project/category/delete_category.php?id=1

    // echo $_GET['id'];

    $sql = "delete from category where id=?";
    $res = $pdo->prepare($sql);
    $res->execute([ $_GET['id'] ]);
    
    // echo 'delete category success';

    header('Location:./list_page.php');

    