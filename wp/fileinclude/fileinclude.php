<?php

$ROOT_DIR = '../../';
include_once "{$ROOT_DIR}header.php";

?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="fileinclude.php">File Include WriteUp</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">靶场, WP</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <h6 style="color: black">题目列表 - WriteUp</h6>
            <ul>
                <li><a href="fi_local.php">本地文件包含</a></li>
                <li><a href="fi_remote.php">远程文件包含</a></li>
                <li><a href="fi_jd.php">本地包含绕过</a></li>
            </ul>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>
