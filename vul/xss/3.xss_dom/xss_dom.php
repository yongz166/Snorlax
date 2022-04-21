<?php

// 指定返回目录层级
$ROOT_DIR = '../../../';
include_once "{$ROOT_DIR}header.php";               // 头部文件
include_once "{$ROOT_DIR}inc/config.inc.php";       // 基本配置
include_once "{$ROOT_DIR}inc/function.inc.php";     // 函数

?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="xss_dom.php">DOM 型 XSS</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
                <li><i class="mdi mdi-comment-multiple-outline"></i> <a href="?show">显示源码</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <script src="../alert.js"></script>
            <h6 style="color: black">请输入想要查看的文件名：</h6>
            <form action="#" method="get">
                <table>
                    <tr>
                        <th>
                            <label for="filename">文件名：</label>
                            <input type="text" name="filename" placeholder="FileName" id="filename" maxlength="10" />
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <input type="button" name="change" value="Submit" onclick="domxss()"/>&nbsp;&nbsp;
                        </th>
                    </tr>
                </table>
            </form>
            <script>
                function domxss(){
                    var filename = document.getElementById("filename").value;
                    document.getElementById("showlink").innerHTML = "<br /><a style='color: red' href='"+filename+"'>查看文件</a>";
                }
            </script>
            <div id="showlink"></div>
            <?php echo "<br />".show_code($_GET['show']);?>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>
