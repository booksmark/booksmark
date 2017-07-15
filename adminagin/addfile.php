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
    public $size=2000;
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
        if(is_uploaded_file($_FILES["$file"]["tmp_name"])){
            if(in_array($_FILES["$file"]["type"],$this->type)) {
                if($_FILES["$file"]['size']<$this->size) {
                    if (!is_dir($this->path)) {
                        mkdir("./upload");
                    }
                    $dir = date("y-m-d");
                    if (!is_dir("./upload/" . $dir)) {
                        mkdir("./upload/" . $dir);
                    }
                    $name =time().mt_rand(1000,1999) . $_FILES["$file"]["name"];
                    $fullpath = "./upload/" . $dir . "/" . $name;
                    move_uploaded_file($_FILES["$file"]["tmp_name"], $fullpath);
                    echo $fullpath;
                }else{
                    echo "图片过大，换一张试试";
                }
            }else{
                echo "类型错误";
            }
        }
    }
}
$obj=new FILE();
$obj->type(["image/jpeg","image/png","image/gif"])->Size(200000);
$obj->panduan('file');

//class No{
//    public $type="image/jpeg,image/png,image/gif";
//    public $size;
//    public $path="uploads";
//    public $dir;
//    public function move(){
//
//    }
//    public function __construct($file){
//        $this->file=$_FILES[$file];
//    }
//
//    public function up(){
//        if(is_uploaded_file($this->file["tmp_name"])){
//            if(strrchr($this->type,$this->file['type'])&&$this->size>$this->file['size']){
//                if(!is_dir($this->path)){
//                    mkdir($this->path);
//                }
//                $this->dir=date('y-m-d');
//                if(!is_dir($this->path."/".$this->dir."/")){
//                    mkdir($this->path."/".$this->dir."/");
//                }
//            }
//        }else{
//            echo "error";
//        }
//    }
//}
//$obj=new No('file');
//$obj->size=200000;
//$obj->up();
