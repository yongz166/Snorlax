<?php

session_start();

include_once "function.inc.php";

$_SESSION['vcode'] = vcode();

