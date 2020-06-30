<div class="form-container col-8 col-md-6 col-lg-4 offset-2 offset-md-3 offset-lg-4 mt-4">
        <form action="<?= URL ?>planning/modifyplanning/<?= $les['les_id']?>" method="post" name="update" autocomplete="off">
            <div class="form-group text-center text-dark">
                <label for="voornaam">Les</label>
                    <input class="form-control" type="text" placeholder="<?= $les['les']?>" name="les" value="<?= $les['les']?>" required>
            </div>
            <div class="form-group text-center text-dark">
                <label for="tijd">Tijd</label>
                    <input class="form-control" type="time" placeholder="<?= $les['tijd']?>" name="tijd" value="<?= $les['tijd']?>" required>
            </div>
            <div class="form-group text-center text-dark">
                <label for="tijdsduur">Tijdsduur</label>
                    <input class="form-control" type="number" placeholder="<?= $les['tijdsduur']?>" name="tijdsduur" value="<?= $les['tijdsduur']?>" required>
            </div>
            <div class="form-group text-center text-dark">
                <label for="leraar"><h3>Leraar</h3></label> <br>
                <select name="leraar">
                    <?php foreach($leraren as $leraar){ ?>
                        <option <?php if ($les["leraar_id"] == $leraar['id']) echo 'selected'; ?> value="<?php echo htmlentities($leraar["id"]);?>"><?php echo htmlentities($leraar["voornaam"]), " ", htmlentities($leraar["achternaam"])?></option>
                    <?php } ?>
                    </select>
            </div>
            <div class="form-group text-center">
                <input type="submit" value="Update" class="form-submit col-4 col-lg-3">
            </div>
        </form>
</div>