<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post List Page</title>
        <!-- MDB CSS link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" integrity="sha512-ZKfM1qLFiJLgCvofeUynr29hrH/sibnrInRxJp/tW7neQzbrp1Ak53JJUxBKtAX9UreCiJ43aOveZyfQXYt92g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    <?php 
        require_once('../db/00_db_connection.php');

        require_once('../db/all_category_data.php');

        require_once('../db/07_sorting_post.php');

        // putting post data in DB from the form tag
        require_once('./post_create.php');

        $allCateData = $res_all_category->fetchAll(PDO::FETCH_ASSOC);

        $jointData = $res_joint->fetchAll(PDO::FETCH_ASSOC);

        // echo '<pre>';
        // print_r($allCateData);
    ?>



    <!-- Design Start -->
    <div class="container mt-5">
            <div class="row">
                <div class="col-2 offset-5 text-center">
                    <?php 
                        require_once('../source/nav.php');
                    ?>
                </div>
            </div>
            <div class="row">

                <div class="col-4 p-5">

                <!-- form start -->
                    <form action="" method="POST" enctype="multipart/form-data" >

                    <!-- img preview -->
                        <div class="">
                            <img id="output" class="w-100" src="">
                        </div>
                        <div class="mt-2">
                            <input type="file" name="post_img" class="form-control" onchange="loadfile(event)">
                            
                            <?php 
                                if( isset( $_POST['btn_create'] )){
                                    if($error['ImgRequireStatus']){
                                        echo '<small class="text-danger">*Image Required</small>' ;
                                    }
                                }
                            ?>
                        </div>
                    <!-- title input tag -->
                        <div class="mt-2">
                            <input type="text" name="post_title" class="form-control" value="<?php  echo $_POST['post_title'] ?? "";    ?>" placeholder="Enter Title...">
                            
                            <?php 
                                if( isset( $_POST['btn_create'] )){
                                    if($error['titleRequireStatus']){
                                        echo '<small class="text-danger">*Title Required</small>' ;
                                    }
                                }
                            ?>
                        </div>
                    <!-- description input tag -->
                        <div class="mt-2">
                            <textarea name="post_description" class="form-control" placeholder="Enter Description..." cols="30" rows="10"><?php  echo $_POST['post_description'] ?? "";    ?></textarea>

                            <?php 
                                if( isset( $_POST['btn_create'] )){
                                    if($error['descriptionRequireStatus']){
                                        echo '<small class="text-danger">*Description Required</small>' ;
                                    }
                                }
                            ?>
                        </div>
                    <!-- category select tag -->
                        <div class="mt-2">
                            <select name="post_category" class="form-control">

                            <option value="">Category Name ...</option>;
                            
                                <?php 
                                    foreach($allCateData as $item){
                                        // echo $item;
                                        // why isset category
                                        echo '<option value="'.$item['id'].' " '. ( isset($_POST['post_category']) && $_POST['post_category'] == $item['id'] ? 'selected' : '' ).' > '.$item['name'].'</option>';
                                    }
                                ?>
                            </select>
                            <?php 
                                if( isset( $_POST['btn_create'] )){
                                    if($error['categoryRequireStatus']){
                                        echo '<small class="text-danger">*Category Required</small>' ;
                                    }
                                }
                            ?>
                        </div>
                        <div class="mt-3">
                            <input type="submit" name="btn_create" value="Create" class="btn btn-primary">
                            <input type="reset" value="Reset" class="btn btn-danger">
                        </div>
                    </form>
                    
                </div>

                <div class="col">
                    <!-- sorting bar -->
                    <div class="mt-3">
                                <a href="./post_list_page.php"><button class="me-3 mt-2 btn btn-secondary btn-rounded btn-sm" >All</button></a>
                                <?php 
                                    
                                    foreach($allCateData as $item){
                                        echo '<a href="./post_list_page.php?category='.$item['id'].'"><button class="me-3 mt-2 btn btn-secondary btn-rounded btn-sm" >'.$item['name'].'</button></a>';
                                    }
                                ?>
                    </div>

                    <div class="row mt-3">

                            <?php
                                foreach($jointData as $item){
                                    
                                    echo '<div class="col-4 mt-3">
                                    <!-- in real life, no body writes only one words in blogs -->
                                            <div class="card" style="max-height:450px;">
                                                <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                                                    <img src="../image/'.$item['image'].'" class="img-fluid" style="width: 100%; height: 15vw; object-fit: cover;" />
                                                    <a href="./post_detail.php?id='.$item['id'].'">
                                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title" style="height: 50px;">'.mb_strimwidth($item['title'],0,30,'...').'</h5>
                                                    <p class="card-text">'.mb_strimwidth($item['description'],0,50,'...').'</p>
                                                    <p class="card-text text-danger">'.$item['category_name'].'</p>

                                                    <div class="d-flex justify-content-between align-items-center" style="height :40px;">
                                                            <a href="./post_detail.php?id='.$item['id'].'" class="btn btn-dark" data-mdb-ripple-init>More Details</a>
                                                        
                                                            <a href="./post_update_page.php?id='.$item['id'].'" class="" data-mdb-ripple-init><i class="fa-solid fa-pen-to-square"></i></a> 

                                                            <a href="./post_delete.php?id='.$item['id'].'" class="text-danger me-3" data-mdb-ripple-init><i class="fa-solid fa-trash"></i></a>
                                                    
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>';
                                }
                            ?>
                    </div>
                </div>
                    
            </div>
            
    </div>
    <!-- Design End -->
</body>
    <!-- MDB JS link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js" integrity="sha512-orRaGPJ0tGeCLCvCIFl91votpjee7YknHTJ3/gew4zzp0EhqkPwYc6DXABjX9rWjOzbFEPi3g5QRecU3whJvkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- font awesome inclusive js link -->
    <script src="https://kit.fontawesome.com/905758c01a.js" crossorigin="anonymous"></script>

    <!-- my img preview js -->
    <script src="../source/img_preview_post.js"></script> <!-- cuz of file path  -->
</html>

<!-- <div class="row">
    <div class="col-4">
        <a href="#!" class="btn btn-dark" data-mdb-ripple-init>More Details</a>
    </div>
    
    <div class="col-4">
        <a href="./post_delete.php?id='.$item['id'].'" class="btn btn-danger" data-mdb-ripple-init><i class="fa-solid fa-trash"></i></a>
    </div>

    <div class="col-4">
        <a href="#!" class="btn btn-danger" data-mdb-ripple-init><i class="fa-solid fa-pen-to-square"></i></a>
    </div>  
</div> -->

<!-- <div class="row">
        <a href="#!" class="col-4 btn btn-dark" data-mdb-ripple-init>More Details</a>
    
        <a href="./post_delete.php?id='.$item['id'].'" class="col-4 btn btn-danger " data-mdb-ripple-init><i class="fa-solid fa-trash"></i></a>

        <a href="#!" class="col-4 btn btn-danger" data-mdb-ripple-init><i class="fa-solid fa-pen-to-square"></i></a> 
</div> -->

<!-- <div class="row" style="height : 50px" >
                                                            <a href="#!" class="btn btn-dark" data-mdb-ripple-init>More Details</a>
                                                        
                                                            <a href="./post_delete.php?id='.$item['id'].'" class="btn btn-danger " data-mdb-ripple-init><i class="fa-solid fa-trash"></i></a>

                                                            <a href="#!" class="btn btn-danger" data-mdb-ripple-init><i class="fa-solid fa-pen-to-square"></i></a> 
                                                    </div> -->