<div class = "container">
    <h1> Planning verwijderen </h1>
    <p><span>Weet je zeker dat je <?= $planning['groepnaam']?> bij <?= $planning['les']; ?> om <?= date('H:i', strtotime($planning["tijd"])); ?> uur wilt verwijderen?</span></p>

    <div> 
        <a href= "<?= URL ?>planning/agenda" class  = "btn btn-info">Nee</a>
        <a href= "<?= URL ?>planning/destroyPlanning/<?= $planning['planning_id']; ?>" class = "btn btn-danger">Ja</a>
    </div>
</div>