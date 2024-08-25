<?php

    $sql_joint = "select post.id , post.title, post.description, post.image, post.category_id , category.name as category_name
            from post
            left join category
            on post.category_id = category.id";
    $res_joint = $pdo->prepare($sql_joint);
    $res_joint->execute();