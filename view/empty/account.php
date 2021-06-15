

<ul class="list-group col-6 m-auto">
  <a href="detail" style="text-decoration: none;"><li class="list-group-item active"><?echo $accountinfo["username"];?></li></a>
  <li class="list-group-item">Email: <?echo $accountinfo["email"];?></li>
  <li class="list-group-item">Telefoon nummer: <?echo $accountinfo["tel"];?></li>
  <li class="list-group-item">Admin: <?echo $accountinfo["admin"];?></li>

  <li class="list-group-item">
  <a href="<?=URL?>empty/changeaccount" class="btn  text-white btn-warning">Aanpassen</a>
  <a id ="modalus" class="btn text-white btn-danger" data-toggle="modal" data-target="#exampleModal<?=$reserv["orderid"];?>">Verwijder</a>

  </li>
</ul>



<div class="modal fade" id="exampleModal<?=$reserv["orderid"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Weet je zeker dat je dit account wilt verwijderen?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Dit kan niet ongedaan worden weet uw dit zeker? 
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-secondary" data-dismiss="modal">Annuleer</a>
        <a href="<?=URL?>empty/deleteaccount" type="button" class="btn text-white bg-danger">Verwijder</a>
      </div>
    </div>
  </div>
</div>
