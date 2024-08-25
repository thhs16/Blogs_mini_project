<?php

    require_once('../db/00_db_connection.php');
    
    $titlePost = $_POST['post_title'];
    $descriptionPost = $_POST['post_description'];
    $categoryIdPost = $_POST['category'];

    echo '<pre>';
    print_r($_FILES);

    $imgNPost = ($_FILES['post_img']['name']);
    $tmpNPost = ($_FILES['post_img']['tmp_name']);

    $targetFile = '../image/' . $imgNPost; // like putting on a server

    move_uploaded_file($tmpNPost, $targetFile);

    $sql = "insert into post (title,description,image,category_id) values (?,?,?,?)";
    $res = $pdo->prepare($sql);
    $res->execute([$titlePost , $descriptionPost , $imgNPost , $categoryIdPost]);

    header('Location:./post_list_page.php');

    // $img_name = $_FILES[''];