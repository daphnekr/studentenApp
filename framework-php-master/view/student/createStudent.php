<div class="form-container col-8 col-md-6 col-lg-4 offset-2 offset-md-3 offset-lg-4 mt-4">
        <form action="addStudent" method="post" name="Sign-Up" autocomplete="off">
            <div class="form-group text-center text-dark">
                <label for="voornaam">Voornaam</label>
                    <input class="form-control" type="text" name="voornaam" required>
            </div>
            <div class="form-group text-center text-dark">
                <label for="achternaam">Achternaam</label>
                    <input class="form-control" type="text" name="achternaam" required>
            </div>
            <div class="form-group text-center text-dark">
                <label for="mail">E-Mail</label>
                    <input class="form-control" type="email" name="mail" required>
            </div>
            <div class="form-group text-center text-dark">
                <label for="Klas">Klas</label>
                    <input class="form-control" list="klassen" name="klas" onfocus="this.value=''" required>
            </div>
            <div class="form-group text-center">
                <input type="submit" value="Register" class="form-submit col-4 col-lg-3">
            </div>
        </form>
</div>

<datalist id="klassen">
    <select name="klassen">
        <?php foreach($klas as $group){?>
            <option value="<?= $group['groepnaam']?>"><?= $group['groepnaam']?></option>
        <?php }?>
    </select>
</datalist>