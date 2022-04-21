<?php

// 本文件只用于 BurteForce 模块的前两个部分

// 定义数据库连接，前提是包含了 mysql.inc.php 文件
$link = connect();
$html = "";

if(isset($_POST['change'])) {
    if(!empty($_POST['username'])&& !empty($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        // 使用预编译防止 SQL 注入，这里分别查询了用户和密码，导致敏感信息泄露
        $sql_user = "SELECT username FROM users WHERE username = ?";
        $sql_pass = "SELECT password FROM users WHERE username = ? and password = md5(?)";

        // 分别为两个查询语句绑定变量
        $user = $link->prepare($sql_user);
        $user->bind_param('s',$username);

        $pass = $link->prepare($sql_pass);
        $pass->bind_param('ss',$username,$password);

        // 预编译不能同时执行两条语句，先执行一条断开连接，再执行另一条
        $user->execute();
        $user->bind_result($username);
        if($user->fetch()){
            // 提示了密码错误，导致账号正确这一消息泄露
            $html = "Password Error";
            $user->close();

            // 断开用户名查询后，在执行密码查询
            $pass->execute();
            $pass->bind_result($password);
            if($pass->fetch()){
                $html = "Login Success";
                $pass->close();
            }
        }else{
            // 提示了用户名不存在，导致可以使用暴力破解出用户名
            $html = "Username is not exists~";
        }
    }else{
        $html = "Username or Password Cannot be Empty!";
    }
}

$link->close();