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
  <form class="form-signin" action="<?php echo base_url() ?>index.php/autentikasi/register" method="post" >
    <img class="mb-4" src="<?php echo base_url() ?>assets/images/logo/papsi.gif" alt="" width="250">
    <h3 class="h3 mb-3 font-weight-normal">Dafar Anggota Baru</h3>
    
    <label for="nama_anggota" class="sr-only">User ID</label>
    <input type="text" id="nama_anggota" name="nama_anggota" class="form-control" placeholder="Nama Lengkap" required autofocus>
    
    <label for="email_anggota" class="sr-only">Email</label>
    <input type="email" id="email_anggota" name="email_anggota" class="form-control" placeholder="Email" requireds>

    <label for="password" class="sr-only">Email</label>
    <input type="text" id="password" name="password" class="form-control" placeholder="Password" requireds>
    
    <label for="password2" class="sr-only">Password</label>
    <input type="password" id="password2" name="password2" class="form-control" placeholder="Ulangi Password" required>
    

    
    <button class="btn btn-lg btn-primary btn-block" type="submit">Daftar</button>

    <?php if(!empty($success)) { ?>
    <hr>
    <div class="alert alert-success" role="alert"> <?php echo $success; ?> </div>
    <a href="<?php echo base_url() ?>" class="alert-link">Silahkan Login</a>
    <?php } ?>

    <?php if(!empty($error)) { ?>
    <hr>
    <div class="alert alert-danger" role="alert"> <?php echo $error; ?> </div>
    <?php } ?>

    <hr>
    <p>
      Sudah punya akun, silahkan masuk <a href="<?php echo base_url() ?>">di sini</a>
    </p>
    <p class="mt-5 mb-3 text-muted">papcuap. &copy; 2018-2019</p>
  </form>
</body>

</html>