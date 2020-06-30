<div class="container">
    <h1 class="text-danger text-center">Agenda van <?= $slb[0]['voornaam']?></h1>
    
    <div class = "row pt-5">
        <?php foreach ($tijden as $tijd){ ?>
            <div class = "col-4 border mb-2">
                <h2><?= $tijd['les']; ?> om <?= date('H:i', strtotime($tijd["tijd"])), " uur"; $les_id = $tijd['les_id']; ?><br> </h2>
                <h4>Leraar: <?= $tijd['voornaam'], " ", $tijd['achternaam']; ?> </h4>
                <a class = "text-primary" href="<?= URL?>planning/updatePlanning/<?= $tijd['les_id']; ?>"><i class="fas fa-edit"></i></a>
                <hr>
                <?php 
                foreach($planning as $plan){
                    var_dump($les_id, $plan['les_id']);
                    if ($les_id == $plan['les_id']){
                        ?>
                            <div class = "col">                
                            <ul>
                                <li>
                                <a class="text-dark" href="<?= URL ?>student/detailsKlas/<?= $plan['klasID'] ?>"> <?= $plan['groepnaam'] ?></a></a> <a class = "text-danger" href="<?= URL?>planning/deletePlanning/<?= $plan['planning_id']; ?>"><i class="fas fa-times"></i></a>       
                            </ul>
                            </div>
                    <?php
                    }
                }
                ?>
            </div>
        <?php }?>
    </div>
</div>