<?php

$ROOT_DIR = '../../';
include_once "{$ROOT_DIR}header.php";

?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="xss.php">Cross Site Script (跨站脚本)</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <h6 style="color: black">漏洞定义</h6>
            <ul>
                <li>
                    XSS 攻击全称跨站脚本攻击，是为不和层叠样式表 (Cascading Style Sheets, CSS) 的缩写混淆，故将跨站脚本攻击缩写为 XSS，XSS 是前端的漏洞，产生在浏览器一端的漏洞。
                </li>
                <li>
                    它是指攻击者在网页中嵌入客户端脚本，主要利用 JS 编写的恶意代码来执行一些想要的功能，也就是说它能干的事是由 JS 的控制，那么 JS 能执行出什么脚本代码就取决于它能实现的高度。
                </li>
                <li>
                    当用户使用浏览器浏览被嵌入恶意代码的网页时，恶意代码将会在用户的浏览器上执行。
                </li>
            </ul>
            <h6 style="color: black">漏洞危害</h6>
            <ul>
                <li>
                    盗取各类用户帐号，如机器登录帐号、用户网银帐号、各类管理员帐号。
                </li>
                <li>
                    控制企业数据，包括读取、篡改、添加、删除企业敏感数据的能力。
                </li>
                <li>
                    盗窃企业重要的具有商业价值的资料。
                </li>
                <li>
                    控制受害者机器向其它网站发起攻击。
                </li>
                <li>
                    .........
                </li>
            </ul>
            <h6 style="color: black">产生原因</h6>
            <ol>
                <li>
                    未对输入 (和 URL 参数) 进行过滤。
                </li>
                <li>
                    未对输出进行编码/实体。
                </li>
                <li>
                    .........
                </li>
            </ol>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>
