<div class="container">
 <h1 class = "text-danger text-center pt-5"> Agenda</h1>

<div class = "row pt-5">
<?php foreach ($tijden as $tijd){ ?>
    <div class = "col border m-2">
        <h2><?= $tijd['les']; ?> om <?= date('H:i', strtotime($tijd["tijd"])), " uur"; $les_id = $tijd['les_id']; ?><br> </h2>
        <h4>Leraar: <?= $tijd['voornaam'], " ", $tijd['achternaam']; ?> </h4>
        <a class = "text-primary" href="<?= URL?>student/updatePlanning/<?= $tijd['studenten_id']; ?>"><i class="fas fa-info-circle"></i></a> <br>
        <hr>
        <?php 
        foreach($planning as $plan){
            if ($les_id == $plan['les_id']){
                ?>
                    <div class = "col">                
                    <ul>
                        <li><?= $plan['voornaam'], " ", $plan['achternaam']; ?> <br>               
                    </ul>
                    </div>
            <?php
            }
        }
        ?>
    </div>
<?php
  }
?>
</div>
</div>