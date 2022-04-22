<?php

$ROOT_DIR = '../../';
include_once "{$ROOT_DIR}header.php";

?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="sqli.php">SQL Injection (SQL 注入)</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <h6 style="color: black">漏洞定义</h6>
            <ul>
                <li>
                    SQL 注入攻击的本质，是把用户输入的数据当做代码执行。这里有两个关键条件，第一个使用能够控制输入；第二个是原本程序要执行的代码，拼接了用户输入的数据。
                </li>
                <li>
                    Web 程序代码中对于用户提交的参数未做过滤就直接放到 SQL 语句中执行，导致参数中的特殊字符打破了 SQL 语句原有逻辑，黑客可以利用该漏洞执行任意 SQL 语句，如查询数据、下载数据、写入 webshell 、执行系统命令以及绕过登录限制等。
                </li>
                <li>
                    想要更好地研究 SQL 注入，就必须深入了解每种数据库的 SQL 语法及特性。虽然现在的大多数数据库都会遵循 SQL 标准，但是每种数据库也都有自己的内置函数与特性。
                </li>
            </ul>
            <h6 style="color: black">漏洞危害</h6>
            <ul>
                <li>
                    存放在数据库中的隐私信息泄露。
                </li>
                <li>
                    修改数据库一些字段的值，嵌入网马链接，进行挂马攻击。
                </li>
                <li>
                    在权限够的情况下，可以写入 WebShell，执行命令。
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
                    未采用预编译的方式构造 SQL 语句。
                </li>
                <li>
                    .........
                </li>
            </ol>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>
