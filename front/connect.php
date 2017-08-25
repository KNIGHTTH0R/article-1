<?php
/**
 * Created by PhpStorm.
 * User: 靳文超
 * Date: 2017/7/14
 * Time: 13:38
 */

    require_once('config.php');
    //连库
    if(!($con=mysql_connect(HOST,USENAME,PASSWORD))){
        echo mysql_error();
    }
    //选库
    if(!mysql_select_db(DBNAME)){
        echo mysql_error();
    }
    //字符集
    if(!mysql_query(CHARCODE)){
        echo mysql_error();
    }
?>    
