<?php

    require_once('../db/00_db_connection.php');
    
    $sql = "select * from category where id=?";
    $res = $pdo->prepare($sql);
    $res->execute([$idCategory]);

    $dataCategory = $res->fetch(PDO::FETCH_ASSOC);