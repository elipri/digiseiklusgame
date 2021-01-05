<?php
require('database.php');
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

function storeuserscore($username, $score, $code){
    $notice = "";
    
	
    $conn = new mysqli($GLOBALS["dbhost"], $GLOBALS["dbuser"], $GLOBALS["dbpass"], $GLOBALS["dbname"]);
    $stmt = $conn->prepare("SELECT username FROM GameData WHERE username=? and code=?");
	echo $conn->error;
    $stmt->bind_param("si", $username, $code);
	$stmt->bind_result($usernameFromDb, $codeFromDb);
	$stmt->execute();
	if($stmt->fetch()){
		//uuendame
		$stmt->close();
		$stmt = $conn->prepare("UPDATE GameData SET score='".$score."' WHERE username='".$username."' and code='".$code."'");
        echo $conn->error;
		$stmt->bind_param("si", $username, $score);
		if($stmt->execute()){
            $notice = "Kasutaja andmed uuendatud!";
            echo $notice;
			$username = $username;
		    $score = $score;
		} else {
            $notice = "Kasutaja uuendamisel tekkis tõrge! " .$stmt->error;
            echo $notice;
		}
	} else {
		
		$notice = "Sellist kasutajat ei ole" .$stmt->error;
		echo $notice;
		echo $username, $score;
		
	}
	$stmt->close();
	$conn->close();
	return $notice;
  }

?>
 
