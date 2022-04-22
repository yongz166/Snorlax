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
    if(isset($_POST['submit'])) {
        if (isset($_POST['message']) && !empty($_POST['message'])){
            $message = $link->escape_string($_POST['message']);
            $sql_insert=<<<str
INSERT INTO message (content,time) 
VALUES ('{$message}',now())
str;
            $result = $link->query($sql_insert);
            if (!$result){
                $html = "留言失败，请再次尝试！";
            }
        }
    }

    if (isset($_GET['id']) && !empty($_GET['id'])){
        $sql_delete=<<<str
DELETE FROM message WHERE id = {$_GET['id']}
str;
        $result = $link->query($sql_delete);
        if (!$result){
            $html = "删除失败，请再次尝试！".$link->error;
        } else{
            header("location:sqli_delete.php");
        }
    }
} catch (Throwable $e){
    $html =<<<str
不能这么输入哦~~
str;
}

?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="sqli_delete.php">"Delete" 注入</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
                <li><i class="mdi mdi-comment-multiple-outline"></i> <a href="?show">显示源码</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <h6 style="color: black">这是一个留言板：</h6>
            <div>
                <form action="#" method="post">
                    <table>
                        <tr>
                            <th>
                                <textarea name="message" style="width: 350px;height: 150px"></textarea>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <input type="submit" name="submit" value="留言" />&nbsp;&nbsp;
                            </th>
                        </tr>
                    </table>
                </form>
            </div>
            <div><br />
                <h6 style="color: black">留言列表：</h6>
                <?php
                echo $html;
                $sql_query = "SELECT * FROM message";
                $result = $link->query($sql_query);
                while($row = $result->fetch_assoc()){
                    echo htmlspecialchars($row['content'],ENT_QUOTES);
                    echo "<br /><a href='sqli_delete.php?id={$row['id']}'>删除</a><br /><hr />";
                }
                $link->close();
                echo show_code($_GET['show']);
                ?>
            </div>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>
