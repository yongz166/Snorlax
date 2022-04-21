<?php

// 指定返回目录层级
$ROOT_DIR = '../../../';
include_once "{$ROOT_DIR}header.php";               // 头部文件
include_once "{$ROOT_DIR}inc/config.inc.php";       // 基本配置
include_once "{$ROOT_DIR}inc/function.inc.php";     // 函数

$html = "";

if (isset($_GET['change'])){
    if (!empty($_GET['singer'])){
        if ($_GET['singer'] === 'jay'){
            $html =<<<str
<img src="../../fileinclude/include/jay.jpg" width="400px"><br /><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
从前从前有个人爱你很久，但偏偏风渐渐把距离吹得好远，好不容易又能再多爱一天，但故事的最后你好像还是说了拜拜。——《晴天》
str;
        } else{
            $html = "Who is {$_GET['singer']}, I maybe not have collected。";
        }
    } else{
        $html = "输入 'jay' 试试！";
    }
}

?>
<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="xss_reflected.php">反射型 XSS</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
                <li><i class="mdi mdi-comment-multiple-outline"></i> <a href="?show">显示源码</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <script src="../alert.js"></script>
            <h6 style="color: black">Which singer do you like?</h6>
            <form action="#" method="get">
                <table>
                    <tr>
                        <th>
                            <label for="singer">歌&nbsp;&nbsp;&nbsp;手：</label>
                            <input type="text" name="singer" placeholder="Singer" id="singer" maxlength="10"/>
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
