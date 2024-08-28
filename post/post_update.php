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

        $id_joint_data = $res_joint->fetch(PDO::FETCH_ASSOC);

        $category_data = $res_categoryName->fetchAll(PDO::FETCH_ASSOC);

        // echo '<pre>';
        // print_r($category_data);
    ?>

    <div class="container mt-5">
            <div class="row">
                <div class="col-8 offset-2">
                <div class="my-5">
                    <a href="../post/post_list_page.php" class="text-dark"><i class="fa-solid fa-arrow-left"></i> Back</a>
                </div>
                    <div class="row">
                        <div class="col-4">
                            <img src="../image/download (6).jpg" class="img-thumbnail">
                            <input type="file" name="image" id="" class="form-control">
                        </div>

                        <div class="col">
                            <form action="">
                                <input type="text"  class="form-control" value="<?php echo $id_joint_data['title'] ?>" >
                                <textarea name=""  class="form-control" value="<?php echo $id_joint_data['description'] ?>" cols="30" rows="10"></textarea>

                                <?php
                                    foreach($category_data as $item){
                                        echo '<select name="" class="form-control" value="'.$item['name'].'" >
                                        <option value=""></option>
                                    </select>';
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>
    <!-- MDB JS link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js" integrity="sha512-orRaGPJ0tGeCLCvCIFl91votpjee7YknHTJ3/gew4zzp0EhqkPwYc6DXABjX9rWjOzbFEPi3g5QRecU3whJvkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- font awesome inclusive js link -->
    <script src="https://kit.fontawesome.com/905758c01a.js" crossorigin="anonymous"></script>

</html>
    