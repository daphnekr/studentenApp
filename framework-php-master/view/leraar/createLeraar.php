<div class="container">
    <div class="row">
        <div class="col-8 text-center">
            <div class="form-container col-12 col-md-10 col-lg-8 mt-4">
                <form action="<?= URL ?>leraar/addTeacher" method="post" name="add" autocomplete="off">
                    <div class="form-group text-center text-dark">
                        <label for="voornaam">Voornaam</label>
                            <input class="form-control" type="text" name="voornaam" required>
                    </div>
                    <div class="form-group text-center text-dark">
                        <label for="achternaam">Achternaam</label>
                            <input class="form-control" type="text" name="achternaam" required>
                    </div>
                    <div class="form-group text-center text-dark">
                        <label for="klas">Klas</label>
                            <input class="form-control" list="klassen" name="klas" placeholder="LPIAO19A..." required>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="Teach!" class="form-submit col-4 col-lg-3">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-4 text-center mt-4">
            <?php foreach($slb as $docent){?>
                <div class="row">
                    <div class="col-lg-4">
                        <a class="text-primary h4" href="<?= URL ?>leraar/updateLeraar/<?= $docent['id']?>"> <?= $docent['voornaam'] ?></a>
                    </div>
                    <div class="col-lg-5">
                        <h4 class="text-dark"> <?= $docent['achternaam'] ?></h4>
                    </div>
                    <div class="col-lg-3">
                    <?php if($slb['id'] == $slb["slb'er_id"]){?>
                        <h6 class="text-dark"> <?= $docent['groepnaam'] ?></h6>
                    <?php } elseif($slb['groepnaam'] == NULL){?>
                        <h6 class="text-dark">NULL</h6>
                    <?php }?>
                    </div>
                </div><hr><br>
            <?php }?>
        </div>
    </div>
</div>

<datalist id="klassen">
    <select name="klassen">
        <?php foreach($klas as $group){?>
            <option value="<?= $group['groepnaam']?>"><?= $group['groepnaam']?></option>
        <?php }?>
    </select>
</datalist>
<?php var_dump($slb)?>