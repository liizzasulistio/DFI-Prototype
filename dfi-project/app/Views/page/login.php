<?= $this->extend('layout/template')?>

<?= $this->section('content')?>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white form-wrapper">
            <div class="container">
            <h3>Login to DFI Project</h3>
            <hr>
            <form action="/login" method="post">
                <div class="form-group mb-1">
                    <label for="UserUsername">Username or Email</label>
                    <input type="text" class="form-control" name="UserUsername" value="<?= set_value('UserUsername')?>" autofocus>
                </div>
                <div class="form-group mb-1">
                    <label for="UserPassword">Password</label>
                    <input type="password" class="form-control" name="UserPassword">
                </div>
                <?php if (isset($validation)) : ?>
                <div class="alert alert-danger mt-2" role="alert">
                        Username or Email and Password doesn't match.
                    </div>
                <?php endif; ?>    
                <div class="row">
                    <div class="col-12 mb-1 justify-content-center">
                        <a href="#">Forgot password?</a> |
                        <a href="/register">Don't have an account yet?</a>
                    </div>
                    <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection()?>