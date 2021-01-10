<?php
	require("config.php");
	
	
	//võtan kasutusele sessiooni
	session_start();
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	function signup($eesnimi, $perenimi, $email, $parool){
		$notice = "";
		$conn = new mysqli($GLOBALS["dbhost"], $GLOBALS["dbuser"], $GLOBALS["dbpass"], $GLOBALS["dbname"]);
		//kõigepealt kontrollime, ega pole sellist kasutajat olemas
		$stmt = $conn->prepare("SELECT id FROM GameData WHERE email=?");
		echo $conn->error;
		$stmt->bind_param("s", $email);
		$stmt->bind_result($idFromDb);
		$stmt->execute();
		if($stmt->fetch()){
			$notice = "Kahjuks on sellise kasutajanimega (" .$email .") kasutaja juba olemas!";
		} else {
			$stmt->close();
			$stmt = $conn->prepare("INSERT INTO GameData (firstname, lastname, email, password) VALUES(?,?,?,?)");
			echo $conn->error;
			
			$options = ["cost" => 12, "salt" => substr(sha1(rand()), 0, 22)];
			$pwdhash = password_hash($parool, PASSWORD_BCRYPT, $options);
			
			$stmt->bind_param("ssss", $eesnimi, $perenimi, $email, $pwdhash);
			if($stmt->execute()){
				$notice = "OK!";
			} else {
				$notice = "Error: " .$stmt->error;
			}
		}
		
		$stmt->close();
		$conn->close();
		
		return $notice;
	}
	
	function signin($email, $parool){
		$notice = "";
		$conn = new mysqli($GLOBALS["dbhost"], $GLOBALS["dbuser"], $GLOBALS["dbpass"], $GLOBALS["dbname"]);
		$stmt = $conn->prepare("SELECT id, firstname, lastname, password FROM GameData WHERE email=?");
		echo $conn->error;
		$stmt->bind_param("s", $email);
		$stmt->bind_result($idFromDb, $eesnimiFromDb, $perenimiFromDb, $paroolFromDb);
		if($stmt->execute()){
			if($stmt->fetch()){
				if(password_verify($parool, $paroolFromDb)){
					$notice = "Palju õnne!";
					$_SESSION["userid"] = $idFromDb;
					$_SESSION["userfirstname"] = $eesnimiFromDb;
					$_SESSION["userlastname"] = $perenimiFromDb;
					
					$stmt->close();
					$conn->close();
					
					header("Location: kasutaja.php");
					exit();
					
				} else {
					$notice = "Vale salasõna!";
				}
			} else {
				$notice = "Kahjuks sellist kasutajat (" .$email .") ei leitud!";
			}
		} else {
			$notice = "Sisselogimisel tekkis tehniline viga! " .$stmt->error;
		}
			
		$stmt->close();
		$conn->close();
		
		return $notice;
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
	
	
	