<?php

/**
 * This is a configuration file. It defines constant values for things that may not change frequently
 */
define("WEBSITE","Zac Commerce");

// Database details
if($_SERVER['SERVER_NAME'] == 'localhost'){
    
    define("DB_TYPE",'mysql');
    define("DB_HOST","localhost");
    define("DB_USER","root");
    define("DB_PASS","passme2020");
    define("DB_NAME","cmszac");

}else{  //hosted live  000webhost details
    define("DB_TYPE",'mysql');
    define("DB_HOST","localhost");
    define("DB_USER","id17670815_abun");
    define("DB_PASS","gY^<m/o5{u2!t30R");
    define("DB_NAME","id17670815_zacecom");

  

}
// host = "gabe.securecloud2.com";
  

define("PROTOCOL","http");

//root and asset paths
$path = str_replace("\\","/",PROTOCOL ."://". $_SERVER['SERVER_NAME']. __DIR__ ."/");
$path = str_replace($_SERVER['DOCUMENT_ROOT'],"",$path);
define('ROOT',str_replace("app/core","public", $path));//http://localhost/zacecom/public/
define("ASSETS", str_replace("app/core","public/assets",$path)); //http://localhost/zacecom/public/assets/

// echo $path; die;
//This is for debuggin purposes, will be set false on live server
define('DEBUG',true);
if(DEBUG){
    ini_set("display_errors",1);
}else{
    ini_set("display_errors",0);
}






