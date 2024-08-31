<?php

    $error = [
        'ImgRequireStatus' => true,
        'titleRequireStatus' => false ,
        'descriptionRequireStatus' => false ,
        'categoryRequireStatus' => false ,

    ];

    // echo '<pre>';
    // print_r($_FILES);

    // $error['ImgRequireStatus'] = $_FILES['update_image']['name'] == "" ? true : false ;

    $error['titleRequireStatus'] = $_POST['update_title'] == "" ? true : false ;
    $error['descriptionRequireStatus'] = $_POST['update_description'] == "" ? true : false ;
    $error['categoryRequireStatus'] = $_POST['update_category'] == "" ? true : false ;

    if( !$error['ImgRequireStatus'] && !$error['titleRequireStatus'] && !$error['descriptionRequireStatus'] && !$error['categoryRequireStatus'] ){

        // updating data in db
        $titlePost = $_POST['update_title'];
        $descriptionPost = $_POST['update_description'];
        $categoryIdPost = $_POST['update_category'];
        
        // // image
        // $imgNPost = uniqid() . $_FILES['update_image']['name'];
        // $tmpNPost = $_FILES['update_image']['tmp_name'];
    
        // $targetFile = '../image/' . $imgNPost;  // pathway | location 
        
        // // like uploading image on a server
        // move_uploaded_file($tmpNPost, $targetFile);
    
        // $sql = "insert into post (title,description,image,category_id) values (?,?,?,?)";
        // $res = $pdo->prepare($sql);
        // $res->execute([$titlePost , $descriptionPost , $imgNPost , $categoryIdPost]);    
    }