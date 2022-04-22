<?php

// 指定返回目录层级
$ROOT_DIR = '../../../';
include_once "{$ROOT_DIR}header.php";               // 头部文件
include_once "{$ROOT_DIR}inc/config.inc.php";       // 基本配置
include_once "{$ROOT_DIR}inc/mysql.inc.php";        // 数据库连接
include_once "{$ROOT_DIR}inc/function.inc.php";     // 函数

$link = connect();
$html = "";

try {
    if(isset($_POST['change'])) {
        if (!empty($_POST['username'])) {
            $username = $_POST['username'];
            $sql_query = "SELECT id,username,email FROM member WHERE username = '{$username}' LIMIT 0,1";
            $result = $link->query($sql_query);
            if ($result->num_rows) {
                $html = <<<str
您的账户已存在，可以去登录啦~
str;
            } else {
                $html = <<<str
Sorry, 您输入的 {$username} 不存在，请重新输入！
str;
            }
        } else{
            $html =<<<str
输入 11nxx 试试~
str;
        }
    }
} catch (\Throwable $e){
    $html =<<<str
不能这么输入哦~~
str;
}

$link->close();

?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="sqli_bool.php">布尔盲注(Bool)</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
                <li><i class="mdi mdi-comment-multiple-outline"></i> <a href="?show">显示源码</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <h6 style="color: black">请输入用户名进行查找!</h6>
            <form action="#" method="post">
                <table>
                    <tr>
                        <th>
                            <label for="username">账&nbsp;&nbsp;&nbsp;&nbsp;户：</label>
                            <input type="text" name="username" placeholder="Username" id="username"/>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <input type="submit" name="change" value="Search" />
                        </th>
                    </tr>
                </table>
            </form>
            <?php echo "<br />".$html;echo show_code($_GET['show']);?>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php";  ?>
