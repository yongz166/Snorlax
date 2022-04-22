<?php

$ROOT_DIR = '../../../';
include_once "{$ROOT_DIR}header.php";
include_once "{$ROOT_DIR}inc/config.inc.php";       // 基本配置
include_once "{$ROOT_DIR}inc/function.inc.php";     // 函数
include_once "ini.inc.php";

$html = '';
$php = "若您在这关遇到了问题，请点击这里~";

if (isset($_POST['submit'])){
    $save_path = "../uploads";
    $upload_file = upload_htaccess('file', $save_path);
    if ($upload_file['return']){
        $html =<<<str
<p>文件上传成功！</p>
<p>文件保存路径为：<a href="{$upload_file['new_path']}" target="_blank">{$upload_file['new_path']}</a></p>
<img src="{$upload_file['new_path']}" width="300px">
str;
    } else{
        $html = "<br /><p>{$upload_file['error']}</p>";
    }
}

if(isset($_GET['delete'])){
    delFile("../uploads");
    header("location:{$_SERVER['HTTP_REFERER']}");
}

?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="fu_userini.php">PHP 配置文件</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
                <li><i class="mdi mdi-comment-multiple-outline"></i> <a href="?show">显示源码</a></li>
                <li><i class="mdi mdi-comment-multiple-outline"></i> <a href="?delete">删除文件</a> | <a href="?showFile">查看文件</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <a href="../README.php"><p style='color:red;'><?php echo $php;?></p></a>
            <h6 style="color: black">请选择需要上传的图片：</h6>
            <form action="#" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <th>
                            <input type="file" name="file" />
                        </th>
                    </tr>
                    <tr>
                        <th><br />
                            <input type="submit" name="submit" value="Submit" />&nbsp;&nbsp;
                        </th>
                    </tr>
                </table>
            </form>
            <?php
            echo "<br />".$html;
            echo show_code($_GET['show'])."<br />";
            if(isset($_GET['showFile'])){
                echo showFile("../uploads");
            }?>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>
