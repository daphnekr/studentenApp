    <div class="form-container col-8 col-md-6 col-lg-4 offset-2 offset-md-3 offset-lg-4">
        <form action="<?= URL ?>home/checkStudent" method="post" name="Login" autocomplete="off">
            <div class="form-group text-center text-white">
                <label for="logName" class="text-dark">E-mail</label>
                    <input class="form-control" type="e-mail" name="logMail" required>
            </div>
            <div class="form-group text-center text-white">
                <label for="logPass" class="text-dark">Password</label>
                    <input class="form-control" type="password" name="logPass" id="pass" required>
            </div>
            <div class="form-group text-center">
                <input class="form-submit col-4 col-lg-3" type="submit" name="login" value="Login">
            </div>
        </form>
    </div>