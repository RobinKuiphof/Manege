<?php 
foreach ($reservering as $reserv){
?>
<ul class="list-group col-6 m-auto">
  <a href="<?=URL?>empty/reserveren/<?=$reserv["id"]?>" style="text-decoration: none;"><li class="list-group-item active"><?echo $reserv["paarden"];?></li></a>
  <li class="list-group-item">Email:<?echo $reserv["email"];?></li>
  <li class="list-group-item">Begin tijd: <?echo $reserv["e_time"];?></li>
  <li class="list-group-item">Eind tijd: <?echo $reserv["b_time"];?></li>
  <li class="list-group-item">Prijs van het paard: <?echo $reserv["price"];?></li>
</ul>
<?}
?>