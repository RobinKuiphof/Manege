<?php 



?>



<div class="row">
<?php foreach($horses as $horse){ ?>
	<div class="card col-lg-4 col-md-6 col-sm-12">
	  <img class="card-img-top" src="<?=URL?>/images/<?=$horse['img']?>" alt="Card image cap" style="max-height: 500px;"	>
	  <div class="card-body">
	    <h4 class="card-title"><?=$horse['paarden']?></h4>
	    <p class="card-text"><?=$horse['description']?></p>
	    <a href="<?=URL?>empty/reserveren/<?=$horse['id']?>" class="btn btn-primary">Reserveren</a>
	  </div>
	</div>
<?php } ?>
</div>






<div class="dropdown-menu">
  <form class="px-4 py-3">
    <div class="form-group">
      <label for="exampleDropdownFormEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
    </div>
    <div class="form-group">
      <label for="exampleDropdownFormPassword1">Password</label>
      <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
    </div>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="dropdownCheck">
      <label class="form-check-label" for="dropdownCheck">
        Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
  </form>
  <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="#">New around here? Sign up</a>
  <a class="dropdown-item" href="#">Forgot password?</a>
</div>
<div style="height:500px;"></div>