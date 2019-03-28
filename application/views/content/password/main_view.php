<!-- https://www.iconfinder.com/search/?q=avatar&price=free -->

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">  
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Ganti Password</h1>
    </div>

	<div class="row">
		
		<div class="col-md-12">
			<div class="card">
			  <div class="card-body">

			  	<?php if(!empty($success)) { ?>
			  	<div class="alert alert-success" role="alert"> <?php echo $success; ?> </div>
				<?php } ?>

				<?php if(!empty($error)) { ?>
				<div class="alert alert-danger" role="alert"> <?php echo $error; ?> </div>
				<?php } ?>
			  	
			  	<form action="<?php echo base_url('index.php/ganti_password/update') ?>" method="post">

				  <div class="form-group row">
				    <label for="password1" class="col-sm-4 col-form-label">Password Baru</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="password1" name="password1" />
				    </div>
				  </div>

				  <div class="form-group row">
				    <label for="password2" class="col-sm-4 col-form-label">Konfirmasi Password Baru</label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control" id="password2" name="password2" />
				    </div>
				  </div>
				 
				  <div class="form-group row">
				    <div class="col-sm-8 offset-sm-4">
				      <button type="submit" class="btn btn-primary">Simpan</button>
				    </div>
				  </div>
				</form>

			  </div>
			</div>
		</div>


		

	</div>

</main>

