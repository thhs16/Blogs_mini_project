<?php

    require_once('../db/00_db_connection.php');

    // backend validation
    if( isset($_POST['btn_create'])){

        $error = [
            'ImgRequireStatus' => false,
            'titleRequireStatus' => false ,
            'descriptionRequireStatus' => false ,
            'categoryRequireStatus' => false ,

        ];

        $error['ImgRequireStatus'] = $_FILES['post_img']['name'] == "" ? true : false ; // True Require Status
        $error['titleRequireStatus'] = $_POST['post_title'] == "" ? true : false ;
        $error['descriptionRequireStatus'] = $_POST['post_description'] == "" ? true : false ;
        $error['categoryRequireStatus'] = $_POST['post_category'] == "" ? true : false ;

        // echo '<pre>';
        // print_r($error);
        // var_dump(!$error['ImgRequireStatus'] && !$error['titleRequireStatus'] && !$error['descriptionRequireStatus'] && !$error['categoryRequireStatus']);
        // false or true

        if(!$error['ImgRequireStatus'] && !$error['titleRequireStatus'] && !$error['descriptionRequireStatus'] && !$error['categoryRequireStatus']){

            // adding data in db
            $titlePost = $_POST['post_title'];
            $descriptionPost = $_POST['post_description'];
            $categoryIdPost = $_POST['post_category'];
        
            echo '<pre>';
            print_r($_FILES);
        
            $imgNPost = uniqid() . $_FILES['post_img']['name'];
            $tmpNPost = $_FILES['post_img']['tmp_name'];
        
            $targetFile = '../image/' . $imgNPost; // like putting on a server
        
            move_uploaded_file($tmpNPost, $targetFile);
        
            $sql = "insert into post (title,description,image,category_id) values (?,?,?,?)";
            $res = $pdo->prepare($sql);
            $res->execute([$titlePost , $descriptionPost , $imgNPost , $categoryIdPost]);
        
            header('Location:./post_list_page.php'); // reload post_list_page.php
        
            // $img_name = $_FILES[''];

        }

    }