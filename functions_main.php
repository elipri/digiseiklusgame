<?php
	require("config.php");
	$database = "kerttusepp";
	
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
		$conn = new mysqli($GLOBALS["dbhost"], $GLOBALS["dbuser"], $GLOBALS["dbpass"], $GLOBALS["database"]);
		//kõigepealt kontrollime, ega pole sellist kasutajat olemas
		$stmt = $conn->prepare("SELECT id FROM Users WHERE email=?");
		echo $conn->error;
		$stmt->bind_param("s", $email);
		$stmt->bind_result($idFromDb);
		$stmt->execute();
		if($stmt->fetch()){
			$notice = "Kahjuks on sellise kasutajanimega (" .$email .") kasutaja juba olemas!";
		} else {
			$stmt->close();
			$stmt = $conn->prepare("INSERT INTO Users (firstname, lastname, email, password) VALUES(?,?,?,?)");
			echo $conn->error;
			
			$pwdhash = password_hash($parool, PASSWORD_BCRYPT); 
			
			$stmt->bind_param("ssss", $eesnimi, $perenimi, $email, $pwdhash);
			if($stmt->execute()){
				$notice = "OK!" and header('Location: login.php');
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
		$conn = new mysqli($GLOBALS["dbhost"], $GLOBALS["dbuser"], $GLOBALS["dbpass"], $GLOBALS["database"]);
		$stmt = $conn->prepare("SELECT id, firstname, lastname, password FROM Users WHERE email=?");
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
					//exit();
					
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
	