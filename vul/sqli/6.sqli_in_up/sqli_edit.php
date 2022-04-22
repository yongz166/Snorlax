<?php

$ROOT_DIR = '../../../';
include_once "{$ROOT_DIR}header.php";
include_once "{$ROOT_DIR}inc/config.inc.php";
include_once "{$ROOT_DIR}inc/mysql.inc.php";
include_once "{$ROOT_DIR}inc/function.inc.php";

$link = connect();
$html = "";

try{
    if(!check_sqli_in_up_session($link)){
        session_destroy();
        header("location:sqli_login.php");
    } else {
        if(isset($_POST['change'])) {
            if (!empty($_POST['sex']) && !empty($_POST['phonenum']) && !empty($_POST['address']) && !empty($_POST['email'])) {
                $sql_update = "UPDATE member SET sex = '{$_POST['sex']}',phonenum = '{$_POST['phonenum']}',address = '{$_POST['address']}',email = '{$_POST['email']}' where username = '{$_SESSION['sqli']['username']}'";
                echo $sql_update;
                $result = $link->query($sql_update);
                if ($result){
                    header("location:sqli_index.php");
                } else{
                    $html = $link->error;
                }
            } else{
                $html = "都是必填项哦~";
            }
        }
        $username = $_SESSION['sqli']['username'];
        $sql_query = "SELECT * FROM member WHERE username = '{$username}'";
        $result = $link->query($sql_query);
        $row = $result->fetch_assoc();
        $html.=<<<str
<h6 style="color: black">Hello，{$row['username']}，欢迎来到个人中心 | <a style="color: blue;" href="sqli_index.php?logout">退出登录</a></h6>
<form action="#" method="post">
    <table>
        <tr>    
            <th>
                <label for="sex">性&nbsp;&nbsp;&nbsp;别：</label>
                <input type="text" name="sex" value="{$row['sex']}" id="sex" />
            </th>
        </tr>
        <tr>
            <th>
                <label for="phonenum">手&nbsp;&nbsp;&nbsp;机：</label>
                <input type="text" name="phonenum" value="{$row['phonenum']}" id="phonenum"/>
            </th>
        </tr>
        <tr>
            <th>
                <label for="address">地&nbsp;&nbsp;&nbsp;址：</label>
                <input type="text" name="address" value="{$row['address']}" id="address"/>
            </th>
        </tr>
        <tr>
            <th>
                <label for="email">邮&nbsp;&nbsp;&nbsp;箱：</label>
                <input type="email" name="email" value="{$row['email']}" id="email"/>
            </th>
        </tr>
        <tr>
            <th>
                <input type="submit" name="change" value="Submit" />
            </th>
        </tr>
    </table>
</form>
str;
    }
} catch (Throwable $e){
    $html =<<<str
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
            <h2 class="arc-title"><a href="./sqli_edit.php">"Insert/Update" 注入 - 修改信息</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
                <li><i class="mdi mdi-comment-multiple-outline"></i> <a href="?show">显示源码</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <?php echo $html;echo "<br />".show_code($_GET['show']);?>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>