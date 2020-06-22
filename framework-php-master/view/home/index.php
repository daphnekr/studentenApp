<div class="container">
 <h1 class = "text-danger"> Overzicht studenten per klas</h1>

<div class = "row">
<?php foreach ($groups as $group){ ?>
    <div class = "col">
        <h2><?= $group['groepnaam']; $id = $group['id']?> </h2>
        <hr>
        <?php 
        foreach($students as $student){
            if ($id == $student['klas_id']){
                ?>
                Voornaam: <?= $student['voornaam']; ?> <br>
                Achternaam: <?= $student['achternaam']; ?> <br>
                E-mailadres: <?= $student['e-mail']; ?> <br>
                Klas: <?= $student['groepnaam']; ?> 
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
