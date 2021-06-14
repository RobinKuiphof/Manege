<?php

	function diffuser($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}


	function checkConnection(){
	    try{ 
    		$conn = openDatabaseConnection(); 
	       	$stmt = $conn->prepare("SHOW TABLES");
       		$stmt->execute();
       		$stmt->fetchAll();
       		
	    }catch(Exception $e){
			return false;
	    }

	    return true;
	}

	function getHorses(){
	    try {
	        $conn=openDatabaseConnection();
	        $stmt = $conn->prepare("SELECT * FROM manage");
	        $stmt->execute();
	        $result = $stmt->fetchAll();
	    }
	   	catch(PDOException $e){
	     	echo "Connection failed: " . $e->getMessage();
		}
		$conn = null;
		return $result;
	}

	function reservering($horseid, $s_time, $e_time, $email){

		$price = ($e_time/60*55);
		$end_time = date('Y-m-d H:i',strtotime('+'.$e_time.'minutes',strtotime($s_time)));
			
		$conn=openDatabaseConnection();
		$stmt = $conn->prepare("INSERT INTO reserveringen (horseid, b_time, e_time, price,email) VALUES (:horseid,:b_time,:e_time,:price,:email)");
		$stmt->bindParam(":b_time", $s_time);
		$stmt->bindParam(":horseid", $horseid);
		$stmt->bindParam(":e_time", $end_time);
		$stmt->bindParam(":price", $price);
		$stmt->bindParam(":email", $email);

		$stmt->execute();
		$conn = null;
	}
	

function getreserveringen(){
	try {
		$conn=openDatabaseConnection();
		$stmt = $conn->prepare("SELECT * FROM reserveringen INNER JOIN manage ON reserveringen.horseid=manage.id");
		$stmt->execute();
		$reserveringen = $stmt->fetchAll();
	}
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
	$conn = null;
	return $reserveringen;
}

function adduser($email, $pas, $tel, $name){
	
	if(empty($email)){
		$err[0] = 'U moet een mail invoeren';
	}
	if(empty($pas)){
		$err[1] = 'U moet een wachtwoord invoeren';
	}
	if(empty($tel)){
		$err[2] = 'U moet een telefoon nummer invoeren';					
	}
	if(empty($name)){
		$err[3] = 'U moet een username invoeren';
	}
	if(!empty($name) && !empty($tel) && !empty($pas) && !empty($email)){
		if(!empty(checkaccount($email))){
			$email = diffuser($email);
			$pas = diffuser($pas);
			$tel = diffuser($tel);
			$name = diffuser($name);

			$conn=openDatabaseConnection();
			$stmt = $conn->prepare("INSERT INTO login (email,password, tel, username) VALUES (:email,:password,:tel,:username)");
			$stmt->bindParam(":email", $email);
			$stmt->bindParam(":password", $pas);
			$stmt->bindParam(":tel", $tel);
			$stmt->bindParam(":username", $name);
			$stmt->execute();
			$conn = null;

			setcookie('login', $email, time()+6*24*60*60);
			header("location:index");
		}else{
			return $err;
		}
	}
}

function sendlogin($email, $password){
	try {
		$conn=openDatabaseConnection();
		$stmt = $conn->prepare("SELECT `email`, `password` FROM login WHERE email = :email");
		$stmt->bindParam(":email", $email);
		$stmt->execute();
		$result = $stmt->fetch();

		
	}
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
	$conn = null;
	if(!empty($password) && !empty($email)){
		if($result['password'] == $password){
			setcookie('login', $email, time()+6*24*60*60);
			header("location:index");
		}else{
			$err[0] = 'incorrect email or password';
			return $err;
		}
	}else{
		$err[0] = 'incorrect email or password';
		return $err;
	}
}

function checkaccount($email){
	try {
		$conn=openDatabaseConnection();
		$stmt = $conn->prepare("SELECT `email` FROM login");
		$stmt->execute();
		$result = $stmt->fetchAll();
	}
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}

	foreach($result as $result){
		if($result['email'] == $email){
			$check = '1';
			return $check;
		}
	}
}