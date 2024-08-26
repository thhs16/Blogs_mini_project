<?php

    require_once('../db/00_db_connection.php');

    $post_id = $_GET['id'];

    $sql = "select image from post where id=?";
    $res = $pdo->prepare($sql);
    $res->execute([ $post_id ]);

    $img_post = $res->fetch(PDO::FETCH_ASSOC);

    $img_name_post = $img_post['image'];

    $delete_post_sql = "delete from post where id=?";
    $delete_res = $pdo->prepare($delete_post_sql);
    $delete_res->execute([ $post_id ]);

    unlink("../image/$img_name_post"); // delete file

    header("Location:./post_list_page.php");