<?php
/**
 * Created by PhpStorm
 * User: Yongz丶
 * Date: 2022/3/4
 * Time: 16:43
 */

// 指定返回目录层级
$ROOT_DIR = '../../../';
include_once "{$ROOT_DIR}header.php";               // 头部文件
include_once "{$ROOT_DIR}inc/config.inc.php";       // 基本配置
include_once "{$ROOT_DIR}inc/function.inc.php";     // 函数

$result = "";

if (isset($_GET['change'])){
    if (!empty($_GET['ip'])){
        $ip = $_GET['ip'];
        if (stristr(php_uname('s'), 'windows NT')){
            $result = shell_exec('ping '.$ip);
        } else{
            $result = shell_exec('ping -c 4 '.$ip);
        }
    } else{
        $result = "<br />The Input Cannot be Null";
    }
}
$html = iconv("GBK", "UTF-8", $result);

?>
<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="../../vul.php">RCE Exec</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
                <li><i class="mdi mdi-comment-multiple-outline"></i> <a href="?show">显示源码</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <h6 style="color: black">Please Enter The Target IP Address</h6>
            <form action="#" method="GET">
                <table>
                    <tr>
                        <th>
                            <label for="ip">目标 IP：</label>
                            <input type="text" name="ip" placeholder="IP Address" id="ip"/>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <input type="submit" name="change" value="Ping" />
                        </th>
                    </tr>
                </table>
            </form>
            <?php echo "<pre><code><h6>{$html}</h6></code></pre>";echo show_code($_GET['show']);?>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>