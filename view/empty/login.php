
<div class="col-6 m-auto">
  <form class="px-4 py-3" method="POST" action="<?=URL?>empty/login">
    <div class="form-group" >
      <label for="exampleDropdownFormEmail1">Email address</label>
      <input name='email' type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com" value='<?=$_POST['email']?>'>
    </div>
    <div class="form-group">
      <label for="exampleDropdownFormPassword1">Password</label>
      <input name='password' type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password" value='<?=$_POST['password']?>'>
      <div class="invalid-feedback d-block"><?=$err[0]?></div>

    </div>
    
    <button type="submit" class="btn btn-primary">Sign in</button>
  </form>
  <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="<?=URL?>empty/signup">New around here? Sign up</a>
</div>
<div style="height:500px;"></div>

