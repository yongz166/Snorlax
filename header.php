<?php
ob_start();
if (!isset($ROOT_DIR)){
    $ROOT_DIR = '';
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Snorlax</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $ROOT_DIR;?>assets/images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="<?php echo $ROOT_DIR;?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $ROOT_DIR;?>assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $ROOT_DIR;?>assets/css/style.min.css" />
</head>
<body>
<header class="lyear-header text-center" style="background-image:url(<?php echo $ROOT_DIR;?>assets/images/left-bg.jpg);">
    <div class="lyear-header-container">
        <div class="lyear-mask"></div>
        <h1 class="lyear-blogger pt-lg-4 mb-0"><a href="<?php echo $ROOT_DIR;?>index.php">Sonrlax</a></h1>
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <div class="lyear-hamburger">
                    <div class="hamburger-inner"></div>
                </div>
            </a>

            <div id="navigation" class="collapse navbar-collapse flex-column">
                <div class="profile-section pt-3 pt-lg-0">
                    <img class="profile-image mb-3 rounded-circle mx-auto" src="<?php echo $ROOT_DIR;?>assets/images/logo.png" width="120" height="120" alt="Yongz丶" >
                    <div class="lyear-sentence mb-3">
                        只要路是对的，就不怕路远。<br />
                        你所羡慕的一切，背后藏着多少不为人知的心酸与努力。
                        那一切，并非突如其来，全都是早有准备。
                    </div>
                    <hr>
                </div>

                <ul class="navbar-nav flex-column text-center">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo $ROOT_DIR;?>index.php">首页</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo $ROOT_DIR;?>vul/vul.php">漏洞列表</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo $ROOT_DIR;?>install.php">数据库安装/初始化</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo $ROOT_DIR;?>about.php">关于</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<div class="lyear-wrapper">
    <section class="mt-5 pb-5">
        <div class="container">
            <div class="row">