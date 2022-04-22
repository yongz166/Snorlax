<?php
include_once 'header.php';
include_once 'inc/config.inc.php';

$db_host = DB_HOST;
$db_user = DB_USER;
$db_pass = DB_PASS;
$db_name = DB_NAME;
$db_port = DB_PORT;

$mes_connect='';
$mes_create='';
$mes_data='';
$mes_ok='';

if(isset($_POST['submit'])){
    //判断数据库连接
    $con = new mysqli();
    $con->connect(DB_HOST,DB_USER,DB_PASS);
    if($con->connect_error){
        die("数据库连接失败，失败原因：".$con->connect_error);
    }
    $mes_connect .= "数据库连接成功！";

    // ----------------------------- Sonrlax -------------------------------------
    $drop_db = "DROP DATABASE IF EXISTS {$db_name}";
    $result = $con->query($drop_db);
    if(!$result){
        die("初始化数据库失败，请仔细检查当前用户是否有操作权限");
    }

    $create_db = "CREATE DATABASE {$db_name}";
    $result = $con->query($create_db);
    if(!$result){
        die("数据库创建失败，请仔细检查当前用户是否有操作权限");
    }
    $mes_create .= "新建数据库: {$db_name} 成功！";

    $result = $con->select_db(DB_NAME);
    if(!$result){
        die("数据库选择失败，请仔细检查当前用户是否有操作权限");
    }

    // ---------------------------- USER -----------------------------------------
    $create_user=<<<str
CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`username` varchar(15) NOT NULL,
`password` varchar(32) NOT NULL,
PRIMARY KEY (`id`)
)CHARSET=utf8 AUTO_INCREMENT=4
str;
    $result = $con->query($create_user);
    if(!$result){
        die("创建 users 表失败，请仔细检查当前用户是否有操作权限");
    }

    $insert_user=<<<str
INSERT INTO `users` (`id`,`username`,`password`) 
VALUES (1,'admin',md5('123456')),
       (2,'snorlax',md5('snorlax')),
       (3,'test',md5('test'))
str;
    $result = $con->query($insert_user);
    if(!$result){
        die("插入 users 表数据失败，请仔细检查当前用户是否有操作权限");
    }

    // ---------------------------- Message -----------------------------------------
    $create_message=<<<str
CREATE TABLE IF NOT EXISTS `message` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`content` varchar(255) NOT NULL,
`time` datetime NOT NULL,
PRIMARY KEY (`id`)
)CHARSET=utf8 AUTO_INCREMENT=50
str;
    $result = $con->query($create_message);
    if(!$result){
        die("创建 message 表失败，请仔细检查当前用户是否有操作权限");
    }

    // ---------------------------- Member -----------------------------------------
    $create_member=<<<str
CREATE TABLE IF NOT EXISTS `member` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`username` varchar(15) NOT NULL,
`passwd` varchar(32) NOT NULL,
`sex` varchar(10) NOT NULL,
`phonenum` varchar(255) NOT NULL,
`address` varchar(255) NOT NULL,
`email` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
)CHARSET=utf8 AUTO_INCREMENT=25
str;
    $result = $con->query($create_member);
    if(!$result){
        die("创建 member 表失败，请仔细检查当前用户是否有操作权限");
    }

    $insert_member=<<<str
INSERT INTO `member` (`id`,`username`,`passwd`,`sex`,`phonenum`,`address`,`email`) 
VALUES (1,'yongz',md5('123456'),'boy','13813759669','china','yongz@snorlax.com'),
       (2,'11nxx',md5('123456'),'boy','17707681783','england','11nxx@snorlax.com'),
       (3,'xuyaoyao',md5('123456'),'boy','14567964324','america','xuyaoyao@snorlax.com'),
       (4,'lishasha',md5('123456'),'girl','17374193136','canada','lishasha@snorlax.com'),
       (5,'sunbin',md5('123456'),'boy','13280627628','poland','sunbin@snorlax.com')
str;
    $result = $con->query($insert_member);
    if(!$result){
        die("插入 member 表数据失败，请仔细检查当前用户是否有操作权限");
    }

    // ---------------------------- HTTPINFO -----------------------------------------
    $create_httpinfo=<<<str
CREATE TABLE IF NOT EXISTS `httpinfo` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`ip_address` varchar(20) NOT NULL,
`user_agent` varchar(100) NOT NULL,
`re_port` varchar(10) NOT NULL,
PRIMARY KEY (`id`)
)CHARSET=utf8 AUTO_INCREMENT=75
str;
    $result = $con->query($create_httpinfo);
    if(!$result){
        die("创建 httpinfo 表失败，请仔细检查当前用户是否有操作权限");
    }

    // ---------------------------- VulType -----------------------------------------
    $create_vultype=<<<str
CREATE TABLE IF NOT EXISTS `vultype` (
`id` int unsigned NOT NULL AUTO_INCREMENT,
`vulname` varchar(20) NOT NULL,
`typename` varchar(100) NOT NULL,
`path` varchar(100) NOT NULL,
PRIMARY KEY (`id`)
)CHARSET=utf8
str;
    $result = $con->query($create_vultype);
    if(!$result){
        die("创建 vultype 表失败，请仔细检查当前用户是否有操作权限");
    }

    $insert_vultype=<<<str
INSERT INTO `vultype` (`id`,`vulname`,`typename`,`path`) 
VALUES (1000,'burtforce','暴力破解漏洞概述','burteforce/burteforce.php'),
       (1001,'burtforce','基于表单的暴力破解','burteforce/1.bf_form/bf_form.php'),
       (1002,'burtforce','验证码绕过 (On Client)','burteforce/2.bf_client/bf_client.php'),
       (1003,'burtforce','验证码绕过 (On Server 1)','burteforce/3.bf_server1/bf_server.php'),
       (1004,'burtforce','验证码绕过 (On Server 2)','burteforce/4.bf_server2/bf_server.php'),
       (1005,'burtforce','Token 防爆破 ?','burteforce/5.bf_token/bf_token.php'),
       (2000,'xss','跨站脚本漏洞概述','xss/xss.php'),
       (2001,'xss','反射型 XSS','xss/1.xss_reflected/xss_reflected.php'),
       (2002,'xss','存储型 XSS','xss/2.xss_stored/xss_stored.php'),
       (2003,'xss','DOM 型 XSS','xss/3.xss_dom/xss_dom.php'),
       (2004,'xss','XSS htmlspecialchars 1','xss/4.xss_htmlspecialchars1/xss_htmlspecialchars.php'),
       (2005,'xss','XSS htmlspecialchars 2','xss/5.xss_htmlspecialchars2/xss_htmlspecialchars.php'),
       (3000,'sql','SQL 注入漏洞概述','sqli/sqli.php'),
       (3001,'sql','数字型注入(Get)','sqli/1.sqli_get/sqli_get.php'),
       (3002,'sql','字符型注入(Post)','sqli/2.sqli_post/sqli_post.php'),
       (3003,'sql','搜索型注入(Like)','sqli/3.sqli_search/sqli_search.php'),
       (3004,'sql','布尔盲注(Bool)','sqli/4.sqli_bool/sqli_bool.php'),
       (3005,'sql','时间盲注(Time)','sqli/5.sqli_time/sqli_time.php'),
       (3006,'sql','"Insert/Update" 注入','sqli/6.sqli_in_up/sqli_login.php'),
       (3007,'sql','"Delete" 注入','sqli/7.sqli_delete/sqli_delete.php'),
       (3008,'sql','"Header" 注入','sqli/8.sqli_header/sqli_header.php'),
       (3009,'sql','宽字节注入','sqli/9.sqli_widebyte/sqli_widebyte.php'),
       (3010,'sql','二次注入','sqli/10.sqli_secondary/sqli_login.php'),
       (3011,'sql','堆叠注入','sqli/11.sqli_stacked/sqli_stacked.php'),
       (3012,'sql','Order 注入','sqli/12.sqli_order/sqli_order.php'),
       (4000,'rce','RCE 漏洞概述','rce/rce.php'),
       (4001,'rce','RCE Exec','rce/1.rce_exec/rce_exec.php'),
       (4002,'rce','RCE Eval','rce/2.rce_eval/rce_eval.php'),
       (5000,'fileinclude','文件包含漏洞概述','fileinclude/fileinclude.php'),
       (5001,'fileinclude','本地文件包含','fileinclude/1.fi_local/fi_local.php'),
       (5002,'fileinclude','远程文件包含','fileinclude/2.fi_remote/fi_remote.php'),
       (5003,'fileinclude','本地包含绕过','fileinclude/3.fi_jd/fi_jd.php'),
       (6000,'fileupload','文件上传漏洞概述','fileupload/fileupload.php'),
       (6001,'fileupload','客户端校验','fileupload/1.fu_client/fu_client.php'),
       (6002,'fileupload','MIME 校验','fileupload/2.fu_mime/fu_mime.php'),
       (6003,'fileupload','Apache 配置文件','fileupload/3.fu_htaccess/fu_htaccess.php'),
       (6004,'fileupload','PHP 配置文件','fileupload/4.fu_userini/fu_userini.php'),
       (6005,'fileupload','黑名单校验','fileupload/5.fu_blacklist/fu_blacklist.php')
str;
    $result = $con->query($insert_vultype);
    if(!$result){
        die("插入 vultype 表数据失败，请仔细检查当前用户是否有操作权限".$con->error);
    }

    $mes_data .= "创建数据库数据成功！";
    $mes_ok .= "好了，可以开搞了～<a href='index.php' style='color:red;'>点击这里</a>进入首页";

}



?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="index.php">Database Installation</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="vul/vul.php">漏洞, 靶场</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <h6 style="color:black;">系统初始化安装</h6>
            <p>Setup guide:</p>
            <div>
                <ul>
                    <li>第0步：请提前安装 "Apache + PHP + MySQL" 的环境;</li>
                    <li>第1步：请根据实际环境修改 "inc/config.inc.php" 文件里面的参数;</li>
                    <li>第2步：点击 "安装/初始化" 按钮;</li>
                </ul>
                <form method="post">
                    <input type="submit" name="submit" value="安装/初始化"/><br /><br />
                </form>
            </div>
            <div>
                <?php
                echo $mes_connect."<br />";
                echo $mes_create."<br />";
                echo $mes_data."<br />";
                echo $mes_ok;
                ?>
            </div>
        </div>
    </article>
</div>

<?php include_once "footer.php" ?>

