<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../../config.php');
$q = $_REQUEST["link"];
$encodelink = strtr(base64_encode($USER->id."?redirect=".$q), '+/=', '-_,');
//echo ('encode:' . $encodelink);
//$decodelink = base64_decode(strtr($encodelink, '-_,', '+/='));
$newlink = $CFG->wwwroot."/rec_code/".$encodelink;
//die('-decode:'.$decodelink);
$value = array('imgsrc' => $CFG->wwwroot.'/blocks/recommend_block/QRCode.php?link='.$newlink, 
    'link' =>$newlink);


//echo $CFG->wwwroot.'/blocks/phuong_user/QRCode.php?link='.$q;

//$value = array('imgsrc' => $CFG->wwwroot.'/blocks/phuong_user/QRCode.php?link='.$q, 
//    'link' => $CFG->wwwroot."/rec_code/".$USER->id."?redirect=".$q);

// die(print_object($value));
$output = json_encode($value);
echo $output;