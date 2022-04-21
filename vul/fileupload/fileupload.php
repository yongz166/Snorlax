<?php

$ROOT_DIR = '../../';
include_once "{$ROOT_DIR}header.php";

?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="fileupload.php">File Upload (文件上传)</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <h6 style="color: black">漏洞定义</h6>
            <ul>
                <li>
                    文件上传漏洞是指用户上传了一个可执行的脚本文件，并通过此脚本文件获得了执行服务器端命令的能力。
                </li>
                <li>
                    这种攻击方式是最为直接和有效的，"文件上传"本身没有问题，有问题的是文件上传后，服务器怎么处理、解释文件。
                </li>
                <li>
                    如果服务器的处理逻辑做的不够安全，则会导致严重的后果。
                </li>
            </ul>
            <h6 style="color: black">漏洞危害</h6>
            <ul>
                <li>
                    上传文件是 Web 脚本语言，服务器解释并执行了用户上传的脚本，导致代码执行。
                </li>
                <li>
                    上传文件是病毒或者木马时，主要用于诱骗用户或者管理员下载执行或者直接自动运行。
                </li>
                <li>
                    上传文件是钓鱼图片或为包含了脚本的图片，在某些版本的浏览器中会被作为脚本执行，被用于钓鱼和欺诈。
                </li>
                <li>
                    .........
                </li>
            </ul>
            <h6 style="color: black">产生原因</h6>
            <ol>
                <li>
                    服务器配置不当。
                </li>
                <li>
                    开源编辑器上传漏洞。
                </li>
                <li>
                    过滤不严格被绕过。
                </li>
                <li>
                    文件解析漏洞导致文件执行。
                </li>
                <li>
                    .........
                </li>
            </ol>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>
