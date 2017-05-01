<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="block_decoration sign-form">
            <form id="sign" action="/acount/" method="POST">
                <div class="form-group">
                    <label for="main-login">Login</label>
                    <input type="text" name="login" class="form-control" id="main-login" placeholder="Login">
                </div>
                <div class="form-group">
                    <label for="main-password">Password</label>
                    <input type="password" name="password" class="form-control" id="main-password" placeholder="password">
                </div>
                <div class="form-group clearfix">
                    <button type="submit" class="btn btn-success sign-in-button">Sign in</button>
                    <div class="error-box <?php
                    if (!$_SESSION['result']) {
                        echo 'hidden';
                    }
                    $_SESSION['result']=false;
                    ?>" id="error-login-box">not correct login or password</div>
                </div>
            </form>
        </div>
    </div>
</div>