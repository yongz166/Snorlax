<?php

// 指定返回目录层级
$ROOT_DIR = '../../../';
include_once "{$ROOT_DIR}header.php";               // 头部文件
include_once "{$ROOT_DIR}inc/config.inc.php";       // 基本配置
include_once "{$ROOT_DIR}inc/mysql.inc.php";        // 数据库连接
include_once "{$ROOT_DIR}inc/function.inc.php";     // 函数

$link = connect();
$html = "";

try {
    $sql_insert=<<<str
INSERT INTO httpinfo(ip_address,user_agent,re_port)
VALUES ('{$_SERVER['REMOTE_ADDR']}','{$_SERVER['HTTP_USER_AGENT']}','{$_SERVER['REMOTE_PORT']}')
str;
    $result = $link->query($sql_insert);
    if(!$result){
        $html = $link->error;
    }
} catch (Throwable $e){
    $html =<<<str
不能这么输入哦~~
str;
}

$link->close();

?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="sqli_header.php">"Header" 注入</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
                <li><i class="mdi mdi-comment-multiple-outline"></i> <a href="?show">显示源码</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <h6 style="color: black">宝，你的当前登录信息被录入数据库了哦~</h6><br />
            <p><span style="color: black">Your IP_Adress：</span><?php echo $_SERVER['REMOTE_ADDR']?></p>
            <p><span style="color: black">Your User_Agent：</span><?php echo $_SERVER['HTTP_USER_AGENT']?></p>
            <p><span style="color: black">Your Link_Port：</span><?php echo $_SERVER['REMOTE_PORT']?></p>
            <?php echo "<br />".$html;echo show_code($_GET['show']);?>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>
