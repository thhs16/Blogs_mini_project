<?php
# query order by should be at the end of the query 

    if( isset($_GET['category']) ){
        $sql_joint = "select post.id , post.title, post.description, post.image, post.category_id , category.name as category_name
            from post
            left join category
            on post.category_id = category.id
            where post.category_id = ?"; // the same as category.id = ?
        $res_joint = $pdo->prepare($sql_joint);
        $res_joint->execute([$_GET['category']]);

    } else {
        require_once('../db/04_joining_two_tables.php'); // the path has to be considered from post_list_page.php location
    }