<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/15
 * Time: 23:59
 */
session_start();
if(isset($_SESSION['u'])){
    unset($_SESSION['u']);
}
echo "ok";