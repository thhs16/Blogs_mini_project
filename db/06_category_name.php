<?php

    $sql = "select category.name from category";
    $res_categoryName = $pdo->prepare($sql);
    $res_categoryName->execute();