<?php

$ROOT_DIR = '../../';
include_once "{$ROOT_DIR}header.php";

?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="xss.php">Cross Site Script WriteUp</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">靶场, WP</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <h6 style="color: black">题目列表 - WriteUp</h6>
            <ul>
                <li><a href="xss_reflected.php">反射型 XSS</a></li>
                <li><a href="xss_stored.php">存储型 XSS</a></li>
                <li><a href="xss_dom.php">DOM 型 XSS</a></li>
                <li><a href="xss_htmlspecialchars1.php">XSS htmlspecialchars 1</a></li>
                <li><a href="xss_htmlspecialchars2.php">XSS htmlspecialchars 2</a></li>
            </ul>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>
