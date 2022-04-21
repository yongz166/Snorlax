<?php

// 指定返回目录层级
$ROOT_DIR = '../../../';
include_once "{$ROOT_DIR}header.php";               // 头部文件
include_once "{$ROOT_DIR}inc/config.inc.php";       // 基本配置
include_once "{$ROOT_DIR}inc/mysql.inc.php";        // 数据库连接
include_once "{$ROOT_DIR}inc/function.inc.php";     // 函数

$link = connect();
$html = "";

if(isset($_POST['change'])) {
    if (!empty($_POST['vcode'])){
        if (strtolower($_POST['vcode']) === strtolower($_SESSION['vcode'])){
             unset($_SESSION['vcode']);
            if (!empty($_POST['username'])&& !empty($_POST['password'])){
                $username = $_POST['username'];
                $password = $_POST['password'];

                $sql_user = "SELECT username FROM users WHERE username = ?";
                $sql_pass = "SELECT password FROM users WHERE username = ? and password = md5(?)";

                $user = $link->prepare($sql_user);
                $user->bind_param('s',$username);

                $pass = $link->prepare($sql_pass);
                $pass->bind_param('ss',$username,$password);

                $user->execute();
                $user->bind_result($username);
                if($user->fetch()){
                    $html = "Password Error";
                    $user->close();

                    $pass->execute();
                    $pass->bind_result($password);
                    if($pass->fetch()){
                        $html = "Login Success";
                        $pass->close();
                    }
                }else{
                    $html = "Username is not exists~";
                }
            }else{
                $html = "Username or Password Cannot be Empty!";
            }
        } else{
            $html = "Verification Code Error!";
        }
    } else{
        $html = "Verification Code Cannot be Empty!";
    }
}

$link->close();

?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="bf_server.php">验证码绕过 (On Server 2)</a></h2>
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
                            <label for="vcode">验证码：</label>
                            <input type="text" name="vcode" placeholder="验证码" />
                            <img src="<?php echo $ROOT_DIR;?>inc/bf_vcode2.inc.php" onclick="src='<?php echo $ROOT_DIR;?>inc/bf_vcode2.inc.php?'+new Date().getTime();" />
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <input type="submit" name="change" value="Login" />
                        </th>
                    </tr>
                </table>
            </form>
            <?php echo "<br />".$html;echo show_code($_GET['show']);?>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>
