<?php echo view('layout/header'); ?>
<?php if (!session()->has('id')) {
    header('Location:/');
    die();
} ?>
<div class="container-fluid">
    <a class="btn btn-outline-danger m-1" href="/authentication/logout">Logout</a>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-lg-5 mt-2">
            <?php if (isset($vresult)) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong><?= $vresult->ListErrors(); ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <div class="card border-dark mb-3 ">
                <h5 class="card-header">CI4 Update</h5>
                <div class="card-body text-dark">
                    <form method="POST" action="/home/update/<?= $value['id'] ?>" autocomplete="off" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="<?= $value['name']; ?>" placeholder="Enter Your Name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" name="age" value="<?= $value['age']; ?>" placeholder="Enter Your Age" id="age">
                        </div>
                        <div class="form-group">
                            <label for="ph">Phone Number</label>
                            <input type="number" class="form-control" name="ph" value="<?= $value['ph']; ?>" placeholder="Enter Your Contact Number" id="ph">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" placeholder="Upload Your Image" id="image">
                        </div>
                        <button type="submit" class="btn btn-dark">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo view('layout/footer'); ?>