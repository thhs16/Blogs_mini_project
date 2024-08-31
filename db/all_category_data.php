<?php

    $sql = "select * from category";
    $res_all_category = $pdo->prepare($sql);
    $res_all_category->execute([]);