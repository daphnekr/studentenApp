<div class="container">
 <h1 class = "text-danger text-center"><?= $student['voornaam'], " ", $student['achternaam'] ?> </h1>
    <div class = "row justify-content-between mt-5">
        <div class = "col-5 border p-3">
            <h3 class = "text-center"> Persoonsgegevens </h3>
            <div class = "row">                    

                <div class = "col">                

                    <b>Voornaam:</b><br><br>
                    <b>Achternaam:</b><br><br>
                    <b>E-mailadres:</b><br><br>
                    <b>Slb'er:</b><br> <br>
                    <b>Klas:</b><br>
                </div>
                    <div class = "col">
                    <?= $student['voornaam']; ?> <br><br>
                    <?= $student['achternaam']; ?> <br><br>
                    <?= $student['e-mail']; ?> <br><br>
                    <?= $student['leraar_VN'], " ", $student['leraar_AN']; ?> <br><br>
                    <?= $student['groepnaam']; ?> <br>                    
                </div> 
            </div>  
        </div>

        <div class = "col-5 border p-3">
            <h3 class = "text-center"> Planning </h3>
            <?php foreach ($planning as $plan){ ?>
            <b>Les:</b> <?= $plan['les']; ?> <br>
            <b>Tijd: </b> <?= date('H:i', strtotime($plan["tijd"])) ?> uur <br><br>
            <?php } 
            if ($planning == NULL){ ?>
                <p> <?= $student['voornaam'], " ", $student['achternaam']; ?> staat nergens ingepland </p>
            <?php
            } ?>
        </div>
        </div>

        <div class = "row mt-5 justify-content-between">
        <div class = "col-5">
            <a class = "text-danger" href="<?= URL?>student/deletestudent/<?= $student['studenten_id']; ?>"><i class="fas fa-times"></i> Verwijder <?= $student['voornaam'], " ", $student['achternaam']; ?></a> </div>
            <div class = "col-5"><a class = "text-primary" href="<?= URL?>student/updateStudent/<?= $student['studenten_id']; ?>"><i class="fas fa-edit"></i>Update <?= $student['voornaam'], " ", $student['achternaam']; ?></a> </div>
         </div>
    


 </div>