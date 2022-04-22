<?php
if (!isset($ROOT_DIR)){
    $ROOT_DIR = '';
}
?>
<div class="col-xl-4">
    <div class="lyear-sidebar">
        <!-- 基础学习 -->
        <aside class="widget widget-hot-posts">
            <div class="widget-title">基础知识学习</div>
            <ul>
                <li>
                    <a href="https://www.bilibili.com/" target="_blank">BiliBili (安全基础)</a>
                </li>
                <li>
                    <a href="https://www.runoob.com/" target="_blank">菜鸟教程 (编程文档)</a>
                </li>
                <li>
                    <a href="https://ctf.show/" target="_blank">CTFShow (CTF 练习平台)</a>
                </li>
            </ul>
        </aside>

        <!-- WriteUp -->
        <aside class="widget">
            <div class="widget-title">WriteUp</div>
            <ul>
                <li><a href="<?php echo $ROOT_DIR;?>wp/burteforce/burteforce.php">Burt Force</a></li>
                <li><a href="<?php echo $ROOT_DIR;?>wp/xss/xss.php">Cross Site Script</a></li>
                <li><a href="<?php echo $ROOT_DIR;?>wp/sqli/sqli.php">SQL Injection</a></li>
                <li><a href="<?php echo $ROOT_DIR;?>wp/rce/rce.php">RCE</a></li>
                <li><a href="<?php echo $ROOT_DIR;?>wp/fileinclude/fileinclude.php">File Include</a></li>
                <li><a href="<?php echo $ROOT_DIR;?>wp/fileupload/fileupload.php">File Upload</a></li>
            </ul>
        </aside>

    </div>
</div>
</div>
</div>
<!-- end container -->
</section>
</div>
<script type="text/javascript" src="<?php echo $ROOT_DIR;?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $ROOT_DIR;?>assets/js/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="<?php echo $ROOT_DIR;?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $ROOT_DIR;?>assets/js/main.min.js"></script>
</body>
</html>