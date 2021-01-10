<?php
require('config.php');
require("functions_main.php");
$notice = "";
$username = $code = $score = "";
$usernameErr = $codeErr = "";

$json = file_get_contents("php://input");;
$stdInstance = json_decode($json);
$username =  $stdInstance->username . PHP_EOL; 
$score = $stdInstance->score . PHP_EOL;
$code = $stdInstance->code . PHP_EOL; 

#echo $username . $score . $code;

if (isset($username)){
    $notice = storeuserscore($username, $score, $code);  
}
?>
 
