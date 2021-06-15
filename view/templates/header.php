<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= APPLICATION_TITLE ?></title>
	<link rel="stylesheet" href="<?= URL ?>/css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</head>
<body>
<div id="container">

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  	<a class="navbar-brand" href="<?=URL?>empty/index"><img style="width: 100px;" class="img-fluid img-thumbnail" src="<?=URL?>public/images/horseimg.gif"></a>
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    	<span class="navbar-toggler-icon"></span>
	  	</button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
			    <li class="nav-item">
			        <a class="nav-link" href="<?=URL?>empty/index">Home</a>
			    </li>
			    <li class="nav-item">
			        <a class="nav-link" href="<?=URL?>empty/index">Paarden</a>
			    </li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="<?=URL?>empty/reserveringen">Reserveringen</a>
		      	</li>
	    	</ul>
			<form class="form-inline my-2 my-lg-0">
				<?php if(empty($_COOKIE['login'])){ ?>
      			<a class="btn btn-outline-primary my-2 my-sm-0" href="<?=URL?>empty/login">Login</a>
				<?php }else{ ?>
				<a class="btn btn-outline-primary my-2 my-sm-0" href="<?=URL?>empty/logout">uitloggen</a>
				<a class="btn btn-outline-primary my-2 my-sm-0" href="<?=URL?>empty/account">Account</a>
				<?php } ?>
    		</form>
	  	</div>
	</nav>