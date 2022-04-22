<?php

// 指定返回目录层级
$ROOT_DIR = '../../../';
include_once "{$ROOT_DIR}header.php";               // 头部文件
include_once "{$ROOT_DIR}inc/config.inc.php";       // 基本配置
include_once "{$ROOT_DIR}inc/function.inc.php";     // 函数

$html = "";

if (isset($_GET['change'])){
    if (!empty($_GET['speak'])){
        $speak = htmlspecialchars($_GET['speak']);
        if ($speak === 'yes'){
            $html = "看来是同道中人！";
        } else{
            $html = "<a href='{$speak}' style='color: red'>我不听！我不听！</a>";
        }
    } else{
        $html = "那必须是 yes !";
    }
}

?>
<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="xss_htmlspecialchars.php">XSS htmlspecialchars 1</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
                <li><i class="mdi mdi-comment-multiple-outline"></i> <a href="?show">显示源码</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <script src="../alert.js"></script>
            <h6 style="color: black">人生苦短，我用 Php [dog] ~</h6>
            <form action="#" method="get">
                <table>
                    <tr>
                        <th>
                            <label for="speak">留&nbsp;&nbsp;&nbsp;言：</label>
                            <input type="text" name="speak" placeholder="Speak" id="speak" maxlength="10"/>
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
