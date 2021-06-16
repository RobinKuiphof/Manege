
<h2 class="text-center" style="margin-top: 30px;">paard aanmaken</h2>
<form method="POST" class="col-8 m-auto" action="<?=URL?>empty/addhorse" >
  <input type="hidden" class="form-control"name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?=$_COOKIE['login']?>">
  <div class="form-group">
    <label for="formGroupExampleInput">Name</label>
    <input type="text" placeholder="Bijvoorbeeld: Geert" class="form-control" name="name" value="<?=$_POST['name']?>">
    <div class="invalid-feedback d-block"><?=$err[0]?></div>   
    <label for="formGroupExampleInput">Img link</label>
    <input type="text"placeholder="Bijvoorbeeld: https://www.voermeesters.nl/bestanden/Voermeesters/Afbeeldingen/w2000-8378-1/Voeradvies_elektrolyten_voor_paarden.png" class="form-control" name="img" value="<?=$_POST['img']?>">   
    <div class="invalid-feedback d-block"><?=$err[1]?></div>   
    <label for="formGroupExampleInput">Description</label>
    <input type="text" placeholder="Bijvoorbeeld: deze paart is eng goeie frikandel oelheh" class="form-control" name="des" value="<?=$_POST['des']?>">   
    <div class="invalid-feedback d-block"><?=$err[2]?></div>   
  </label>
</div>
  <input type="submit" name="submit"class="btn btn-primary">
</form>

