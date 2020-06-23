<div class = "container">
    <h1> Student verwijderen </h1>

    <p><span>Weet je zeker dat je <?= $student['voornaam'], ' ', $student['achternaam']; ?> wilt verwijderen?</span></p>

    <div> 
        <a href= "<?= URL ?>../home/index" class  = "btn btn-info">Nee</a>
        <a href= "<?= URL ?>student/destroyStudent/<?= $student['id']; ?>" class = "btn btn-danger">Ja</a>
    </div>
</div>