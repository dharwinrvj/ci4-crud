<?php echo view('layout/header'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-lg-5 mt-5">
            <?php if (isset($vresult)) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong><?= $vresult->ListErrors(); ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <?php if (isset($error)) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php foreach ($error as $err) { ?>
                        <strong><?= $err ?></strong>
                    <?php } ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <div class="card border-dark mb-3 ">
                <h5 class="card-header">Register</h5>
                <div class="card-body text-dark">
                    <form method="POST" action="/authentication/register" autocomplete="off">
                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input type="email" class="form-control" name="email" value="<?= set_value('email'); ?>" placeholder="Enter Your E-Mail" id="email" aria-describedby="emailHelp">
                            <small id="help" class="form-text text-muted">Already Registered ? <a href="/authentication">LogIn </a>here.</small>
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" name="pass" value="<?= set_value('pass'); ?>" placeholder="Enter Your Password" id="pass" aria-describedby="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="hint">Password Hint</label>
                            <input type="text" name="hint" value="<?= set_value('hint'); ?>" placeholder="Enter Your Password Hint" id="hint" aria-describedby="" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-dark">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo view('layout/footer'); ?>