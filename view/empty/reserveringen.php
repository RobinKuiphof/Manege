
<?php 
if(isset($_GET['edit'])){?>

<div class="alert alert-warning" role="alert">
      <strong>Well done!</strong> You have successfully edited the order.
  </div>
  

<?}?>
<?
if(isset($_GET['delete'])){

  ?>
  <div class="alert alert-danger" role="alert">
      <strong>Well done!</strong> You have successfully deleted the order.
  </div>
  
  
  <? 
  }

if(empty($reservering)){ ?>
<div class="alert alert-warning" role="alert">
  <strong>Helaas!</strong> Je hebt nog geen orders open staan ga is heel snel een stukje vlees bestellen dan minder fijn persoon en geen oetlul.
</div> 
<?php }
foreach ($reservering as $reserv){
?>
<!-- Modal -->

<ul class="list-group col-6 m-auto">
  <a  style="text-decoration: none;"><li class="list-group-item active"><?echo $reserv["paarden"];?></li></a>
  <li class="list-group-item">Email:<?echo $reserv["email"];?></li>
  <li class="list-group-item">Begin tijd: <?echo $reserv["b_time"];?></li>
  <li class="list-group-item">Eind tijd: <?echo $reserv["e_time"];?></li>
  <li class="list-group-item">Prijs van het paard: <?echo $reserv["price"];?></li>

  <li class="list-group-item">
  <a href="<?=URL?>empty/updatereservering/<?=$reserv['orderid']?>" class="btn  text-white btn-warning">Aanpassen</a>
  <a id ="modalus" class="btn text-white btn-danger" data-toggle="modal" data-target="#exampleModal<?=$reserv["orderid"];?>">Verwijder</a>

  </li>
</ul>

<div class="modal fade" id="exampleModal<?=$reserv["orderid"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <a type="button" class="btn btn-secondary" data-dismiss="modal">Annuleer</a>
        <a href="<?=URL?>empty/delreservering/<?=$reserv["orderid"]?>" type="button" class="btn text-white bg-danger">Verwijder</a>
      </div>
    </div>
  </div>
</div>






<?php }
?>


