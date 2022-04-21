<?php

// 指定返回目录层级
$ROOT_DIR = '../../../';
include_once "{$ROOT_DIR}header.php";               // 头部文件
include_once "{$ROOT_DIR}inc/config.inc.php";       // 基本配置
include_once "{$ROOT_DIR}inc/mysql.inc.php";        // 数据库连接
include_once "{$ROOT_DIR}inc/bf_mysql.inc.php";     // 暴力破解模块的数据库连接
include_once "{$ROOT_DIR}inc/function.inc.php";     // 函数

?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="bf_form.php">基于表单的暴力破解</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php?look=burtforce"?>">漏洞, 靶场</a></li>
                <li><i class="mdi mdi-comment-multiple-outline"></i> <a href="?show">显示源码</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <h6 style="color: black">Please Enter Your Information</h6>
            <form action="#" method="post">
                <table>
                    <tr>
                        <th>
                            <label for="username">账&nbsp;&nbsp;&nbsp;户：</label>
                            <input type="text" name="username" placeholder="Username" id="username"/>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <label for="password">密&nbsp;&nbsp;&nbsp;码：</label>
                            <input type="password" name="password" placeholder="Password" id="password"/>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <input type="submit" name="change" value="Login" />&nbsp;&nbsp;
                        </th>
                    </tr>
                </table>
            </form>
            <?php echo "<br />".$html;echo show_code($_GET['show']);?>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>
