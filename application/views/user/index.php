        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?=$title;?></h1>

		  	<div class="card border-left-primary mb-3" style="max-width: 500px;">
			  <div class="row no-gutters">
				<div class="col-lg-4">
				  <img src="<?=base_url('assets/img/profile/') . $user['image'];?>" class="card-img img-fluid px-sm-1  img-fluid">

				</div>
				<div class="col-lg-8">
				  <div class="card-body">
					<h2 class="card-title"><?=$user['name'];?></h2>
					<p class="card-text"><?=$user['email'];?></p>

					<p class="card-text"><small class="text-muted">Bergabung sejak <?=date('d F Y', $user['date_created'])?></small></p>
				  </div>
				</div>
			  </div>
			</div>

        </div>

		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4">
					<div class="card border-left-info mb-3">
						<table class="table table-sm">
							<tr>
								<th>Bidang</th>
								<td>:</td>
								<td><?=$role['role']?></td>
							</tr>
							<tr>
								<th>Subbidang</th>
								<td>:</td>
								<td><?=$user['subbidang']?></td>
							</tr>
							<tr>
								<th>NIK</th>
								<td>:</td>
								<td><?=$user['nik']?></td>
							</tr>

							<tr>
								<th>Pendidikan</th>
								<td>:</td>
								<td><?=$user['pendidikan']?></td>
							</tr>

							<tr>
								<th>Tgl Lahir</th>
								<td>:</td>
								<td><?=$user['tgllahir']?></td>
							</tr>

							<tr>
								<th>Jabatan</th>
								<td>:</td>
								<td><?=$user["jabatan"]?></td>
							</tr>

						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- <a href="<?=base_url('user/edituser')?>" class="btn btn-warning">Edit Profile</a> -->
		<div class="container-fluid">
		<a href="<?=base_url('user/gantipassword')?>" class="btn btn-danger" style="width:35%"><b>GANTI PASSWORD</b></a>
		<br>
		<span style="color: red;">Lakukan Pergantian Password Untuk Keamanan Akun</span>

		</div>


        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
