<?php

function connect($host=DB_HOST,$user=DB_USER,$pass=DB_PASS,$dbname=DB_NAME,$port=DB_PORT){
    $link = new mysqli();
    $link->connect($host,$user,$pass,$dbname,$port);
    if($link->connect_error){
        die('数据库连接失败，请检查 "inc/config.inc.php" 配置文件');
    }
    return $link;
}