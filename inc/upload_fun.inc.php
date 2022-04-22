<?php

// 客户端前端验证函数




// 黑名单类型验证，.htaccess 绕过
function upload_htaccess($file,$save_path){

    // 定义错误代码数组
    $arr_error = array(
        0 => "文件上传成功！",
        1 => "上传文件的大小超过了 php.ini 中 upload_max_filesize 选项限制的值！",
        2 => "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项限制的值！",
        3 => "文件只有部分被上传，请再次尝试上传！",
        4 => "没有文件被上传，请再次尝试上传！",
        6 => "找不到临时文件夹！",
        7 => "文件写入失败！"
    );

    // 判断是否有上传产生
    if (!isset($_FILES[$file]['error'])){
        $file_data['error'] = "请选择上传文件！";
        $file_data['return'] = false;
        return $file_data;
    }

    // 判断是否有错误产生
    if ($_FILES[$file]['error'] != 0){
        $file_data['error'] = $arr_error[$_FILES[$file]['error']];
        $file_data['return'] = false;
        return $file_data;
    }

    // 黑名单后缀验证
    $black_ext = array("php", "php3", "php4", "php5", "phtm", "ini");
    $filename = $_FILES[$file]['name'];
    $ext = strtolower(pathinfo($filename)['extension']);
    if (in_array($ext,$black_ext)){
        $file_data['error'] = "不允许上传 {$ext} 格式的文件";
        $file_data['return'] = false;
        return $file_data;
    }

    // 判断是否有文件保存路径，没有则创建
    if (!file_exists($save_path)){
        if (!mkdir($save_path,0777,true)){
            $file_data['error'] = "上传文件保存目录创建失败，请检查权限!";
            $file_data['return'] = false;
            return $file_data;
        }
    }

    // 判断文件是否成功移动
    $save_path = rtrim($save_path,'/')."/";
    if (!move_uploaded_file($_FILES[$file]['tmp_name'],$save_path.$_FILES[$file]['name'])){
        $file_data['error'] = "临时文件夹移动失败，请检查权限！";
        $file_data['return'] = false;
        return $file_data;
    }

    // 如果以上都通过了，则返回这些值：存储路径、新的文件名（不要暴露出去）
    $file_data['new_path'] = $save_path.$_FILES[$file]['name'];
    $file_data['return'] = true;
    return $file_data;

}

// 黑名单类型验证，.user.ini 绕过
function upload_userini($file,$save_path){

    // 定义错误代码数组
    $arr_error = array(
        0 => "文件上传成功！",
        1 => "上传文件的大小超过了 php.ini 中 upload_max_filesize 选项限制的值！",
        2 => "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项限制的值！",
        3 => "文件只有部分被上传，请再次尝试上传！",
        4 => "没有文件被上传，请再次尝试上传！",
        6 => "找不到临时文件夹！",
        7 => "文件写入失败！"
    );

    // 判断是否有上传产生
    if (!isset($_FILES[$file]['error'])){
        $file_data['error'] = "请选择上传文件！";
        $file_data['return'] = false;
        return $file_data;
    }

    // 判断是否有错误产生
    if ($_FILES[$file]['error'] != 0){
        $file_data['error'] = $arr_error[$_FILES[$file]['error']];
        $file_data['return'] = false;
        return $file_data;
    }

    // 黑名单后缀验证
    $black_ext = array("php", "php7", "php5", "php4", "php3", "phtml", "pht", "htaccess");
    $filename = $_FILES[$file]['name'];
    $ext = pathinfo($filename)['extension'];
    if (in_array($ext,$black_ext)){
        $file_data['error'] = "不允许上传 {$ext} 格式的文件";
        $file_data['return'] = false;
        return $file_data;
    }

    // 判断是否有文件保存路径，没有则创建
    if (!file_exists($save_path)){
        if (!mkdir($save_path,0777,true)){
            $file_data['error'] = "上传文件保存目录创建失败，请检查权限!";
            $file_data['return'] = false;
            return $file_data;
        }
    }

    // 判断文件是否成功移动
    $save_path = rtrim($save_path,'/')."/";
    if (!move_uploaded_file($_FILES[$file]['tmp_name'],$save_path.$_FILES[$file]['name'])){
        $file_data['error'] = "临时文件夹移动失败，请检查权限！";
        $file_data['return'] = false;
        return $file_data;
    }

    // 如果以上都通过了，则返回这些值：存储路径、新的文件名（不要暴露出去）
    $file_data['new_path'] = $save_path.$_FILES[$file]['name'];
    $file_data['return'] = true;
    return $file_data;

}

// 黑名单类型验证，大小写绕过
function upload_cs($file,$save_path){

    // 定义错误代码数组
    $arr_error = array(
        0 => "文件上传成功！",
        1 => "上传文件的大小超过了 php.ini 中 upload_max_filesize 选项限制的值！",
        2 => "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项限制的值！",
        3 => "文件只有部分被上传，请再次尝试上传！",
        4 => "没有文件被上传，请再次尝试上传！",
        6 => "找不到临时文件夹！",
        7 => "文件写入失败！"
    );

    // 判断是否有上传产生
    if (!isset($_FILES[$file]['error'])){
        $file_data['error'] = "请选择上传文件！";
        $file_data['return'] = false;
        return $file_data;
    }

    // 判断是否有错误产生
    if ($_FILES[$file]['error'] != 0){
        $file_data['error'] = $arr_error[$_FILES[$file]['error']];
        $file_data['return'] = false;
        return $file_data;
    }

    // 黑名单后缀验证
    $black_ext = array("php", "php7", "php5", "php4", "php3", "phtml", "pht", "htaccess");
    $filename = $_FILES[$file]['name'];
    $ext = pathinfo($filename)['extension'];
    if (in_array($ext,$black_ext)){
        $file_data['error'] = "不允许上传 {$ext} 格式的文件";
        $file_data['return'] = false;
        return $file_data;
    }

    // 判断是否有文件保存路径，没有则创建
    if (!file_exists($save_path)){
        if (!mkdir($save_path,0777,true)){
            $file_data['error'] = "上传文件保存目录创建失败，请检查权限!";
            $file_data['return'] = false;
            return $file_data;
        }
    }

    // 判断文件是否成功移动
    $save_path = rtrim($save_path,'/')."/";
    if (!move_uploaded_file($_FILES[$file]['tmp_name'],$save_path.$_FILES[$file]['name'])){
        $file_data['error'] = "临时文件夹移动失败，请检查权限！";
        $file_data['return'] = false;
        return $file_data;
    }

    // 如果以上都通过了，则返回这些值：存储路径、新的文件名（不要暴露出去）
    $file_data['new_path'] = $save_path.$_FILES[$file]['name'];
    $file_data['return'] = true;
    return $file_data;

}