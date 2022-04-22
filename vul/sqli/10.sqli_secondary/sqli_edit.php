<?php

$ROOT_DIR = '../../../';
include_once "{$ROOT_DIR}header.php";
include_once "{$ROOT_DIR}inc/config.inc.php";
include_once "{$ROOT_DIR}inc/mysql.inc.php";
include_once "{$ROOT_DIR}inc/function.inc.php";

$link = connect();
$html = "";

try{
    if(!check_sqli_second_session($link)){
        session_destroy();
        header("location:sqli_login.php");
    } else {
        if(isset($_POST['change'])) {
            if (!empty($_POST['password'])) {
                $password = $link->escape_string($_POST['password']);
$sql_update = "UPDATE users SET password = md5('{$password}') where username = '{$_SESSION['sqli']['username']}'";
                $result = $link->query($sql_update);
                if ($result){
                    session_destroy();
                    echo<<<str
<script>alert("修改成功，请重新登录~");location.href="sqli_login.php"</script>
str;
                } else{
                    $html = "修改失败，请再次尝试！";
                }
            } else{
                $html = "都是必填项哦~";
            }
        }
        $html.=<<<str
<h6 style="color: black">Hello，{$_SESSION['sqli']['username']}，欢迎来到个人中心 | <a style="color: blue;" href="sqli_index.php?logout=1">退出登录</a></h6>
<form action="#" method="post">
    <table>
        <tr>
            <th>
                <label for="password">密&nbsp;&nbsp;&nbsp;码：</label>
                <input type="text" name="password" placeholder="Password" id="password"/>
            </th>
        </tr>
        <tr>
            <th>
                <input type="submit" name="change" value="Change" />&nbsp;&nbsp;
            </th>
        </tr>
    </table>
</form>
str;
    }
} catch (Throwable $e){
    $html = <<<str
不能这么输入哦~~
str;
}

$link->close();

if(isset($_GET['logout'])){
    session_destroy();
    header("location:sqli_login.php");
}

?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="./sqli_edit.php">二次注入 - 修改信息</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
                <li><i class="mdi mdi-comment-multiple-outline"></i> <a href="?show">显示源码</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <?php echo $html;echo show_code($_GET['show']);?>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>