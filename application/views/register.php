<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/bootstrap.min.css"> 
		<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	<br>
		<h1 class="text-center">REGISTER</h1>
	
	<br>
	<br>
	<br>
	<br>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="row">
  		<div class="col-md-4 col-md-offset-4">
		<?php echo form_open('register/daftar'); ?>
		<form action="" method="POST" role="form">
			<?=$this->session->flashdata('pesan')?>
			
			<?php if (validation_errors()==true) {?>
			
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?php echo validation_errors();?>
			</div>	
			<?php }?>
		
			<div class="form-group">
				<label for="">Username</label>
				<input type="text" class="form-control" id="" name="username" placeholder="Masukan Username Anda">
			</div>
			<div class="form-group">
				<label for="">Password</label>
				<input type="Password" class="form-control" id="" name="password" placeholder="Masukan Password Anda a-z | A-Z | 0-9">
			</div>
		<div class="form-group">
					<label for="">Konfirmasi Password</label>
					<input type="Password" class="form-control" id="" name="konfirmasi_password" placeholder="Insert Password">
				</div>
			
		
			<button type="submit" class="btn btn-success">Register</button>
			<!-- <a href="<?php echo site_url('login/index/')?>" type="button" class="btn btn-info">Login</a>  -->
		
		</form>
		<?php echo form_close(); ?>

	</div>
	</div>
	</div>


		

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="<?php echo base_url('') ?>assets/js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>