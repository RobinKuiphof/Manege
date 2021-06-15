<?php 



if(isset($_GET['logout'])){
?>
<div class="alert alert-dark" role="alert">
    <strong>Well done!</strong> You have successfully logged out.
</div>
<?php }elseif(checkadmin()['admin'] == 1){   ?>

<a href="<?=URL?>empty/addhorse" class="btn btn-primary text-white btn-block ">voeg vlees toe</a>
<?}?>
<div class="row">
<?php foreach($horses as $horse){ ?>
	<div class="card col-lg-4 col-md-6 col-sm-12">
	  <img class="card-img-top" src="<?=$horse['img']?>" alt="Card image cap" style="max-height: 500px;"	>
	  <div class="card-body">
	    <h4 class="card-title"><?=$horse['paarden']?></h4>
	    <p class="card-text"><?=$horse['description']?></p>
      <?php if(empty($_COOKIE['login'])){ ?>
		<a href="<?=URL?>empty/login" class="btn btn-primary">login</a>
      <?php }elseif(checkadmin()['admin'] == 1){ ?>
		<a href="<?=URL?>empty/reserveren/<?=$horse['id']?>" class="btn btn-primary">Reserveren</a>
		<a href="<?=URL?>empty/edithorse1/<?=$horse['id']?>" class="btn btn-warning">Edit</a>
		<a id ="modalus" class="btn text-white btn-danger" data-toggle="modal" data-target="#exampleModal<?=$horse["id"];?>">Verwijder</a>

      <?php }else{ ?>
		<a href="<?=URL?>empty/reserveren/<?=$horse['id']?>" class="btn btn-primary">Reserveren</a>
	  <?php } ?>
	  </div>
	</div>




	<div class="modal fade" id="exampleModal<?=$horse["id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Weet je zeker dat <?=$horse['paarden']?> wilt verwijderen?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Dit kan niet ongedaan worden weet uw dit zeker? 
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-secondary" data-dismiss="modal">Annuleer</a>
        <a href="<?=URL?>empty/deletehorse/<?=$horse["id"]?>" type="button" class="btn text-white bg-danger">Verwijder</a>
      </div>
    </div>
  </div>
</div>



<?php } ?>
</div>
