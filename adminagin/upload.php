<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/5
 * Time: 20:36
 */
$type=array(
    "image/jpeg","image/png","image/gif"
);
$path="./upload";
$size=1024*1024*10;
if(is_uploaded_file($_FILES["file"]["tmp_name"])){
    //1.  是不是上传文件
    //2.  是不是指定的类型
    //3.  是不是指定的大小
    if(in_array($_FILES["file"]["type"],$type)&&$_FILES['file']['size']<$size){
        if(!is_dir($path)){
            mkdir("./upload");
        }

        $dir=date("y-m-d");
        if(!is_dir("./upload/".$dir)){
            mkdir("./upload/".$dir);
        }
        $name=time().$_FILES["file"]["name"];
        $fullpath="./upload/".$dir."/".$name;
        move_uploaded_file($_FILES["file"]["tmp_name"],$fullpath);
        echo "ok";
    }else{
      echo "类型错误";
    }
}