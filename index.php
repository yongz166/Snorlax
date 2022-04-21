<?php
include_once "inc/config.inc.php";
include_once "header.php";

$db_con = "";
$con = new mysqli();
$con->connect(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_PORT);
if($con->connect_error){
    $db_con= <<<str
<p >
        <a href='install.php' style='color:red;'>
        提示:欢迎使用 Sorlax，但数据库还未初始化，点击进行初始化安装!
        </a>
    </p>
str;
}
?>

<!-- 修改内容 -->
<div class="col-xl-8">
  <article class="lyear-arc">
    <div class="arc-header">
      <h2 class="arc-title"><a href="index.php">Snorlax Introduce</a></h2>
      <ul class="arc-meta">
        <li><i class="mdi mdi-calendar"></i> <?php echo date('Y-m-d G:i:s');?></li>
        <li><i class="mdi mdi-tag-text-outline"></i> <a href="vul/vul.php">漏洞, 靶场</a></li>
      </ul>
    </div>
    <div class="arc-synopsis">
      <?php echo $db_con;?>
        <div>
            <p>Snorlax 是一个基于 PHP 开发且带有 Web 漏洞的靶场合集，在这里包含了常见的 Web 安全漏洞。但由于个人精力问题，所写的漏洞不是很多，但还是挺有参考价值的。</p>
        </div>
        <div>
            <h6 style="color: black">Snorlax 漏洞类型列表如下：</h6>
            <ul>
                <li>Burt Force (暴力破解)</li>
                <li>Cross Site Script (跨站脚本)</li>
                <li>SQL Injection (SQL 注入)</li>
                <li>RCE (远程命令/代码执行)</li>
                <li>File Include (文件包含)</li>
                <li>File Upload (文件上传)</li>
            </ul>
        </div>
        每类漏洞根据不同的情况又分别设计了不同的子类。<br />
        同时，为了让这些漏洞变得有意思一些，在 Snorlax 中为每一个子类都设计了一些小的场景。<br /><br />
        <div>
            <h6 style="color: black">Snorlax 安装与使用：</h6>
            <ul>
                <li>Snorlax 使用世界上最好的语言 PHP 进行开发[dog]，使用数据库为 MySQL，中间件是 Apache，因此运行 Sonrlax 你需要提前安装好基础环境，建议在您的测试环境直接使用一些集成软件来搭建这些基础环境，比如：XAMPP、WampServer、PhpStudy 等，作为一个在安全圈里的人，这些东西对你来说应该不是什么难事。</li>
                <li>
                    使用步骤：
                    <ul>
                        --> 把下载下来的 Snorlax 文件夹放到 Web 服务器根目录下。<br />
                        --> 根据实际情况修改数据库连接配置。<br />
                        --> 访问 http://x.x.x.x/Snorlax，会有一个红色的热情提示"欢迎使用 Snorlax，但数据库还未初始化，点击进行初始化安装!"，点击即可完成安装。<br />
                        --> PHP 版本推荐 7.0 以上，但个别关卡需要低版本。
                    </ul>
                </li>
            </ul>
        </div>
        <div>
            <h6 style="color: black">切记：</h6>
            <ul>
                <li>坚持是应对挫折的最好方法。</li>
            </ul>
        </div>
    </div>
  </article>
</div>

<?php include_once "footer.php" ?>