<div class="container">
 <h1 class = "text-danger"> Overzicht van studenten per klas</h1>

<div class = "row">
<?php foreach ($groups as $group){ ?>
    <div class = "col-4">
        <h2><?= $group['groepnaam']; $groep_id = $group['id']?> </h2>
        <hr>
        <?php 
        foreach($students as $student){
            if ($groep_id == $student['klas_id']){
                ?>
                <div class = "row">                    

                    <div class = "col">                

                        <b>Voornaam:</b><br>
                        <b>Achternaam:</b><br>
                        <b>E-mailadres:</b><br>
                        <b>Klas:</b><br>
                        <a class = "text-dark" href="<?= URL?>student/detailStudent/<?= $student['student_id']; ?>/<?= $student['klas_id']; ?>"><i class="fas fa-info-circle"></i></a>                         
                    </div>
                    <div class = "col">
                        <?= $student['voornaam']; ?> <br>
                        <?= $student['achternaam']; ?> <br>
                        <?= $student['e-mail']; ?> <br>
                        <?= $student['groepnaam']; ?> <br>                    
                    </div> 
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
