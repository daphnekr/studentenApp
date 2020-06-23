<div class="container">
 <h1 class = "text-danger text-center pt-5"> Agenda</h1>

<div class = "row pt-5">
<?php foreach ($tijden as $tijd){ ?>
    <div class = "col">
        <h2><?= $tijd['les']; ?> om <?= date('H:i', strtotime($tijd["tijd"])), " uur"; $les_id = $tijd['les_id']; ?><br> </h2>
        <h4>Leraar: <?= $tijd['voornaam'], " ", $tijd['achternaam']; ?> </h4>
        <hr>
        <?php 
        foreach($planning as $plan){
            if ($les_id == $plan['les_id']){
                ?>
                    <div class = "col">                

                        <?= $plan['voornaam']; ?> <br>
                        <?= $plan['achternaam']; ?> <br>               

                    </div>


            <hr>
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