<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
                <!-- MDB CSS link -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" integrity="sha512-ZKfM1qLFiJLgCvofeUynr29hrH/sibnrInRxJp/tW7neQzbrp1Ak53JJUxBKtAX9UreCiJ43aOveZyfQXYt92g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    
    <?php 
        require_once('../db/00_db_connection.php');

        require_once('../db/05_id_joining_two_tables.php');

        require_once('../db/06_category_name.php');

        if( isset($_POST['btn_update']) ){
            require_once('./post_update.php');
        }

        $id_joint_data = $res_joint->fetch(PDO::FETCH_ASSOC);

        $category_data = $res_categoryName->fetchAll(PDO::FETCH_ASSOC);

        // echo '<pre>';
        // print_r($id_joint_data);
        // print_r($id_joint_data['description']);
        // print_r($category_data);
    ?>

    <div class="container mt-5">
            <div class="row">
                <div class="col-8 offset-2">

                    <div class="my-5">
                        <a href="../post/post_list_page.php" class="text-dark"><i class="fa-solid fa-arrow-left"></i> Back</a>
                    </div>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-4">
                                <img src="../image/<?php echo $id_joint_data['image']?>" id="output" class="img-thumbnail">
                                <input type="file" name="update_image" onchange="loadfile(event)" class="form-control mt-2">
                            </div>

                            <div class="col-8">
                                    <!-- title update -->
                                    <input type="text" name="update_title" class="form-control" value="<?php echo $id_joint_data['title'] ?>" >
                                        <?php 
                                           if( isset( $_POST['btn_update'] )){
                                            if($error['titleRequireStatus']){
                                                echo '<small class="text-danger">*Title Required</small>' ;
                                            }
                                        }
                                        ?>

                                    <!-- description update -->
                                    <textarea name="update_description"  class="form-control mt-3" cols="30" rows="10"><?php echo $id_joint_data['description'] ?></textarea> 
                                    <!-- textarea tag does not support the value attribute -->
                                        <?php 
                                            if( isset( $_POST['btn_update'] )){
                                                if($error['descriptionRequireStatus']){
                                                    echo '<small class="text-danger">*Description Required</small>' ;
                                                }
                                            }
                                            ?>
                                    <!-- category update -->
                                    <select name="update_category" class="form-control mt-3" value="" >
                                    <option value="" selected>Choose Category...</option>
                                    <?php
                                        foreach($category_data as $item){
                                            switch($id_joint_data['category_name']){
                                                case $item['name'] : echo '<option value="     '.$item['id'].'    " selected>'.$item['name'].'</option>';break;
                                                default : echo '<option value="     '.$item['id'].'    ">'.$item['name'].'</option>';
                                            }
                                        }
                                    ?>
                                    </select>
                                        <?php 
                                            if( isset( $_POST['btn_update'] )){
                                                if($error['categoryRequireStatus']){
                                                    echo '<small class="text-danger">*Category Required</small>' ;
                                                }
                                            }
                                            ?>

                                    <input type="submit" name="btn_update" class="btn btn-dark mt-3" value="Update">
                            </div>
                        </div>
                    </form>

                    
                </div>
            </div>
        </div>

</body>
    <!-- MDB JS link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js" integrity="sha512-orRaGPJ0tGeCLCvCIFl91votpjee7YknHTJ3/gew4zzp0EhqkPwYc6DXABjX9rWjOzbFEPi3g5QRecU3whJvkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- font awesome inclusive js link -->
    <script src="https://kit.fontawesome.com/905758c01a.js" crossorigin="anonymous"></script>
    <!-- my img preview js -->
    <script src="../source/img_preview_post.js"></script> <!-- cuz of file path  -->

</html>
    