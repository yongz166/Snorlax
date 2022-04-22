<?php

// 指定返回目录层级
$ROOT_DIR = '../../../';
include_once "{$ROOT_DIR}header.php";               // 头部文件
include_once "{$ROOT_DIR}inc/config.inc.php";       // 基本配置
include_once "{$ROOT_DIR}inc/function.inc.php";     // 函数

$allow_url1 = '';
$allow_url2 = '';
$gpc = '';
$html = "";

if(!ini_get('allow_url_fopen')){
    $allow_url1 = "Warning：您的 allow_url_fopen = Off，请先在 php.ini 中设置为 On，记得重启中间件服务！";
}
if(!ini_get('allow_url_include')){
    $allow_url2 = "Warning：您的 allow_url_include = Off，请先在 php.ini 中设置为 On，记得重启中间件服务！";
}
if(phpversion() <= '5.3.0' && ini_get('magic_quotes_gpc')){
    $gpc = "Warning：您的 magic_quotes_gpc = On，请先在 php.ini 中设置为 Off，记得重启中间件服务！";
}

if (isset($_GET['file']) && !empty($_GET['file'])){
    if(stristr("{$_GET['file']}","input") || stristr("{$_GET['file']}","data") || stristr("{$_GET['file']}","filter")){
        $html = "输入的不对哦~";
    } else{
        include_once "{$_GET['file']}";
    }
}

?>
<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="fi_remote.php">远程文件包含</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
                <li><i class="mdi mdi-comment-multiple-outline"></i> <a href="?show">显示源码</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <p style='color:red;'><?php echo $allow_url1;?></p>
            <p style='color:red;'><?php echo $allow_url2;?></p>
            <p style='color:red;'><?php echo $gpc;?></p>
            <h6 style="color: black">Which singer do you like?</h6>
            <table>
                <tr>
                    <th>
                        <a href="fi_remote.php?file=../include/jay.php">周杰伦</a>
                        <a href="fi_remote.php?file=../include/vae.php">许嵩</a>
                        <a href="fi_remote.php?file=../include/eason.php">陈奕迅</a>
                        <a href="fi_remote.php?file=../include/jj.php">林俊杰</a>
                    </th>
                </tr>
            </table>
            <?php echo "<br />".$html;echo show_code($_GET['show']);?>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>
