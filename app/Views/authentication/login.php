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
                <h5 class="card-header">LogIn</h5>
                <div class="card-body text-dark">
                    <form autocomplete="off" method="post" action="/authentication">
                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input type="email" class="form-control" name="email" value="<?= set_value('email'); ?>" placeholder="Enter Your E-Mail" id="email" aria-describedby="emailHelp">
                            <small id="help" class="form-text text-muted">New User <a href="/authentication/register">Register </a>here.</small>
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" class="form-control" name="pass" value="<?= set_value('pass'); ?>" placeholder="Enter Your Password" id="pass">
                            <small id="help" class="form-text text-muted"><a href="/authentication/reset">Forget Password ?</a></small>
                        </div>
                        <button type="submit" class="btn btn-dark">LogIn</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo view('layout/footer'); ?>