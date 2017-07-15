<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/5/7
 * Time: 21:01
 */

//··········································图形图像操作
session_start();
header("content-type:image/png");
$img=imagecreate(100,50);
$words=array(
    1,2,3,4,5,6,7,8,9,0,"q","w","e","r","t","y","u","i","o","p","l","k","j","h","g","f","d","s","a","z","x","c","v","b","n","m"
);
function getcolor($img,$color='q'){
   switch ($color){
       case 'q':return imagecolorallocate($img,mt_rand(130,240),mt_rand(130,240),mt_rand(130,240));
       case 's':return imagecolorallocate($img,mt_rand(10,120),mt_rand(10,120),mt_rand(10,120));
   }
}
imagefill($img,0,0,getcolor($img,'q'));
for ($i=0;$i<3;$i++) {
    imageline($img, mt_rand(30, 80), mt_rand(10, 20), mt_rand(60, 90), mt_rand(20, 45), getcolor($img, 's'));
}
for ($j=0;$j<20;$j++) {
    imagesetpixel($img,mt_rand(5,95),mt_rand(5,45),getcolor($img,'s'));
}

$arr='';
for($z=0;$z<4;$z++){
    $now=$words  [ mt_rand(0,count($words)-1)];
    $arr.=$now;
    imagettftext($img,mt_rand(15,35),mt_rand(-20,20),mt_rand(10+$z*20,10+($z+1)*20),mt_rand(35,45),getcolor($img,"s"),"CENTURY.TTF",$now);
}
$_SESSION['yzm']=$arr;

imagepng($img);
imagedestroy($img);

//画文字还有两种方式
//imagechar();
//imagestring();