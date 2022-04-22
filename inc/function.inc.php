<?php

// 验证码
function vcode(){

    $string = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $str = "";

    for($i=0;$i<6;$i++){
        $pos = rand(0,61);
        $str .= $string[$pos];
    }

    $img_handle = Imagecreate(80, 20);  //图片大小80X20
    $back_color = ImageColorAllocate($img_handle, 255, 255, 255); //背景颜色（白色）
    $txt_color = ImageColorAllocate($img_handle, 0,0, 0);  //文本颜色（黑色）

    //加入干扰线
    for($i=0;$i<3;$i++)
    {
        $line = ImageColorAllocate($img_handle,rand(0,255),rand(0,255),rand(0,255));
        Imageline($img_handle, rand(0,15), rand(0,15), rand(100,150),rand(10,50), $line);
    }

    //加入干扰象素
    for($i=0;$i<200;$i++)
    {
        $randcolor = ImageColorallocate($img_handle,rand(0,255),rand(0,255),rand(0,255));
        Imagesetpixel($img_handle, rand()%100 , rand()%50 , $randcolor);
    }

    Imagefill($img_handle, 0, 0, $back_color);             //填充图片背景色
    ImageString($img_handle, 28, 10, 0, $str, $txt_color);//水平填充一行字符串

    ob_clean();   // ob_clean()清空输出缓存区
    header("Content-type: image/png"); //生成验证码图片
    Imagepng($img_handle);//显示图片
    return $str;

}

// 生成一个 Token，以当前微秒的时间 + 5位的前缀
function set_token(){
    if(isset($_SESSION['token'])){
        unset($_SESSION['token']);
    }
    $_SESSION['token'] = str_replace('.','',uniqid(mt_rand(10000,99999),true));
}

// 在访问一个页面时，先验证是否登录，SQLi 的 insert、update 问题里面，使用的是 Session 验证
function check_sqli_in_up_session($link){
    if (isset($_SESSION['sqli']['username']) && isset($_SESSION['sqli']['password'])){
        $sql_query = "SELECT * FROM member WHERE username = '{$_SESSION['sqli']['username']}' and passwd = md5('{$_SESSION['sqli']['password']}')";
        $result = $link->query($sql_query);
        if($result->num_rows){
            return true;
        } else{
            return false;
        }
    }else {
        return false;
    }
}

// 在访问一个页面时，先验证是否登录，SQLi 的 Secondary 问题里面，使用的是 Session 验证
function check_sqli_second_session($link){
    if (isset($_SESSION['sqli']['username']) && isset($_SESSION['sqli']['password'])){
        $sql_query = "SELECT * FROM users WHERE username = '{$_SESSION['sqli']['username']}' and password = md5('{$_SESSION['sqli']['password']}')";
        $result = $link->query($sql_query);
        if($result->num_rows){
            return true;
        } else{
            return false;
        }
    }else {
        return false;
    }
}

// 查看源码
function show_code($show){
    if (isset($show)) {
        $file = file_get_contents("sourcecode.txt", FILE_APPEND);
        $file = htmlspecialchars($file);
        return<<<str
<pre><code><h6>$file</h6></code></pre>
str;
    }
}

// 删除指定目录下的文件，不删除目录文件夹
function delFile($dirName){
    if (file_exists($dirName) && $dh = opendir($dirName)){
        while (($file = readdir($dh)) !== false){
            if ($file !== "." && $file !== ".." && $file !== "README.php"){
                unlink($dirName."/".$file);
            }
        }
        closedir($dh);
    }
}

function showFile($dirName){
    if (file_exists($dirName) && $dh = opendir($dirName)){
        while (($file = readdir($dh)) !== false){
            if ($file !== "." && $file !== ".." && $file !== "README.php"){
                $a .= $file."<br />";
            }
        }
        closedir($dh);
        if (empty($a)){
            return "当前上传目录为空！";
        } else{
            return $a;
        }
    }
}