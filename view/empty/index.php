<?php 



if(isset($_GET['logout'])){
?>
<div class="alert alert-dark" role="alert">
    <strong>Well done!</strong> You have successfully logged out.
</div>
<?php } ?> 

<a href="<?=URL?>empty/addhorse" class="btn btn-primary text-white btn-block ">voeg vlees toe</a>

<div class="row">
<?php foreach($horses as $horse){ ?>
	<div class="card col-lg-4 col-md-6 col-sm-12">
	  <img class="card-img-top" src="<?=$horse['img']?>" alt="Card image cap" style="max-height: 500px;"	>
	  <div class="card-body">
	    <h4 class="card-title"><?=$horse['paarden']?></h4>
	    <p class="card-text"><?=$horse['description']?></p>
      <?php if(empty($_COOKIE['login'])){ ?>
		<a href="<?=URL?>empty/login" class="btn btn-primary">login</a>
		<a href="<?=URL?>empty/login" class="btn btn-warning">Edit</a>
      <?php }else{ ?>
		<a href="<?=URL?>empty/reserveren/<?=$horse['id']?>" class="btn btn-primary">Reserveren</a>
		<a href="<?=URL?>empty/edithorse1/<?=$horse['id']?>" class="btn btn-warning">Edit</a>
      <?php } ?> 
	  </div>
	</div>
<?php } ?>
</div>
