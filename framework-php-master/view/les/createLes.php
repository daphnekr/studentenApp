<div class="form-container col-8 col-md-6 col-lg-4 offset-2 offset-md-3 offset-lg-4 mt-4">
<h1 class = "text-danger text-center"> Les toevoegen</h1>
        <form action="addLes" method="post" name="Sign-Up" autocomplete="off">
            <div class="form-group text-center text-dark">
                <label for="les"><h3>Les</h3></label>
                    <input class="form-control" type="text" name="les" required>
            </div>
            <div class="form-group text-center text-dark">
                <label for="tijd-start"><h3>Start Tijd</h3></label>
                    <input class="form-control col-lg-2 offset-lg-5 col-4 offset-4 text-center" type="time" name="tijd-start" required>
            </div>
            <div class="form-group text-center text-dark">
                <label for="tijd-eind"><h3>Eind Tijd</h3></label>
                    <input class="form-control col-lg-2 offset-lg-5 col-4 offset-4 text-center" type="time" name="tijd-eind" required>
            </div>
            <div class="form-group text-center text-dark">
                <label for="leraar"><h3>Leraar</h3></label> <br>
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
	