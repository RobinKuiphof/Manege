
<div>
  <form method="POST" class="px-4 py-3 col-6 m-auto" action="<?=URL?>empty/changeaccount" >
    
    <div class="form-group" >
      <label for="exampleDropdownFormEmail1">Username</label>
      <input name="name" type="text" class="form-control" id="username" placeholder="Bijvoorbeeld: Jan appelboom" value='<?=$accountinfo['username']?>'>
      <div class="invalid-feedback d-block"><?=$err[3]?></div>

    </div>
    
    <div class="form-group row">
  <label for="example-tel-input" class="col-2 col-form-label">Telefoon</label>
  <div class="col-10">
    <input name="tel" class="form-control" type="tel"  id="tel" placeholder="Bijvoorbeeld: 06-12345678" value='<?=$accountinfo['tel']?>'>
    <div class="invalid-feedback d-block"><?=$err[2]?></div>

  </div>
</div>
<div class="form-group" >
      <label for="exampleDropdownFormEmail1">Email address</label>
      <input name="email" type="email" class="form-control" id="email" placeholder="Bijvoorbeeld Jan.Appelboom@gmail.com" value='<?=$accountinfo['email']?>'>
      <div class="invalid-feedback d-block"><?=$err[0]?></div>

    </div>
    <button name="submit" type="submit" class="btn btn-primary">Edit account</button>
  </form>
  <div class="dropdown-divider"></div>
</div>

