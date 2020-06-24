<div class="container">
    <div class="row">
        <div class="col-8 text-center mt-4">
        <h1 class = "text-danger text-left"> Leraar toevoegen</h1>
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
                    <div class="form-group text-center">
                        <input type="submit" value="Teach!" class="form-submit col-4 col-lg-3">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-4 text-center mt-4">
        <h1 class = "text-danger text-left"> Overzicht leraren</h1>
            <?php foreach($slb as $docent){?>
                <div class="row">
                    <div class="col-4">
                    <h4 class="text-dark"> <?= $docent['voornaam'] ?></h4>
                    </div>
                    <div class="col-5">
                    <h4 class="text-dark"> <?= $docent['achternaam'] ?></h4>
                    </div>
                    <div class="col-3">
                        <?php 
                        foreach ($slbklassen as $slbklas){ 
                            if ($slbklas["slb'er_id"] == $docent['id']){ ?>
                                <h6 class="text-dark pt-2"> <?= $slbklas['groepnaam'] ?></h6>
                            <?php
                            }
                        }
                        ?>
                    
                    </div>
                </div><hr><br>
            <?php }?>
        </div>
    </div>
</div>