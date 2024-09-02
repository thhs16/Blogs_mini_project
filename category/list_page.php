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
    <!-- DB connection -->
    <?php 
        require_once('../db/00_db_connection.php');

        require_once('../db/all_category_data.php');

        $data = $res_all_category->fetchAll(PDO::FETCH_ASSOC);

        require_once('./create_category.php');
        #second time db data 
        # use header('Location:./list_page.php'); to reload once
        // require('../db/all_category_data.php');
        // $data = $res_all_category->fetchAll(PDO::FETCH_ASSOC);

        // echo '<pre>';
        // print_r($data);
    ?>
    <!-- testing MDB -->
    <!-- <div class="btn btn-danger">Hello World</div> -->

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

                    <form action="" method="POST">

                        <div class="">
                            <input type="text" name="category" class="form-control" placeholder="Category Name...">

                            <?php 
                                if($category_Require_Status){
                                    echo '<small class="text-danger ms-1">* Category Required</small>';
                                }
                            ?>

                        </div>
                        <div class="mt-3">
                            <input type="submit" name="btn_create" value="Create" class="btn btn-primary">
                            <input type="reset" value="Reset" class="btn btn-dark">
                        </div>
                    </form>
                    
                </div>
                <div class="col-8">

                    <?php 
                    #http://localhost/blogs_mini_project/category/delete_category.php?id=1
                        foreach($data as $item){
                            echo '<div class="row shadow-sm p-4">
                                    <div class="col-7">

                                        <div class="">
                                            <h4>'.$item['name'].'</h4>
                                        </div>

                                    </div>
                                    <div class="col">

                                        <a href="update_page.php?id='.$item['id'].'"><button class="btn btn-secondary">Update</button></a>
                                        <a href="delete_category.php?id='.$item['id'].'"><button class="btn btn-danger">Delete</button></a>


                                    </div>
                                  </div>';
                            }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    <!-- Design End -->
    
    <!-- Used action attribute instead of require_once method -->
    <!-- Now used require_once method for validation -->
    <!-- The PHP file are above -->
</body>
    <!-- MDB JS link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js" integrity="sha512-orRaGPJ0tGeCLCvCIFl91votpjee7YknHTJ3/gew4zzp0EhqkPwYc6DXABjX9rWjOzbFEPi3g5QRecU3whJvkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- font awesome inclusive js link -->
    <script src="https://kit.fontawesome.com/905758c01a.js" crossorigin="anonymous"></script>
</html>