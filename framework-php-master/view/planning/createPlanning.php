<div class="form-container col-8 col-md-6 col-lg-4 offset-2 offset-md-3 offset-lg-4 mt-4">
<h1 class = "text-danger text-center"> Planning toevoegen</h1>
        <form action="addPlanning" method="post" name="Sign-Up" autocomplete="off">
            <div class="form-group text-center text-dark">
                <label for="studentNaam">Student naam</label> <br>
                <select name="studentNaam">
                    <?php foreach($students as $student){?>
                        <option value="<?php echo htmlentities($student["studenten_id"])?>"><?php echo htmlentities($student["voornaam"]), " ", htmlentities($student["achternaam"]) ?></option>
                    <?php } ?>
                    </select>
            </div>
            <div class="form-group text-center text-dark">
                <label for="les">Les</label> <br>
                <select name="les">
                    <?php foreach($lessen as $les){?>
                        <option value="<?php echo htmlentities($les["lessen_id"])?>"><?php echo htmlentities($les["les"]), " om ", date('H:i', strtotime($les["tijd"])), " uur" ?></option>
                    <?php } ?>
                    </select>
            </div>
            <div class="form-group text-center">
                <input type="submit" value="Toevoegen" class="form-submit col-4 col-lg-3">
            </div>
        </form>
    </div>
	