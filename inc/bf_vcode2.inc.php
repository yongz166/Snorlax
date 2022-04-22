<?php

session_start();

include_once "function.inc.php";

$_SESSION['vcode'] = vcode();

setcookie('vcode',$_SESSION['vcode']);

