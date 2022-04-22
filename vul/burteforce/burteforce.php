<?php

$ROOT_DIR = '../../';
include_once "{$ROOT_DIR}header.php";

?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="burteforce.php">Burt Force (暴力破解)</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php?look=burtforce"?>">漏洞, 靶场</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <h6 style="color: black">漏洞定义</h6>
            <ul>
                <li>
                    暴力破解也被称为枚举测试、穷举法测试，包括非常多的子类，如：目录爆破、弱口令爆破、服务爆破、端口爆破等等。本靶场主要为用户名、密码爆破。
                </li>
                <li>
                    使用字典中的内容进行一一尝试，如果匹配成功了，有对应提示，如果匹配失败，那么会继续进行尝试。当然，这是最简单的情况，实际上对方后端会做过滤，具体情况具体分析。
                </li>
            </ul>
            <h6 style="color: black">漏洞危害</h6>
            <ul>
                <li>
                    用户密码被重置。
                </li>
                <li>
                    敏感目录和参数被枚举。
                </li>
                <li>
                    用户个人信息被盗取。
                </li>
                <li>
                    .........
                </li>
            </ul>
            <h6 style="color: black">产生原因</h6>
            <ol>
                <li>
                    使用弱口令，密码组合简单，易被猜解。
                </li>
                <li>
                    未限制用户访问次数，导致攻击者可以无限次尝试。
                </li>
                <li>
                    未使用强人机验证机制。
                </li>
                <li>
                    未使用验证码等防御手段。
                </li>
                <li>
                    .........
                </li>
            </ol>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>
