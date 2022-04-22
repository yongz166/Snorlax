<?php

// 指定返回目录层级
$ROOT_DIR = '../../../';
include_once "{$ROOT_DIR}header.php";               // 头部文件
include_once "{$ROOT_DIR}inc/config.inc.php";       // 基本配置
include_once "{$ROOT_DIR}inc/function.inc.php";     // 函数

$html = "";

if (isset($_GET['change'])){
    if (!empty($_GET['speak'])){
        $speak = htmlspecialchars($_GET['speak'],ENT_QUOTES);
        if ($speak === 'www.baidu.com'){
            $html = "太正经了，换一个换一个！";
        } else{
            $html = "你输的 <a href='{$speak}' style='color: red'>URL</a>，你自己点点~";
        }
    } else{
        $html = "输入 www.baidu.com 试试";
    }
}

?>
<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="xss_htmlspecialchars.php">XSS htmlspecialchars 2</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
                <li><i class="mdi mdi-comment-multiple-outline"></i> <a href="?show">显示源码</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <h6 style="color: black">输入一个你常用的网站 URL，让我看看你是什么样的人~</h6>
            <form action="#" method="get">
                <table>
                    <tr>
                        <th>
                            <label for="speak">网&nbsp;&nbsp;&nbsp;站：</label>
                            <input type="text" name="speak" placeholder="Web Site" id="speak" />
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <input type="submit" name="change" value="Submit" />&nbsp;&nbsp;
                        </th>
                    </tr>
                </table>
            </form>
            <?php echo "<br />".$html;echo show_code($_GET['show']);?>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>
