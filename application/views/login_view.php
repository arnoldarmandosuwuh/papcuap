<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>.:: papcuap ::.</title>

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/examples/sign-in/signin.css">
</head>
	
<body class="text-center">
  <form class="form-signin" action="<?php echo base_url() ?>index.php/autentikasi/login" method="post" >
    <img class="mb-4" src="<?php echo base_url() ?>assets/images/logo/papsi.gif" alt="" width="250">
    <label for="user_id" class="sr-only">User ID</label>
    <input type="text" id="user_id" name="user_id" class="form-control" placeholder="User ID" required autofocus>
    <label for="password" class="sr-only">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
    
    <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>

    <?php if(!empty($error)) { ?>
    <hr>
    <div class="alert alert-danger" role="alert"> <?php echo $error; ?> </div>
    <?php } ?>

    <hr>
    <p>
      Belum punya akun, daftar baru <a href="<?php echo base_url() ?>index.php/autentikasi/new">di sini</a>
    </p>
    <p class="mt-5 mb-3 text-muted">papcuap. &copy; 2018-2019</p>
  </form> 
</body>

</html>