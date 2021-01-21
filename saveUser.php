<?php
require("config.php");
require("functions_main.php");
$notice = "";
$username = $code = "";
$usernameErr = $codeErr = "";
$json = file_get_contents("php://input");;
$stdInstance = json_decode($json);
$username =  $stdInstance->username . PHP_EOL; 
$code = $stdInstance->code . PHP_EOL; 
$response_code = 200;
//echo $username . $code;

if (isset($stdInstance)){
    $notice = saveUser($username, $code); 
   
    if ($notice == 'ok'){
        http_response_code($response_code);
    }  
    else{
        http_response_code(404);
    } 
}
?>
 
