<div class="container">
    <div class="row">
        <div class="col-8 text-center">
            <div class="form-container col-12 col-md-10 col-lg-8 mt-4">
                <form action="<?= URL ?>leraar/modifyTeacher/" method="post" name="add" autocomplete="off">
                    <div class="form-group text-center text-dark">
                        <label for="voornaam">Voornaam</label>
                            <input class="form-control" type="text" name="voornaam" value="<?= $slb['voornaam']?>" required>
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
<?php var_dump($klas)?>