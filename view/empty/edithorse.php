<?php 

?>


<h2 class="text-center" style="margin-top: 30px;">paard aanmaken</h2>
<form method="POST" class="col-8 m-auto" action="<?=URL?>empty/edithorse1/<?=$horseinfo[0]['id']?>" >
  <input type="hidden" class="form-control"name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?=$_COOKIE['login']?>">
  <div class="form-group">
    <label for="formGroupExampleInput">Name</label>
    <input type="text" placeholder="Bijvoorbeeld: Geert" class="form-control" name="name" value="<?=$horseinfo[0]['paarden']?>">
    <label for="formGroupExampleInput">Img link</label>
    <input type="text"placeholder="Bijvoorbeeld: https://www.voermeesters.nl/bestanden/Voermeesters/Afbeeldingen/w2000-8378-1/Voeradvies_elektrolyten_voor_paarden.png" class="form-control" name="img" value="<?=$horseinfo[0]['img']?>">   
    <label for="formGroupExampleInput">Description</label>
    <input type="text" placeholder="Bijvoorbeeld: deze paart is eng goeie frikandel oelheh" value="<?=$horseinfo[0]['description']?>" class="form-control" name="des">   
  </label>
</div>
  <input type="submit" name="submit"class="btn btn-primary">
</form>

