<?php

$ROOT_DIR = '../../';
include_once "{$ROOT_DIR}header.php";

?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="sqli.php">SQL Injection WriteUp</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">靶场, WP</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <h6 style="color: black">题目列表 - WriteUp</h6>
            <ul>
                <li><a href="sqli_get.php">数字型注入(Get)</a></li>
                <li><a href="sqli_post.php">字符型注入(Post)</a></li>
                <li><a href="sqli_search.php">搜索型注入(Like)</a></li>
                <li><a href="sqli_bool.php">布尔盲注(Bool)</a></li>
                <li><a href="sqli_time.php">时间盲注(Time)</a></li>
                <li><a href="sqli_in_up.php">"Insert/Update" 注入</a></li>
                <li><a href="sqli_delete.php">"Delete" 注入</a></li>
                <li><a href="sqli_header.php">"Header" 注入</a></li>
                <li><a href="sqli_widebyte.php">宽字节注入</a></li>
                <li><a href="sqli_secondary.php">二次注入</a></li>
                <li><a href="sqli_stacked.php">堆叠注入</a></li>
                <li><a href="sqli_order.php">Order 注入</a></li>
            </ul>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>
