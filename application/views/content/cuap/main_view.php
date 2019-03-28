<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">  
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Cuap Cuap</h1>
    </div>

	<div class="row">
		<div class="col-md-4">
			<div class="card">
			  <div class="card-header">
			  	Hai <?php echo $this->session->userdata('nama_anggota'); ?>,
			  	<br>
			  	apa yang ingin anda cuapkan hari ini ? ...
			  </div>
			  <div class="card-body">
			  	<form action="<?php echo base_url('index.php/cuap/post') ?>" method="post">
			  		<input type="hidden" name="id_anggota" value="<?php echo $this->session->userdata('id_anggota')?>" />

			  		<div class="form-group">
			  			<textarea name="post_cuap" class="form-control" placeholder="ungkapkan isi hatimu tanpa ragu di sini" rows="13"></textarea>
			  		</div>
			  	
			  		<div class="form-group">
			    		<button type="submit" class="btn btn-success">cuapkan sekarang</button>
		    		</div>
			    </form>
			  </div>
			</div>
		</div>

		<div class="col-md-8">
			<?php
			foreach ($post_cuap as $row) {
			?>

			<div class="card">
			  <div class="card-header">
			  	
			  	<?php
			  	$avatar = base_url('upload/profil/avatar-unsex.png');
				if(!empty($row->jenis_kelamin)) {
					if($row->jenis_kelamin == "L") 
						$avatar = base_url('upload/profil/avatar-man.png');
					else if($row->jenis_kelamin == "P")
						$avatar = base_url('upload/profil/avatar-girl.png');
				}

				if(!empty($row->foto_profil)) {
					$avatar = base_url($row->foto_profil);
				}
			  	?>

			  	<img src="<?php echo $avatar ?>" class="img-fluid img-thumbnail rounded" alt="profil image" height="32" width="32">
			  	<span class="badge badge-primary"> <?php echo $row->nama_anggota ?></span>
			  	<span class="badge badge-secondary"> <?php echo $row->post_date ?></span>
			  	
			  </div>
			  <div class="card-body">
			    <p> <?php echo $row->post ?> </p>
			  </div>
			  <div class="card-footer">
			  	<form action="<?php echo base_url('index.php/cuap/comment') ?>" method="post">
				  	<div class="row">
				  		
				  		<input type="hidden" name="id_anggota" value="<?php echo $this->session->userdata('id_anggota') ?>" />
				  		<input type="hidden" name="post_parent_id" value="<?php echo $row->id_cuap ?>" />

			  			<div class="col-md-9 offset-md-1">
						  <div class="form-group">
						    <input type="text" class="form-control form-control-sm" placeholder="tulis komentar anda di sini" name="komentar">
						  </div>
				  		</div>

				  		<div class="col-md-2">
				  			<button type="submit" class="btn btn-success btn-sm">komentar</button>
				  		</div>
				  	</div>
			  	</form>

			  	<?php
			  	foreach($row->comment as $comment) {
			  	?>

			  	<div class="row">
			  		<div class="col-md-11 offset-md-1">

			  			<?php
					  	$avatar = base_url('upload/profil/avatar-unsex.png');
						if(!empty($comment->jenis_kelamin)) {
							if($comment->jenis_kelamin == "L") 
								$avatar = base_url('upload/profil/avatar-man.png');
							else if($comment->jenis_kelamin == "P")
								$avatar = base_url('upload/profil/avatar-girl.png');
						}

						if(!empty($comment->foto_profil)) {
							$avatar = base_url($comment->foto_profil);
						}
					  	?>
					  	
			  			<img src="<?php echo $avatar ?>" class="img-fluid img-thumbnail rounded" alt="profil image" height="32" width="32">
			  			<span class="badge badge-warning"> <?php echo $comment->nama_anggota ?></span>
			  			<span class="badge badge-secondary"> <?php echo $comment->post_date ?> </span>
			  			<p> <?php echo $comment->post ?> </p>
			  		</div>
			  	</div>

			  	<?php
			  	}
			  	?>
			  	
			  	
			  </div>
			</div>
			<br>

			<?php
			}
			?>
		</div>
	</div>
	


	


</main>

