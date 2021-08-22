<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
    </style>
    <title>Register</title>
</head>

<body>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>

</html>