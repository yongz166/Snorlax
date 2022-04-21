<?php

$ROOT_DIR = '../../../';
include_once "{$ROOT_DIR}header.php";
include_once "{$ROOT_DIR}inc/config.inc.php";
include_once "{$ROOT_DIR}inc/mysql.inc.php";
include_once "{$ROOT_DIR}inc/function.inc.php";

$link = connect();
$html = "";

// 判断是否登录，如果已经登录，点击时，直接进入会员中心
if(check_sqli_second_session($link)){
    header("location:sqli_index.php");
}

try{
    if(isset($_POST['change'])) {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $link->escape_string($_POST['username']);
            $password = $link->escape_string($_POST['password']);
            $sql_query = "SELECT * FROM users WHERE username = '{$username}' and password = md5('{$password}')";
            $result = $link->query($sql_query);
            if ($row = $result->fetch_assoc()) {
                $_SESSION['sqli']['username'] = $row['username'];
                $_SESSION['sqli']['password'] = $password;
                header("location:sqli_index.php");
            } else {
                $html = <<<str
登录失败，请重新登录！
str;
            }
        } else{
            $html=<<<str
用户名或密码不得为空！
str;
        }
    }
} catch (Throwable $e){
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
            <h2 class="arc-title"><a href="./sqli_login.php">二次注入 - 登录</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
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
            <?php echo "<br />".$html;echo show_code($_GET['show'])."<br />";?>
            <p>如果你还没有账号，请点击<a href="sqli_reg.php" style="color: red">注册</a></p>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>
