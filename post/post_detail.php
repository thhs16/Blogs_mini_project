<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Detail</title>
            <!-- MDB CSS link -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" integrity="sha512-ZKfM1qLFiJLgCvofeUynr29hrH/sibnrInRxJp/tW7neQzbrp1Ak53JJUxBKtAX9UreCiJ43aOveZyfQXYt92g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php 
        require_once('../db/00_db_connection.php');
        
        $post_id = $_GET['id'];

        // print_r($post_id);

        $sql = "select post.id , post.title, post.description, post.image, post.category_id , category.name as category_name
        from post
        left join category
        on post.category_id = category.id
        where post.id=?"; // has to define table name here instead of just id
        $res = $pdo->prepare($sql);
        $res->execute([$post_id]);

        $id_joint_data = $res->fetch(PDO::FETCH_ASSOC);

        // echo '<pre>';
        // print_r($id_joint_data);
    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-8 offset-2">
            <div class="my-5">
                <a href="../post/post_list_page.php" class="text-dark"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
                <div class="row">
                    <div class="col-4">
                        <img src="../image/<?php echo $id_joint_data['image']?>" class="img-thumbnail">
                    </div>

                    <div class="col">
                        <h3><?php echo $id_joint_data['title'] ?></h3>
                        <h5 class="text-danger"><?php echo $id_joint_data['category_name'] ?></h5>
                        <p class="text-muted"><?php echo $id_joint_data['description'] ?>
                        </p>
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