<?php

$ROOT_DIR = '../../';
include_once "{$ROOT_DIR}header.php";

?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="burteforce.php">Burte Force WriteUp</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">靶场, WP</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <h6 style="color: black">题目列表 - WriteUp</h6>
            <ul>
                <li><a href="bf_form.php">基于表单的暴力破解</a></li>
                <li><a href="bf_client.php">验证码绕过(On Client)</a></li>
                <li><a href="bf_server1.php">验证码绕过(On Server 1)</a></li>
                <li><a href="bf_server2.php">验证码绕过(On Server 2)</a></li>
                <li><a href="bf_token.php">Token 防爆破?</a></li>
            </ul>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>
