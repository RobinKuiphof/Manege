<?php
require(ROOT . "model/EmptyModel.php");


function index()
{
	$connection = checkConnection();
    render('empty/index', array('horses' => getHorses()));
}
function reserveren($id){
    
    
	if($_SERVER["REQUEST_METHOD"] == "POST"){
        $horseid = $id;
        $email = $_POST['email'];

        $s_time = $_POST['s_time'];
        $e_time = $_POST['options'];

        reservering($horseid, $s_time, $e_time, $email);
    }

	$connection = checkConnection();
	render('empty/reserveren', array('horseid' => $id));
}

function reserveringen(){
    render('empty/reserveringen', array('reservering' => getreserveringen()));
}
function login(){
    render('empty/login');
}

function signup(){

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $email = $_POST['email'];
        $name = $_POST['name'];
        $pas = $_POST['pas'];
        $tel = $_POST['tel'];
        $err = adduser($email, $pas, $tel, $name);
    }
    render('empty/signup', array('err' => $err));
}