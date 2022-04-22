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
    if(isset($_GET['change'])) {
        if (!empty($_GET['id'])) {
            $html = $_GET['id']."<br />"; // 回显输出
            $link->query("SET NAMES gbk");
            $id = $link->escape_string($_GET['id']);
            $sql_query = "SELECT username,email FROM member WHERE id = '$id'";
            $result = $link->query($sql_query);
            if ($row = $result->fetch_assoc()) {
                $username = $row['username'];
                $email = $row['email'];
                $html = <<<str
<br />Hello, {$username}<br />Your email is: {$email} ~
str;
            } else {
                $html = <<<str
<br />Sorry, 您输入的 {$id} 不存在，请重新输入！
str;
            }
        }
    }
} catch (Throwable $e){
    $html .=<<<str
不能这么输入哦~~
str;
}

$link->close();

?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="sqli_widebyte.php">宽字节注入</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
                <li><i class="mdi mdi-comment-multiple-outline"></i> <a href="?show">显示源码</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <h6 style="color: black">Please Enter Your Information</h6>
            <form action="#" method="GET">
                <table>
                    <tr>
                        <th>
                            <label for="id">账户 ID：</label>
                            <input type="text" name="id" placeholder="Id" id="id"/>
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

<?php include_once "{$ROOT_DIR}footer.php" ?>
