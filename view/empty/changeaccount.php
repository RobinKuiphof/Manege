

<div>
  <form method="POST" class="px-4 py-3 col-6 m-auto" action="<?=URL?>empty/changeaccount" >
    
    <div class="form-group" >
      <label for="exampleDropdownFormEmail1">Username</label>
      <input name="name" type="text" class="form-control" id="username" placeholder="Bijvoorbeeld: Jan appelboom" value='<?php if(isset($_POST['submit'])){ echo $_POST['name']; }else{ echo $accountinfo['username']; }?>'>
      <div class="invalid-feedback d-block"><?=$err[3]?></div>

    </div>
    
    <div class="form-group row">
  <label for="example-tel-input" class="col-2 col-form-label">Telefoon</label>
  <div class="col-10">
    
    <input type="tel" id="tel" name="tel" value='<?php if(isset($_POST['submit'])){ echo $_POST['tel']; }else{ echo $accountinfo['tel']; }?>' placeholder="Bijvoorbeeld: 06-12345678" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" required>   

    <div class="invalid-feedback d-block"><?=$err[2]?></div>

  </div>
</div>
<div class="form-group" >
      <label for="exampleDropdownFormEmail1">Email address</label>
      <input name="email" type="email" class="form-control" id="email" placeholder="Bijvoorbeeld Jan.Appelboom@gmail.com" value='<?php if(isset($_POST['submit'])){ echo $_POST['email']; }else{ echo $accountinfo['email']; }?>'>
      <div class="invalid-feedback d-block"><?=$err[0]?></div>

    </div>
    <button name="submit" type="submit" class="btn btn-primary">Edit account</button>
  </form>
  <div class="dropdown-divider"></div>
</div>

