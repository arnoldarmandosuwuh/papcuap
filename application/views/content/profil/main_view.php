<!-- https://www.iconfinder.com/search/?q=avatar&price=free -->

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">  
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Profil</h1>
    </div>

	<div class="row">
		
		<div class="col-md-8">
			<div class="card">
			  <div class="card-body">
			  	
			  	<form action="<?php echo base_url('index.php/profil/update') ?>" method="post">

				  <div class="form-group row">
				    <label for="nama_anggota" class="col-sm-4 col-form-label">Nama</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="<?php echo $anggota->nama_anggota ?>" >
				    </div>
				  </div>

				  

				  <div class="form-group row">
				  	<label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
				    <div class="col-sm-8">
					    <select class="form-control" id="kelas" name="kelas">
					    	<?php $selected = ($anggota->kelas == "") ? "selected" : ""; ?>
					      	<option <?php echo $selected ?> value="">-Pilih Kelas-</option>

					      	<?php $selected = ($anggota->kelas == "A") ? "selected" : ""; ?>
					      	<option <?php echo $selected ?> value="A">A</option>

					      	<?php $selected = ($anggota->kelas == "B") ? "selected" : ""; ?>
					      	<option <?php echo $selected ?> value="B">B</option>

					      	<?php $selected = ($anggota->kelas == "C") ? "selected" : ""; ?>
					      	<option <?php echo $selected ?> value="C">C</option>

					      	<?php $selected = ($anggota->kelas == "D") ? "selected" : ""; ?>
					      	<option <?php echo $selected ?> value="D">D</option>

					      	<?php $selected = ($anggota->kelas == "E") ? "selected" : ""; ?>
					      	<option <?php echo $selected ?> value="E">E</option>
					    </select>
					</div>

				  </div>

				  <fieldset class="form-group">
				    <div class="row">
				      <legend class="col-form-label col-sm-4 pt-0">Jenis Kelamin</legend>
				      <div class="col-sm-8">
				        <div class="form-check">
				        	<?php $checked = ($anggota->jenis_kelamin == "L") ? "checked" : ""; ?>
				          	<input <?php echo $checked ?> class="form-check-input" type="radio" name="jenis_kelamin" id="jk_l" value="L">
				          	<label class="form-check-label" for="jk_l">Laki-Laki</label>
				        </div>
				        <div class="form-check">
				        	<?php $checked = ($anggota->jenis_kelamin == "P") ? "checked" : ""; ?>
				          	<input <?php echo $checked ?> class="form-check-input" type="radio" name="jenis_kelamin" id="jk_p" value="P">
				          	<label class="form-check-label" for="jk_p">Perempuan</label>
				        </div>
				      </div>
				    </div>
				  </fieldset>
				 
				  <div class="form-group row">
				    <div class="col-sm-8 offset-sm-4">
				      <button type="submit" class="btn btn-primary">Simpan</button>
				    </div>
				  </div>
				</form>

			  </div>
			</div>
		</div>


		<div class="col-md-4">

			<div class="card">
			  <div class="card-body">
			  	<?php echo form_open_multipart('profil/upload_photo_profil');?>
					<img src="<?php echo $avatar ?>" class="img-fluid img-thumbnail rounded mx-auto d-block" alt="profil image">

					<br>

					<div class="input-group">
					  <div class="custom-file">
					    <input type="file" class="custom-file-input" id="input_profil_image" name="input_profil_image">
					    <label class="custom-file-label" for="input_profil_image">Pilih Foto</label>
					  </div>
					  <div class="input-group-append">
					    <button class="btn btn-success" type="submit">Upload</button>
					  </div>
					</div>

					<?php echo $error;?>

					<?php 
					if(!empty($upload_data)) { 
						echo $upload_data['file_name']." success uploaded";
					}
					?>
					
				</form>
			  </div>
			</div>
			
		</div>

	</div>

</main>

