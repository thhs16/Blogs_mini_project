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

        require_once('../db/04_joining_two_tables.php');

        $allCateData = $res->fetchAll(PDO::FETCH_ASSOC);

        $jointData = $res_joint->fetchAll(PDO::FETCH_ASSOC);

        // echo '<pre>';
        // print_r($jointData);
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

                    <form action="./post_create.php" method="POST" enctype="multipart/form-data" >

                        <div class="">
                            <img id="output" class="w-100" src="">
                        </div>
                        <div class="mt-2">
                            <input type="file" name="post_img" class="form-control" onchange="loadfile(event)">
                        </div>
                        <div class="mt-2">
                            <input type="text" name="post_title" class="form-control" placeholder="Enter Title...">
                        </div>
                        <div class="mt-2">
                            <textarea name="post_description" class="form-control" placeholder="Enter Description..." cols="30" rows="10"></textarea>
                        </div>
                        <div class="mt-2">
                            <select name="category" class="form-control">
                                
                                <?php 
                                    foreach($allCateData as $item){
                                        echo $item;
                                        echo '<option value="'.$item['id'].'">'.$item['name'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mt-3">
                            <input type="submit" name="btn_create" value="Create" class="btn btn-primary">
                            <input type="reset" value="Reset" class="btn btn-danger">
                        </div>
                    </form>
                    
                </div>

                <div class="col">
                    <div class="row mt-5">

                            <?php
                                foreach($jointData as $item){
                                    
                                    echo '<div class="col-4 mt-3">
                                            <div class="card">
                                                <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                                                    <img src="../image/'.$item['image'].'" class="img-fluid" style="height : 150px" />
                                                    <a href="#!">
                                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title">'.$item['title'].'</h5>
                                                    <p class="card-text">'.mb_strimwidth($item['description'],0,50,'...').'</p>
                                                    <p class="card-text text-danger">'.$item['category_name'].'</p>

                                                    <div class="d-flex justify-content-between align-items-center" style="height :40px;">
                                                            <a href="./post_detail.php?id='.$item['id'].'" class="btn btn-dark" data-mdb-ripple-init>More Details</a>
                                                        
                                                            <a href="./post_update.php?id='.$item['id'].'" class="" data-mdb-ripple-init><i class="fa-solid fa-pen-to-square"></i></a> 

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