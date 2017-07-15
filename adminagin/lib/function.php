<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/5/11
 * Time: 14:41
 */

class All{
    public function __construct(){
        $this->str='';
    }
    public function tree($db,$table,$cid,$n=1,$pid=0){
        $sql="select * from $table WHERE parentid=$cid";
        $result=$db->query($sql);
        while($row=$result->fetch_assoc()){
            $string=str_repeat('-',$n);
            if($row['cid']==$pid){
                $this->str.="
                <option selected value='$pid'>{$string}{$row['name']}</option>
                ";
            }else{
                $this->str.="
                <option value={$row['cid']}>{$string}{$row['name']}</option>
                ";
            }

            $this->tree($db,$table,$row['cid'],$n+2,$pid);
        }

    }

    public function mange($db,$table,$parentid,$n=0){
        $sql="select * from $table WHERE parentid=$parentid";
        $result=$db->query($sql);
        while($row=$result->fetch_assoc()){
            $string=str_repeat('-',$n);
            $this->str.="
               <tr>
                    <td>{$row['cid']}</td>
                    <td>{$string}{$row['name']}</td>
                    <td>{$row['parentid']}</td>
                    <td>
                        <a href='delcatacory.php?id={$row['cid']}'>删除</a>
                        <a href='editcatacory.php?id={$row['cid']}'>编辑</a>
                    </td>
                    
               </tr>
            ";
            $this->mange($db,$table,$row['cid'],$n+2);
        }

    }


    public function position($db,$table){
        $sql="select * from $table";
        $result=$db->query($sql);
        while($row=$result->fetch_assoc()){
            $this->str.="
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>
                        <a href='editposition.php?id={$row['id']}'>编辑</a>
                        <a href='delposition.php?id={$row['id']}'>删除</a>
                    </td>
                </tr>
           ";
        }
    }
}