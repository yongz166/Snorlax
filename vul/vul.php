<?php

$ROOT_DIR = '../';
include_once "{$ROOT_DIR}header.php";
include_once "{$ROOT_DIR}inc/config.inc.php";
include_once "{$ROOT_DIR}inc/mysql.inc.php";
include_once "{$ROOT_DIR}inc/function.inc.php";

$link = connect();
$html = "";

?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="vul.php">Vulnerabilities Introduce</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="#">漏洞, 靶场</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <div>
                <div style="float: left">
                    <a href="?look=burtforce"><h6 style="color: black">Burt Force (暴力破解)</h6></a>
                    <a href="?look=xss"><h6 style="color: black">Cross Site Script (跨站脚本)</h6></a>
                    <a href="?look=sql"><h6 style="color: black">SQL Injection (SQL 注入)</h6></a>
                    <a href="?look=rce"><h6 style="color: black">RCE (远程命令/代码执行)</h6></a>
                    <a href="?look=fileinclude"><h6 style="color: black">File Include (文件包含)</h6></a>
                    <a href="?look=fileupload"><h6 style="color: black">File Upload (文件上传)</h6></a>
                </div>
                <div style="float: left">
                    <?php
                    if(isset($_GET['look']) && !empty($_GET['look'])) {

                        $type = $_GET['look'];
                        $sql_query = "SELECT typename,path FROM vultype WHERE vulname = ?";

                        $line = $link->prepare($sql_query);
                        $line->bind_param('s', $type);

                        $line->execute();

                        $line->bind_result($typename,$path);
                        echo "<ul>";
                        while($line->fetch()){
                            echo<<<str
<li><a href="{$path}">{$typename}</a></li>
str;
                        }
                        echo "</ul>";
                    }
                    ?>
                </div>
            </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>

