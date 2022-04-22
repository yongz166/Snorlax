<?php

$ROOT_DIR = '../../../';
include_once "{$ROOT_DIR}header.php";
include_once "{$ROOT_DIR}inc/config.inc.php";
include_once "{$ROOT_DIR}inc/mysql.inc.php";
include_once "{$ROOT_DIR}inc/function.inc.php";

$link = connect();
$html = "";

try {
    if(isset($_POST['change'])) {
        if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['sex']) && !empty($_POST['phonenum']) && !empty($_POST['address']) && !empty($_POST['email'])) {
            $sql_user = "SELECT username FROM users WHERE username = '{$_POST['username']}'";
            $result_user = $link->query($sql_user);
            if ($result_user->num_rows){
                $html = "用户已存在！";
            } else{
                $sql_insert =<<<str
INSERT INTO member (username,passwd,sex,phonenum,address,email) 
VALUES ('{$_POST['username']}',md5('{$_POST['password']}'),'{$_POST['sex']}','{$_POST['phonenum']}','{$_POST['address']}','{$_POST['email']}')
str;
                $result = $link->query($sql_insert);
                if ($result){
                    $html =<<<str
注册成功,请返回<a href='sqli_login.php' style="color: red">登录</a>
str;
                } else{
                    $html =<<<str
注册失败,请再次尝试
str;
                }
            }
        } else{
            $html = "都是必填项哦~";
        }
    } else{
        $html =<<<str
若已注册，点击返回<a href='sqli_login.php' style="color: red">登录</a>
str;

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
            <h2 class="arc-title"><a href="./sqli_reg.php">"Insert/Update" 注入 - 注册</a></h2>
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
                            <input type="text" name="password" placeholder="Password" id="password"/>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <label for="sex">性&nbsp;&nbsp;&nbsp;别：</label>
                            <input type="text" name="sex" placeholder="Sex" id="sex"/>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <label for="phonenum">手&nbsp;&nbsp;&nbsp;机：</label>
                            <input type="text" name="phonenum" placeholder="Phonenum" id="phonenum"/>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <label for="address">地&nbsp;&nbsp;&nbsp;址：</label>
                            <input type="text" name="address" placeholder="Address" id="address"/>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <label for="email">邮&nbsp;&nbsp;&nbsp;箱：</label>
                            <input type="email" name="email" placeholder="Email" id="email"/>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <input type="submit" name="change" value="注册" />&nbsp;&nbsp;
                        </th>
                    </tr>
                </table>
            </form>
            <?php echo "<br />".$html;echo show_code($_GET['show'])."<br />";?>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>