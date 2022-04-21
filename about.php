<?php

include_once "inc/config.inc.php";
include_once "header.php";

?>

    <!-- 修改内容 -->
    <div class="col-xl-8">
        <article class="lyear-arc">
            <div class="arc-header">
                <h2 class="arc-title"><a href="index.php">关于、致谢</a></h2>
                <ul class="arc-meta">
                    <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                    <li><i class="mdi mdi-tag-text-outline"></i> <a href="#">靶场</a>, <a href="#">关于</a></li>
                </ul>
            </div>
            <div class="arc-synopsis">
                <h6 style="color: black">本人感想：</h6>
                <ul>
                    <li>
                        靶场设计的结束意味着我在这一部分的精力即将画上句号！时间过得蛮快的，意难平，感慨良多，但无论如何这些实实在在的经历，很好的弥补了漏洞原理的缺失。在此，要特别感谢靶场编写环节过程中给予我无限的支持和帮助的老师、朋友和亲人们。
                    </li>
                </ul>
                <h6 style="color: black">在此由衷的感谢（以下名单以字母、数字、中文排名）：</h6>
                <ul>
                    <li>c0ny1</li>
                    <li>jerryxucy</li>
                    <li>moonsec</li>
                    <li>rosssss</li>
                    <li>xixixi</li>
                    <li>zhuifengshaonianhanlu</li>
                    <li>11nxx</li>
                    <li>笔下光年</li>
                    <li>国光</li>
                    <li>......</li>
                </ul>
                <h6 style="color: black">靶场参考：</h6>
                <ul>
                    <li>
                        前端框架：
                        <ul>
                            <li>笔下光年（Light Year Blog）</li>
                        </ul>
                    </li>
                    <li>题目设计：
                        <ul>
                            <li>Pikachu</li>
                            <li>Xss-labs</li>
                            <li>DVWA</li>
                            <li>Webug4.0</li>
                            <li>Pentesterlab</li>
                            <li>Upload-labs</li>
                            <li>Sqli-labs</li>
                        </ul>
                </ul>
            </div>
        </article>
    </div>

<?php include_once "footer.php" ?>