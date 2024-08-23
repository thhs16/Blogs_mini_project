<?php

    try{
        $pdo = new PDO("mysql:host=localhost;dbname=blogs" , "root" , "");

        // echo 'connection success';

    }catch(PDOException $e){
        echo 'connection error =>' . $e->getMessage();
    }