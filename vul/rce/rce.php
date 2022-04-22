<?php

$ROOT_DIR = '../../';
include_once "{$ROOT_DIR}header.php";

?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="rce.php">RCE (远程命令/代码执行)</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <h6 style="color: black">漏洞定义</h6>
            <ul>
                <li>
                    远程命令/代码执行漏洞（RCE）是指可以在仅有远程访问权限的情况下执行系统命令的漏洞，是安全漏洞中危害最大的漏洞之一。
                </li>
                <li>
                    在 Web 应用中，远程命令/代码执行漏洞通常分为命令注入和代码注入两类。
                </li>
                <li>
                    命令注入：可通过 HTTP 请求直接让服务端执行系统命令的漏洞，通常是由于系统命令执行函数调用了用户可控变量且未进行有效过滤引起的。
                </li>
                <li>
                    代码注入：可通过 HTTP 请求让服务端执行服务端 Web 代码的漏洞，通过服务端 Web 代码也可以实现服务端系统命令执行，此类漏洞通常是由于代码执行函数引用了用户可控变量且未进行有效过滤引起的。
                </li>
            </ul>
            <h6 style="color: black">漏洞危害</h6>
            <ul>
                <li>
                    直接获取服务器权限。
                </li>
                <li>
                    获取敏感数据、文件。
                </li>
                <li>
                    写入 WebShell，执行命令。
                </li>
                <li>
                    .........
                </li>
            </ul>
            <h6 style="color: black">产生原因</h6>
            <ol>
                <li>
                    未对用户输入进行严格过滤。
                </li>
                <li>
                    使用了危害函数，致使漏洞产生。
                </li>
                <li>
                    .........
                </li>
            </ol>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>
