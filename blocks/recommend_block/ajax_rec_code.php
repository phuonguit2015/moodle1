<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../../config.php');
$q = $_REQUEST["link"]; 
$encodelink = strtr(base64_encode($USER->id."|".$q), '+/=', '-_,');
//echo ('encode:' . $encodelink);
//$decodelink = base64_decode(strtr($encodelink, '-_,', '+/='));
$newlink = $CFG->wwwroot."/rec_code/index.php?code=".$encodelink;
//die('-decode:'.$decodelink);
$value = array('imgsrc' => $CFG->wwwroot.'/blocks/recommend_block/QRCode.php?link='.$newlink, 
    'link' =>$newlink);

$output = json_encode($value);
echo $output;

//$salt ='whatever_you_want';

/*function simple_encrypt($salt,$text)
{
    return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
}

function simple_decrypt($salt,$text)
{
    return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $salt, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
}
*/