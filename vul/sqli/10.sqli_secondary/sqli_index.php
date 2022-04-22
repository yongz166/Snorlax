<?php

$ROOT_DIR = '../../../';
include_once "{$ROOT_DIR}header.php";
include_once "{$ROOT_DIR}inc/config.inc.php";
include_once "{$ROOT_DIR}inc/mysql.inc.php";
include_once "{$ROOT_DIR}inc/function.inc.php";

$link = connect();
$html = "";

// 判断是否登录，如果已经登录，点击时，直接进入会员中心
if(!check_sqli_second_session($link)){
    session_destroy();
    header("location:sqli_login.php");
} else{
    $html=<<<str
<h6 style="color: black">Hello，{$_SESSION['sqli']['username']}，欢迎来到个人中心 | <a style="color: blue;" href="sqli_index.php?logout">退出登录</a></h6>
<a style="color: red;" href="sqli_edit.php">修改密码</a>
str;
}

if(isset($_GET['logout'])){
    session_destroy();
    header("location:sqli_login.php");
}

$link->close();
?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="./sqli_index.php">二次注入 - 个人中心</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
                <li><i class="mdi mdi-comment-multiple-outline"></i> <a href="?show">显示源码</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <?php echo $html;echo show_code($_GET['show']);?>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>
