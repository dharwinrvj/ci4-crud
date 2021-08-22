<!DOCTYPE html>
<html>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<style>
	</style>
	<title>CI4 CRUD</title>
</head>

<body>
	<?php if (!session()->has('id')) {
		header('Location:authentication');
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
					<h5 class="card-header">CI4 CRUD</h5>
					<div class="card-body text-dark">
						<form method="POST" action="/" autocomplete="off" enctype="multipart/form-data">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" name="name" value="<?= set_value('name'); ?>" placeholder="Enter Your Name" id="name">
							</div>
							<div class="form-group">
								<label for="age">Age</label>
								<input type="number" class="form-control" name="age" value="<?= set_value('age'); ?>" placeholder="Enter Your Age" id="age">
							</div>
							<div class="form-group">
								<label for="ph">Phone Number</label>
								<input type="number" class="form-control" name="ph" value="<?= set_value('ph'); ?>" placeholder="Enter Your Contact Number" id="ph">
							</div>
							<div class="form-group">
								<label for="image">Image</label>
								<input type="file" class="form-control" name="image" placeholder="Upload Your Image" id="image">
							</div>
							<button type="submit" class="btn btn-dark">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-sm-12 col-md-8 col-lg-5 mt-2">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Age</th>
							<th scope="col">Contact</th>
							<th scope="col">Image</th>
							<th scope="col">Functions</th>
						</tr>
					</thead>
					<?php if (isset($result)) { ?>
						<?php foreach ($result as $row) { ?>
							<tr>
								<th scope="row"><?= $row['id'] ?></th>
								<td><?= $row['name'] ?></td>
								<td><?= $row['age'] ?></td>
								<td><?= $row['ph'] ?></td>
								<td><img height="50px" width="50px" src="/public/<?= $row['image'] ?>"></td>
								<td>
									<a class="btn btn-outline-danger btn-sm" href="/home/delete/<?= $row['id'] ?>">Delete</a>
									<a class="btn btn-outline-warning btn-sm" href="/home/update/<?= $row['id'] ?>">Update</a>
								</td>
							</tr>
						<?php } ?>
					<?php } ?>
					<tbody>

					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>

</html>