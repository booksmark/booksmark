<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/5/27
 * Time: 17:15
 */
class Nub{
    public function n($num){
        if($num<2){
            return;
        }else{
            $this->n($num-1);
        }
        echo $num.'<br>';
    }
}
$obj= new Nub();
$obj->n(5);