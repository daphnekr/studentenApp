<div class="form-container col-8 col-md-6 col-lg-4 offset-2 offset-md-3 offset-lg-4">
        <form action="<?= URL ?>home/plusStudent" method="post" name="Sign-Up" autocomplete="off">
            <div class="form-group text-center text-white">
                <label for="regVoor" class="text-dark">Voornaam</label>
                    <input class="form-control" type="text" name="regVoor" required>
            </div>
            <div class="form-group text-center text-white">
                <label for="regAchter" class="text-dark">Achternaam</label>
                    <input class="form-control" type="text" name="regAchter" required>
            </div>
            <div class="form-group text-center text-white">
                <label for="regMail" class="text-dark">E-mail</label>
                    <input class="form-control" type="email" name="regMail" required> 
            </div>
            <div class="form-group text-center text-white">
                <label for="regPass" class="text-dark">Password</label>
                    <input class="form-control" type="password" name="regPass" minlength="8" id="pass" required>
            </div>
            <div class="form-group text-center text-white">
                <label for="regPassConf" class="text-dark">Confirm Password</label>
                    <input class="form-control" type="password" name="regPassConf" minlength="8" id="passConfirm" required>
            </div>
            <div class="form-group text-center text-white">
                <label for="regKlas" class="text-dark">Klas</label>
                    <input class="form-control" list="klassen" name="regKlas"required>
            </div>
            <div class="form-group text-center">
                <input type="submit" value="Register" class="form-submit col-4 col-lg-3">
            </div>
        </form>
    </div>

<datalist id="klassen">
    <select name="klassen">
        <?php foreach($groups as $klas){?>
            <option value="<?= $klas['groepnaam']?>"><?= $group['groepnaam']?></option>
        <?php }?>
    </select>
</datalist>