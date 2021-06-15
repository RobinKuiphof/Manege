<?php 

?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Weet je zeker dat je deze reservering wilt verwijderen?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Dit kan niet ongedaan worden weet uw dit zeker?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">annuleer</button>
        <button type="button" class="btn btn-danger">verwijder</button>
      </div>
    </div>
  </div>
</div>
<?php 


foreach ($reservering as $reserv){
?>
<ul class="list-group col-6 m-auto">
  <a href="<?=URL?>empty/reserveren/<?=$reserv["id"]?>" style="text-decoration: none;"><li class="list-group-item active"><?echo $reserv["paarden"];?></li></a>
  <li class="list-group-item">Email:<?echo $reserv["email"];?></li>
  <li class="list-group-item">Begin tijd: <?echo $reserv["e_time"];?></li>
  <li class="list-group-item">Eind tijd: <?echo $reserv["b_time"];?></li>
  <li class="list-group-item">Prijs van het paard: <?echo $reserv["price"];?></li>
  <li class="list-group-item">
  <a class="btn btn-warning">Aanpassen</a>
  <a id ="modalus" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
Verwijder</a>



  </li>
</ul>

<?php }
?>