<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('../../config.php');
//require_once($CFG->dirroot .'/course/lib.php');
//require_once($CFG->libdir .'/filelib.php');

require_once('../../lib/phpqrcode/qrlib.php');
//require_once($CFG->dirroot .'/lib/datalib.php');
//global $USER;
 
//print_object($USER);
//die('abc');
//QRcode::png('Phuong123sdfkjsdkfjdskfjsjfkjdskjskjdfksjdkfjdskjfkdsjkfjskjfkdsj');
//$s = $USER->id;// $USER->firstname.'|'.$USER->lastname.'|'.$USER->id.'|'.$USER->username;
 //$param = $_GET['link'];
 //die ($param);
$q = $_REQUEST["link"];
//$s = $CFG->wwwroot."/rec_code/".$USER->id."?redirect=".$q;

QRCode::png($q);
//QRcode::png($USER->id.'|'.$USER->username."|".$q);

  // how to save PNG codes to server
    
