
<div>
  <form method="POST" class="px-4 py-3 col-6 m-auto" action="<?=URL?>empty/signup" >
    
    <div class="form-group" >
      <label for="exampleDropdownFormEmail1">Username</label>
      <input name="name" type="text" class="form-control" id="username" placeholder="Bijvoorbeeld: Jan appelboom" value='<?=$_POST['name']?>'>
      <div class="invalid-feedback d-block"><?=$err[3]?></div>

    </div>
    
    <div class="form-group row">
  <label for="example-tel-input" class="col-2 col-form-label">Telefoon</label>
  <div class="col-10">
  <input type="tel" id="phone" name="tel" value='<?=$_POST['tel']?>' pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" required>   
    <div class="invalid-feedback d-block"><?=$err[2]?></div>

  </div>
</div>
<div class="form-group" >
      <label for="exampleDropdownFormEmail1">Email address</label>
      <input name="email" type="text" class="form-control" id="email" placeholder="Bijvoorbeeld Jan.Appelboom@gmail.com" value='<?=$_POST['email']?>'>
      <div class="invalid-feedback d-block"><?=$err[0]?></div>

    </div>
    <div class="form-group">
      <label for="exampleDropdownFormPassword1">Password</label>
      <input name="pas" type="password" class="form-control" id="password" placeholder="Bijvoorbeeld: Boerderij123" value='<?=$_POST['pas']?>'>
      <div class="invalid-feedback d-block"><?=$err[1]?></div>

    </div>
    
    <button name="submit" type="submit" class="btn btn-primary">Sign in</button>
  </form>
  <div class="dropdown-divider"></div>
</div>

