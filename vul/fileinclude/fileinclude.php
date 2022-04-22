<?php

$ROOT_DIR = '../../';
include_once "{$ROOT_DIR}header.php";

?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="fileinclude.php">File Include (文件包含)</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <h6 style="color: black">漏洞定义</h6>
            <ul>
                <li>
                    程序开发人员通常会把可重复使用的函数写到单个文件中，在使用某些函数时，直接调用此文件，而无需再次编写，这种调用文件的过程一般被称为包含。
                </li>
                <li>
                    程序开发人员都希望代码更加灵活，所以通常会将被包含的文件设置为变量，用来进行动态调用，但正是由于这种灵活性，从而导致客户端可以调用一个恶意文件，造成文件包含漏洞。
                </li>
                <li>
                    几乎在所有的脚本语言中都会提供文件包含的功能，但文件包含漏洞在 PHP Web Application 中居多，而在 JSP、ASP、ASP.NET 程序中却非常少，甚至于没有文件包含漏洞存在。这与程序开发人员的水平有关，而问题在于语言设计的弊端。
                </li>
                <li>
                    PHP 文件包含特点：使用文件包含函数包含文件的时候，该PHP格式的文件内容将会被当作 PHP 代码来执行，PHP 内核不会在意包含文件类型。
                </li>
            </ul>
            <h6 style="color: black">漏洞危害</h6>
            <ul>
                <li>
                    Web 服务器的文件被容易浏览，导致信息泄露。
                </li>
                <li>
                    脚本被任意执行，导致网站被篡改、挂马。
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
                    未对文件后缀进行约束。
                </li>
                <li>
                    .........
                </li>
            </ol>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>
