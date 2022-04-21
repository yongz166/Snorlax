<?php
/**
 * Created by PhpStorm
 * User: Yongz丶
 * Date: 2022/3/5
 * Time: 12:24
 */

// 指定返回目录层级
$ROOT_DIR = '../../../';
include_once "{$ROOT_DIR}header.php";               // 头部文件
include_once "{$ROOT_DIR}inc/config.inc.php";       // 基本配置
include_once "{$ROOT_DIR}inc/function.inc.php";     // 函数

$html = "";

if (isset($_GET['submit'])){
    if (!empty($_GET['string'])){
        $str = $_GET['string'];
        $eval = eval($str.';');
        if(!$eval){
            $html = "要不~，随便输一个命令~";
        }
    } else{
        $html = "The Input Cannot be Null";
    }
}

?>

<!-- 修改内容 -->
<div class="col-xl-8">
    <article class="lyear-arc">
        <div class="arc-header">
            <h2 class="arc-title"><a href="../../vul.php">RCE Eval</a></h2>
            <ul class="arc-meta">
                <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
                <li><i class="mdi mdi-tag-text-outline"></i> <a href="<?php echo "{$ROOT_DIR}vul/vul.php"?>">漏洞, 靶场</a></li>
                <li><i class="mdi mdi-comment-multiple-outline"></i> <a href="?show">显示源码</a></li>
            </ul>
        </div>
        <div class="arc-synopsis">
            <h6 style="color: black">Please Enter The String：</h6>
            <form action="#" method="GET">
                <table>
                    <tr>
                        <th>
                            <label for="string">字符：</label>
                            <input type="text" name="string" placeholder="String" id="string"/>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <input type="submit" name="submit" value="Submit" />
                        </th>
                    </tr>
                </table>
            </form>
            <?php echo "<br />".$html;echo show_code($_GET['show']);?>
        </div>
    </article>
</div>

<?php include_once "{$ROOT_DIR}footer.php" ?>