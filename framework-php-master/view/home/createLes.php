<div class="form-container col-8 col-md-6 col-lg-4 offset-2 offset-md-3 offset-lg-4 mt-4">
        <form action="addLes" method="post" name="Sign-Up" autocomplete="off">
            <div class="form-group text-center text-dark">
                <label for="les">Les</label>
                    <input class="form-control" type="text" name="les" required>
            </div>
            <div class="form-group text-center text-dark">
                <label for="tijd">Tijd</label>
                    <input class="form-control" type="time" name="tijd" required>
            </div>
            <div class="form-group text-center text-dark">
                <label for="leraar">Leraar</label> <br>
                <select name="leraar">
                    <?php foreach($leraren as $leraar){?>
                        <option value="<?php echo htmlentities($leraar["id"])?>"><?php echo htmlentities($leraar["voornaam"]), " ", htmlentities($leraar["achternaam"])?></option>
                    <?php } ?>
                    </select>
            </div>
            <div class="form-group text-center">
                <input type="submit" value="Toevoegen" class="form-submit col-4 col-lg-3">
            </div>
        </form>
    </div>
	