<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../config.php');
$encodelink =  $_REQUEST["code"];
$decodelink = base64_decode(strtr($encodelink, '-_,', '+/='));
$arrlink = explode("|",$decodelink);
if($USER->id == 0)
{
    //Ghi arrlink[0] (user recommend) vào session
    //Nếu khi đkí hoặc login lần đầu thành công, thì ghi urect vào db cho user hiện tại 
    echo "User Recommend:".$arrlink[0];
    
}    
 else {
//redirect tới link arrlink[1]
     header('Location: '.$arrlink[1]);
     die();
}

//echo $arrlink[1];
