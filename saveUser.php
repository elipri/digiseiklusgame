<?php
require('config.php');
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

function saveUser($username, $code){
    $notice= "";
    $username = $username;
    $code = $code;
   
    $conn = new mysqli($GLOBALS["dbhost"], $GLOBALS["dbuser"], $GLOBALS["dbpass"], $GLOBALS["dbname"]);
    $stmt = $conn->prepare("SELECT username, code FROM GameData WHERE username='".$username."' AND code='".$code."'");
	echo $conn->error;
    $stmt->bind_param("si", $username, $code);
	$stmt->bind_result($usernameFromDb, $codeFromDb);
    $stmt->execute();
	if($stmt->fetch()){    
        $notice = "Selline kasutaja on juba olemas";
        echo $notice;
    }else{
        $conn = new mysqli($GLOBALS["dbhost"], $GLOBALS["dbuser"], $GLOBALS["dbpass"], $GLOBALS["dbname"]);
        $stmt = $conn->prepare("INSERT INTO GameData (username, code) VALUES (?, ?)");
        echo $conn->error;
        $stmt->bind_param("si", $username, $code );
        if($stmt->execute()){
    
            $notice = 'ok'; 
            

        } else {
            $notice = "Salvestamisel tekkis tõrge! " .$stmt->error;
            
        }
    }
    $stmt->close();
    $conn->close();
    return $notice;
}



?>
 
