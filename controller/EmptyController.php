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

    $err = reservering($horseid, $s_time, $e_time, $email);
    }

	$connection = checkConnection();
	render('empty/reserveren', array('horseid' => $id,'errorcode' => $err));
    
}               

function reserveringen(){
    if(checkadmin()['admin'] == '1'){
        render('empty/reserveringen', array('reservering' => adminres()));
    }else{
        render('empty/reserveringen', array('reservering' => getreserveringen()));
    }
}
function login(){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $err = sendlogin($email,$password);
    }
    render('empty/login', array('err' => $err));
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
function logout(){
    unset($_COOKIE['login']); 
    setcookie('login', null, -1);
    header("location:index?logout=succes");
}

function delreservering($id){
    deletereservering($id);
    header("location:../reserveringen?delete=succesfull");  
}

function updatereservering($id){
    $reservering = getreservering($id);
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $newbegintime = $_POST['s_time'];
        $newduration = $_POST['options'];
        $err = exeupdatereservering2($newbegintime, $newduration, $id);
    }
    render('empty/updatereserveringen', array('reservering' => $reservering, 'errorcode' => $err));
}
function addhorse(){
    if(empty(checkadmin()['admin'])){
        header("Location:https://www.youtube.com/watch?v=dQw4w9WgXcQ"); 
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $des = $_POST['des'];
        $img = $_POST['img'];
        $err = horseadd($name, $des, $img);
    }  
    render('empty/addhorse', array('err' => $err));
}
function edithorse1($id){
    if(empty(checkadmin()['admin'])){
        header("Location:https://www.youtube.com/watch?v=dQw4w9WgXcQ"); 

    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $des = $_POST['des'];
        $img = $_POST['img'];
        $err = xhorseedit($name, $des, $img, $id);
    }   
    render('empty/edithorse', array('horseinfo' => getHorse($id), 'err' => $err));
}

function deletehorse($id){
    deletehorse2($id);
    header("location:../index?delete=succesfull");  
}

function account(){

    render('empty/account', array('accountinfo' => accountinfo()));
}
function deleteaccount(){
    executedelacc();
    unset($_COOKIE['login']); 
    setcookie('login', null, -1);
    header('location:index');
}

function changeaccount(){
    

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $err = userchange($name, $tel, $email);
    }  
    render('empty/changeaccount', array('accountinfo' => accountinfo(), 'err' => $err));
    
}