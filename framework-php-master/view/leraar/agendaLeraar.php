<div class="container">
    <h1 class="text-danger text-center">Agenda van <?= $slb[0]['voornaam']?></h1>
    <div class = "row pt-5">
    <?php foreach($planning as $plan){ ?>
        <div class = "col-4 border mb-2">
        <div class = "h4 text-info"><?= date("d-m-Y", strtotime($plan['datum'])); ?> </div>
        <div class = "h3"><?=$plan['les']; ?> om <?= date('H:i', strtotime($plan["tijd"])); ?> uur <br></div>
            <h4>Eindtijd: <?= date('H:i', strtotime('+ '.$plan['tijdsduur'].' minute', strtotime($plan["tijd"]))); ?> uur <br>
            Leraar: <?=$plan['voornaam'], " ", $plan['achternaam']; ?> </h4> <a class = "text-primary" href="<?= URL?>planning/updatePlanning/<?= $plan['les_id']; ?>"><i class="fas fa-edit"></i></a>
        <hr>
        <div class = "col">                
                        <ul>
                            <li>
                            <a class="text-dark" href="<?= URL ?>student/detailsKlas/<?= $plan['klas_id'] ?>"> <?= $plan['groepnaam'] ?></a></a> <a class = "text-danger" href="<?= URL?>planning/deletePlanning/<?= $plan['planning_id']; ?>"><i class="fas fa-times"></i></a>       
                        </ul>
                        </div>

        </div>
    <?php }?>
</div>