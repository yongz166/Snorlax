<?php

// 指定返回目录层级
$ROOT_DIR = '../../../';
include_once "{$ROOT_DIR}header.php";               // 头部文件
include_once "{$ROOT_DIR}inc/config.inc.php";       // 基本配置
include_once "{$ROOT_DIR}inc/function.inc.php";     // 函数

$allow_url = '';

if(!ini_get('allow_url_fopen')){
    $allow_url = "Warning：您的 allow_url_fopen = Off，请先在 php.ini 中设置为 On，记得重启中间件服务！";
}

$html = "";

if (isset($_GET['file']) && !empty($_GET['file'])){
    include_once "{$_GET['file']}";
}

?>
<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="fi_local.php">本地文件包含</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
                <li><i class="mdi mdi-comment-multiple-outline"></i> <a href="?show">显示源码</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <p style='color:red;'><?php echo $allow_url?></p>
            <h6 style="color: black">Which singer do you like?</h6>
            <table>
                <tr>
                    <th>
                        <a href="fi_local.php?file=../include/jay.php">周杰伦</a>
                        <a href="fi_local.php?file=../include/vae.php">许嵩</a>
                        <a href="fi_local.php?file=../include/eason.php">陈奕迅</a>
                        <a href="fi_local.php?file=../include/jj.php">林俊杰</a>
                    </th>
                </tr>
            </table>
            <?php echo "<br />".$html;echo show_code($_GET['show']);?>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>
