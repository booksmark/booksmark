<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/5
 * Time: 18:15
 */
//文件  传递的模式  post  传递的编码   接收到的文件  保存
//对用户上传上来的文件作分析和处理
//获取到文件信息
//临时文件夹的方式


//判断要处理的文件是不是用户上传的文件  is_uploaded_file();

class FILE{
    public $size=20000;
    public $type=array("image/jpeg","image/png","image/gif");
    public $path="upload";
    public function Size($size){
        $this->size=$size;
        return $this;
    }
    public function type($arr){
        $this->type=$arr;
        return $this;
    }
    public function panduan($file){
        var_dump( $_FILES["$file"]);
//        if(is_uploaded_file($_FILES["$file"]["tmp_name"])){
//            if(in_array($_FILES["$file"]["type"],$this->type)&&$_FILES["$file"]['size']<$this->size) {
//
//                if (!is_dir($this->path)) {
//                    mkdir("./upload");
//                }
//
//                if (!is_dir($this->path)) {
//                    mkdir("./upload");
//                }
//                $dir = date("y-m-d");
//                if (!is_dir("./upload/" . $dir)) {
//                    mkdir("./upload/" . $dir);
//                }
//                $name = time() . $_FILES["file"]["name"];
//                $fullpath = "./upload/" . $dir . "/" . $name;
//                move_uploaded_file($_FILES["$file"]["tmp_name"], $fullpath);
//                echo $fullpath;
//            }else{
//                echo "错误";
//            }
//        }
    }
}
$obj=new FILE();
$obj->type(['image/jpg','image/gif','image/png'])->Size(200000);
$obj->panduan("file");