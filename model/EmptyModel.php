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

	
	function getHorse($id){
	    try {
	        $conn=openDatabaseConnection();
	        $stmt = $conn->prepare("SELECT * FROM manage where id = :id");
			$stmt->bindParam(":id", $id);
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
		date_default_timezone_set("Europe/Amsterdam");
		$reserveringen = getreserveringen();
		$currentime = date('Y-m-d H:i');

		if(empty($s_time)){
			$err[0] = 'U moet een begin tijd invoeren';
		}elseif(date('Y-m-d H:i', strtotime($s_time)) < $currentime){
			$err[0] = 'Selecteer een tijd die nog niet is geweest';
		}else{
			$end_time = date('Y-m-d H:i',strtotime('+'.$e_time.'minutes',strtotime($s_time)));
			foreach($reserveringen as $listreserveringen){
				if(date('Y-m-d H:i', strtotime($s_time)) < $listreserveringen['b_time'] && $end_time < $listreserveringen['b_time']){
					
				}elseif(date('Y-m-d H:i', strtotime($s_time)) > $listreserveringen['e_time']){
					
				}else{
					$err[0] = 'Er is al een afspraak op deze tijd';
				}
			}
			if(empty($err[0])){
				$price = ($e_time/60*55);
				$conn=openDatabaseConnection();
				$stmt = $conn->prepare("INSERT INTO reserveringen (horseid, b_time, e_time, price,email) VALUES (:horseid,:b_time,:e_time,:price,:email)");
				$stmt->bindParam(":b_time", $s_time);
				$stmt->bindParam(":horseid", $horseid);
				$stmt->bindParam(":e_time", $end_time);
				$stmt->bindParam(":price", $price);
				$stmt->bindParam(":email", $email);
				$stmt->execute();
				$conn = null;
				header("location:../reserveringen");
			}
		}
		return $err;
	}

function checkadmin(){
	try {
		$conn=openDatabaseConnection();
		$stmt = $conn->prepare("SELECT admin FROM login where email = :email");
		$stmt->bindParam(":email", $_COOKIE['login']);
		$stmt->execute();
		$adminstatus = $stmt->fetch();
	}
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
	$conn = null;
	return $adminstatus;
}

function getreserveringen(){
	try {
		$conn=openDatabaseConnection();
		$stmt = $conn->prepare("SELECT * FROM reserveringen INNER JOIN manage ON reserveringen.horseid=manage.id  where email = :email");
		$stmt->bindParam(":email", $_COOKIE['login']);
		$stmt->execute();
		$reserveringen = $stmt->fetchAll();
	}
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
	$conn = null;
	return $reserveringen;
}

function adminres(){
	try {
		$conn=openDatabaseConnection();
		$stmt = $conn->prepare("SELECT * FROM reserveringen INNER JOIN manage ON reserveringen.horseid=manage.id"); // where email = :email
		$stmt->bindParam(":email", $_COOKIE['login']);
		$stmt->execute();
		$reserveringen = $stmt->fetchAll();
	}
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
	$conn = null;
	return $reserveringen;
}

function getreservering($id){
	try {
		$conn=openDatabaseConnection();
		$stmt = $conn->prepare("SELECT * FROM reserveringen INNER JOIN manage ON reserveringen.horseid=manage.id where orderid = :id"); 
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		$reserveringen = $stmt->fetch();
	}
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
	$conn = null;
	return $reserveringen;
}

function adduser($email, $pas, $tel, $name){

	$name = diffuser($name);
	$tel = diffuser($tel);
	$email = diffuser($email);

	
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
	
	if(filter_var($email, FILTER_VALIDATE_EMAIL)){

	} else {
		$err[0] = 'this is not a valid email address';
	}
	if(empty(checkaccount($email))){
		if(empty($err[0])){
			if(!empty($name) && !empty($tel) && !empty($pas) && !empty($email)){
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
			}
		}
	}else{
		$err[0] = $err[0] . 'This email is already used';
	}
	echo $err[0];
	return $err;
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

	foreach($result as $results){
		if($results['email'] == $email){
			$check = 'This email already exists';
			return $check;
		}
	}
}



function deletereservering($id){
	$conn=openDatabaseConnection();
	$stmt = $conn->prepare("DELETE FROM reserveringen WHERE orderid = :id");
	$stmt->bindParam(":id", $id);
	$stmt->execute();
	$conn= null;
}



function exeupdatereservering2($s_time, $e_time, $id){
	date_default_timezone_set("Europe/Amsterdam");
	$reserveringen = getreserveringen();
	$currentime = date('Y-m-d H:i');

	if(empty($s_time)){
		$err[0] = 'U moet een begin tijd invoeren';
	}elseif(date('Y-m-d H:i', strtotime($s_time)) < $currentime){
		$err[0] = 'Selecteer een tijd die nog niet is geweest';
	}else{
		$end_time = date('Y-m-d H:i',strtotime('+'.$e_time.'minutes',strtotime($s_time)));
		foreach($reserveringen as $listreserveringen){
			if(date('Y-m-d H:i', strtotime($s_time)) < $listreserveringen['b_time'] && $end_time < $listreserveringen['b_time']){
				
			}elseif(date('Y-m-d H:i', strtotime($s_time)) > $listreserveringen['e_time']){
				
			}else{
				$err[0] = 'Er is al een afspraak op deze tijd';
			}
		}
		if(empty($err[0])){
			$price = ($e_time/60*55);
			$conn=openDatabaseConnection();
			$stmt = $conn->prepare("UPDATE reserveringen SET b_time = :b_time, e_time = :e_time, price = :price WHERE orderid = :id");
			$stmt->bindParam(":b_time", $s_time);
			$stmt->bindParam(":e_time", $end_time);
			$stmt->bindParam(":price", $price);
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			$conn = null;
			header("location:../reserveringen?edit=succesfull");
		}
	}
	return $err;
}

function horseadd($name, $des, $img){
	$name = diffuser($name);
	$img = diffuser($img);
	$des = diffuser($des);
	
	if(empty($name)){
		$err[0] = 'This field is required';
	}
	if(empty($img)){
		$err[1]	= "This field is required";
	}
	if(empty($des)){
		$err[2] = "This field is required";
	}

	if(!empty($name) && !empty($des) && !empty($img)){
	$conn=openDatabaseConnection();
	$stmt = $conn->prepare("INSERT INTO manage (paarden,img, description) VALUES (:paarden,:img,:description)");
	$stmt->bindParam(":paarden", $name);
	$stmt->bindParam(":img", $img);
	$stmt->bindParam(":description", $des);
	$stmt->execute();
	$conn = null;
	header("location:index");
	}	
	return $err;
}


function xhorseedit($name, $des, $img, $id){
	$name = diffuser($name);
	$img = diffuser($img);
	$des = diffuser($des);
	
	if(empty($name)){
		$err[0] = 'This field is required';
	}
	if(empty($img)){
		$err[1]	= "This field is required";
	}
	if(empty($des)){
		$err[2] = "This field is required";
	}

	if(!empty($name) && !empty($des) && !empty($img)){
		$conn=openDatabaseConnection();
		$stmt = $conn->prepare("UPDATE manage SET paarden = :paarden, description = :description , img = :img  WHERE id = :id");
		$stmt->bindParam(":paarden", $name);
		$stmt->bindParam(":img", $img);
		$stmt->bindParam(":description", $des);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		$conn = null;
		header("location:../index");
	}
	return $err;
}

function deletehorse2($id){
	$conn=openDatabaseConnection();
	$stmt = $conn->prepare("DELETE FROM manage WHERE id = :id");
	$stmt->bindParam(":id", $id);
	$stmt->execute();
	$conn= null;
}

function accountinfo(){
	try {
		$conn=openDatabaseConnection();
		$stmt = $conn->prepare("SELECT * FROM login where email = :email");
		$stmt->bindParam(":email", $_COOKIE['login']);
		$stmt->execute();
		$accountinfo = $stmt->fetch();
	}
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
	$conn = null;
	return $accountinfo;
}


function executedelacc(){
	$conn=openDatabaseConnection();
	$stmt = $conn->prepare("DELETE FROM login WHERE email = :email");
	$stmt->bindParam(":email", $_COOKIE['login']);
	$stmt->execute();
	$conn= null;
}

function userchange($name, $tel, $email){
	
	$name = diffuser($name);
	$tel = diffuser($tel);
	$email = diffuser($email);
	if(empty($email)){
		$err[0] = 'You have to enter a valid email';
	}
	if(empty($tel)){
		$err[2] = 'You have enter a phone number';
	}
	if(empty($name)){
		$err[3] = 'You have to enter a username';
	}
	if(filter_var($email, FILTER_VALIDATE_EMAIL)){

	} else {
		$err[0] = 'this is not a valid email address';
	}
	if(!empty($tel) && !empty($name) && !empty($email) && empty($err)){
		if(empty(checkaccount($email)) || $email == $_COOKIE['login']){
			$conn=openDatabaseConnection();
			$stmt = $conn->prepare("UPDATE login SET email = :email, tel = :tel , username = :name  WHERE email = :useremail");
			$stmt->bindParam(":email", $email);
			$stmt->bindParam(":useremail", $_COOKIE['login']);
			$stmt->bindParam(":tel", $tel);
			$stmt->bindParam(":name", $name);
			$stmt->execute();
			$conn = null;

			$conn=openDatabaseConnection();
			$stmt = $conn->prepare("UPDATE reserveringen SET email = :email WHERE email = :useremail");
			$stmt->bindParam(":email", $email);
			$stmt->bindParam(":useremail", $_COOKIE['login']);
			$stmt->execute();
			$conn = null;

			setcookie('login', $email, time()+6*24*60*60);
			header('location:account');
		}else{
			$err[0] = 'This email is already used';
		}
	}
	return $err;
}