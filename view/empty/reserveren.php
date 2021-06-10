
<h2 class="text-center" style="margin-top: 30px;">paard reserveren</h2>
<form method="POST" class="col-8 m-auto" action="<?=URL?>empty/reserveren/<?=$horseid?>" >
<div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control"name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted"><?=$err[1]?></small>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Wanneer wil je het paard reserveren</label>
    <input type="datetime-local" class="form-control" name="s_time">
  </div>
  <label for="formGroupExampleInput">Hoelang wil je het paard reserveren</label>
  <div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-secondary active">
    <input type="radio" name="options" value="60" id="option1" autocomplete="off" checked> 1 uur
  </label>
  <label class="btn btn-secondary">
    <input type="radio" value="120" name="options" id="option2" autocomplete="off"> 2 uur
  </label>
  <label class="btn btn-secondary">
    <input type="radio" value="180" name="options" id="option3" autocomplete="off"> 3 uur
  </label>
  <label class="btn btn-secondary">
    <input type="radio" value="240" name="options" id="option4" autocomplete="off"> 4 uur
  </label>
</div>

  <input type="submit" name="submit"class="btn btn-primary">
</form>

