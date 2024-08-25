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

        echo '<pre>';
        print_r($jointData);
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
                            <input type="reset" value="Reset" class="btn btn-dark">
                        </div>
                    </form>
                    
                </div>

                <div class="col">
                    
                </div>
            </div>
        </div>
    <!-- Design End -->
</body>
    <!-- MDB JS link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js" integrity="sha512-orRaGPJ0tGeCLCvCIFl91votpjee7YknHTJ3/gew4zzp0EhqkPwYc6DXABjX9rWjOzbFEPi3g5QRecU3whJvkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- font awesome inclusive js link -->
    <script src="https://kit.fontawesome.com/905758c01a.js" crossorigin="anonymous"></script>
    <!-- img preview js -->
    <script src="../source/img_preview_post.js"></script> <!-- cuz of file path  -->
</html>