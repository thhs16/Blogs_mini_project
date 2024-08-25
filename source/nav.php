 
    <?php 
        // echo '<pre>';
        // print_r($_SERVER);
    ?>

    <!-- This is common file for both  category and post page that's why REQUEST_URI is used -->
    <a href="<?php echo $_SERVER['REQUEST_URI'] == "/blogs_mini_project/category/list_page.php" ? '#' : '../category/list_page.php' ; ?>">Category</a> | 
    <a href="<?php echo $_SERVER['REQUEST_URI'] == "/blogs_mini_project/post/post_list_page.php" ? '#' : '../post/post_list_page.php' ; ?>">Post</a> 

    <!-- <a href="../category/list_page.php">Category</a> |
    <a href="../post/post_list_page.php">Post</a> -->