<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/5/27
 * Time: 15:48
 */
/*
 * 条件 顶层分类 BY PID
 *
 * */
class All{
    public $str="";
    public function tree($pid,$zindex,$flag,$db,$table){
        $zindex+=1;
        $sql="select * from $table WHERE parentid=".$pid;
        $relult=$db->query($sql);
        while ($row=$relult->fetch_assoc()){
            $cid=$row['cid'];
            $string=str_repeat($flag,$zindex);
            $this->str.="
                <option value='{$cid}'>$string{$row['name']}</option>
            ";
            $this->tree($cid,$zindex,$flag,$db,$table);
        }
    }



}



class TREE{
    public function __construct(){
        $this->str='';
    }


    public function trees($pid,$zindex,$flag,$db,$table){
        $this->str.="<ul>";
        $zindex+=1;
        $sql="select * from $table WHERE parentid=".$pid;
        $relult=$db->query($sql);
        while ($row=$relult->fetch_assoc()){
            $cataname=$row['name'];
            $cid=$row['cid'];
            $string=str_repeat($flag,$zindex);
            $sqls="select * from $table WHERE parentid=".$cid;
            $relults=$db->query($sqls);



            if (mysqli_num_rows($relults)>0){
                $this->str.="<li><span>{$cataname}</span>";
            }else{
                $this->str.="<li><a target='addcontent' href='addcontent.php?id={$cid}&cid={$cid}'>{$string}{$cataname}</a>";
            }
            $this->trees($cid,$zindex,$flag,$db,$table);
        }
        $this->str.="</li></ul>";
    }
}