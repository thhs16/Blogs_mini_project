<?php

    $sql = "select * from category";
    $res = $pdo->prepare($sql);
    $res->execute([]);