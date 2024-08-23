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

    <!-- Recieving data from db -->
    <?php
        $idCategory = $_GET['id'];

        require_once('../db/db_category_data_id.php');

        // echo '<pre>';
        // echo $_GET['id'];
        // print_r($dataCategory);
    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-4 offset-4 p-5 shadow">
                <form action="" method="POST">
                    <input type="text" name="new_category_name" value="<?php echo $dataCategory['name']; ?>" class="form-control">
                    <input type="submit" name="update_btn" value="update" class="btn btn-primary mt-3">
                    <a href="./list_page.php"><input type="button" name="back_btn" value="Go Back" class="btn btn-danger mt-3"></a>
                </form>
            </div>
        </div>
    </div>

    <?php 
        require_once('./update_category.php'); 
    ?>
</body>
    <!-- MDB JS link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js" integrity="sha512-orRaGPJ0tGeCLCvCIFl91votpjee7YknHTJ3/gew4zzp0EhqkPwYc6DXABjX9rWjOzbFEPi3g5QRecU3whJvkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- font awesome inclusive js link -->
    <script src="https://kit.fontawesome.com/905758c01a.js" crossorigin="anonymous"></script>
</html>