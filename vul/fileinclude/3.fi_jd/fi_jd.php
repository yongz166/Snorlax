<?php

// 指定返回目录层级
$ROOT_DIR = '../../../';
include_once "{$ROOT_DIR}header.php";               // 头部文件
include_once "{$ROOT_DIR}inc/config.inc.php";       // 基本配置
include_once "{$ROOT_DIR}inc/function.inc.php";     // 函数

$html = "";
$php = "";

if(phpversion() > '5.3.4') {
    $php = "Warning：您的 php 版本 > 5.3.4，无法使用 0x00 截断，请先修改 php 版本！";
} elseif (ini_get('magic_quotes_gpc')) {
    $php = "Warning：您的 magic_quotes_gpc = On，请先在 php.ini 中设置为 On，记得重启中间件服务！";
}

if (isset($_GET['file']) && !empty($_GET['file'])){
    if(stristr("{$_GET['file']}","data")){
        $html = "输入的不对哦~";
    } else {
        include_once "{$_GET['file']}.php";
    }
}

?>
<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="../../vul.php"></a>本地包含绕过</h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
                <li><i class="mdi mdi-comment-multiple-outline"></i> <a href="?show">显示源码</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <p style='color:red;'><?php echo $php;?></p>
            <h6 style="color: black">Which singer do you like?</h6>
            <table>
                <tr>
                    <th>
                        <a href="fi_jd.php?file=../include/jay">周杰伦</a>
                        <a href="fi_jd.php?file=../include/vae">许嵩</a>
                        <a href="fi_jd.php?file=../include/eason">陈奕迅</a>
                        <a href="fi_jd.php?file=../include/jj">林俊杰</a>
                    </th>
                </tr>
            </table>
            <?php echo "<br />".$html;echo show_code($_GET['show']);?>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>