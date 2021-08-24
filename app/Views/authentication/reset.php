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
            <?php if (session()->get('success')) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?= session()->get('success') ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <?php if (session()->get('danger')) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?= session()->get('danger') ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <div class="card border-dark mb-3 ">
                <h5 class="card-header">Reset Password</h5>
                <div class="card-body text-dark">
                    <form autocomplete="off" method="post" action="/authentication/reset">
                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input type="email" class="form-control" name="email" value="<?= set_value('email'); ?>" placeholder="Enter Your E-Mail" id="email" aria-describedby="emailHelp">
                            <small id="help" class="form-text text-muted">New User <a href="/authentication/register">Register </a>here.</small>
                        </div>
                        <div class="form-group">
                            <label for="hint">Hint</label>
                            <input type="text" class="form-control" name="hint" value="<?= set_value('hint'); ?>" placeholder="Enter Your Password Hint" id="hint">
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" name="password" value="<?= set_value('password'); ?>" placeholder="Enter Your New Password" id="password">
                        </div>
                        <button type="submit" class="btn btn-dark">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo view('layout/footer'); ?>