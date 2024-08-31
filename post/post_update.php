<?php

    $error = [
        'ImgRequireStatus' => false,
        'titleRequireStatus' => false ,
        'descriptionRequireStatus' => false ,
        'categoryRequireStatus' => false
    ];

    $error['titleRequireStatus'] = $_POST['update_title'] == "" ? true : false ;
    $error['descriptionRequireStatus'] = $_POST['update_description'] == "" ? true : false ;
    // $error['categoryRequireStatus'] = $_POST['update_category'] == "" ? true : false ;   // category is ok not to be validated because this is update page

    if( !$error['titleRequireStatus'] && !$error['descriptionRequireStatus']){

        // updating data in db
        $post_update_id = $_POST['post_update_id'];
        $titlePost = $_POST['update_title'];
        $descriptionPost = $_POST['update_description'];
        $categoryIdPost = $_POST['update_category'];

        
        // image # testing
        if( $_FILES['update_image']['name'] != ""){

            // deleting old photo - first way
            // $sql_photo_name = 'select image from post where id=?';
            // $res_photo_name = $pdo->prepare($sql_photo_name);
            // $res_photo_name->execute([$post_update_id]);

            // $original_photo_name = $res_photo_name->fetch(PDO::FETCH_ASSOC);
            // unlink("../image/" . $original_photo_name['image']);

            // deleting old photo - second way # shorter
            $old_photo_name = $_POST['db_old_img'];
            unlink("../image/" . $old_photo_name); // works

            echo '<pre>';
            echo $old_photo_name;


            $imgNPost = uniqid() . $_FILES['update_image']['name'];

            $tmpNPost = $_FILES['update_image']['tmp_name'];
        
            $targetFile = '../image/' . $imgNPost;  # pathway | location 

            // echo $imgNPost . '<br>';
            // echo $tmpNPost . '<br>'; # null
            // echo $targetFile . '<br>'; # only uniqid
            
            // like uploading image on a server
            move_uploaded_file($tmpNPost, $targetFile); # return false if parameter are not valid 

            // updating data on db
            $sql = " update post set title=? , description=? , image=? , category_id=? where id=? ";
            $res = $pdo->prepare($sql);
            $res->execute([$titlePost , $descriptionPost , $imgNPost, $categoryIdPost, $post_update_id]); 
        } else {
            
            // updating data on db
            // image name in db does not change because there is no query for it
            $sql = " update post set title=? , description=?  , category_id=? where id=? ";
            $res = $pdo->prepare($sql);
            $res->execute([$titlePost , $descriptionPost , $categoryIdPost, $post_update_id]);
        }

        header("Location:./post_list_page.php");
    }