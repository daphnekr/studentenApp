<div class="container">
 <h1 class = "text-danger"> Overzicht studenten per klas</h1>

<?php
 foreach($students as $student){
?>
    Voornaam: <?= $student['voornaam']; ?> <br>
    Achternaam: <?= $student['achternaam']; ?> <br>
    E-mailadres: <?= $student['email']; ?> <br>
    Klas: <?= $student['groepnaam']; ?> 
    <hr>

<?php

 }
?>

</div>
