<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data Admin dan Staff</h1>
		<a href="#" data-toggle="modal" data-target="#tambahModal"
			class="btn btn-sm btn-primary shadow-sm">Tambah Data</a>
    </div>
    <div class="row">
	<div class="col-lg-12">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">List Admin dan Staff</h6>
			</div>
			<div class="card-body">
				<?php if ($this->session->flashdata('info')) : ?>
				<div class="alert alert-success">
					<?php echo $this->session->flashdata('info'); ?>
				</div>
				<?php endif; ?>
				<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
				<table class="table table-bordered" id="dataTable">
					<thead>
						<tr>
							<th>No</th>
							<th>Email</th>
							<th>Role</th>
							<th>Nama</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<?php $no = 1; ?>
					<?php foreach($tb_adminstaff->result() as $o) : ?>
					<tbody>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $o->email_adminstaff; ?></td>
							<td><?php echo $o->role; ?></td>
							<td><?php echo $o->nama_adminstaff; ?></td>
							<td>
								<a href="<?php echo site_url('admin/nonaktifkan/') . $o->id_adminstaff; ?>"
									class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah yakin ingin menonaktifkan admin?')"><i class="fa fa-power-off"></i></a>
								<a href="" data-id="<?php echo $o->id_adminstaff; ?>"
									class="btn btn-warning btn-circle btn-sm btn-ubah-adm"><i
										class="fa fa-edit"></i></a>
							</td>
						</tr>
					</tbody>
					<?php endforeach ?>
				</table>
			</div>
		</div>
    </div>
    </div>
</div>
<!-- /.container-fluid -->

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?php echo site_url('admin'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="t-email_adminstaff">Email</label>
						<input type="email" name="email_adminstaff" id="t-email_adminstaff" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="t-password">Password</label>
						<input type="password" name="password_adminstaff" id="t-password" class="form-control" required>
					</div>
					<div class="form-select">
						<label for="t-nama_adminstaff">Role</label>
						<select type="select" name="role" id="t-role" class="form-control" required>
							<option value="Admin">Admin</option>
							<option value="Staff">Staff</option>
						</select>
					</div>
					<div class="form-group">
						<label for="t-nama_adminstaff">Nama</label>
						<input type="text" name="nama_adminstaff" id="t-nama_adminstaff" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
					<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ubah admin</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?php echo site_url('admin/ubah') ?>" class="form-admin" method="post">
				<input type="hidden" id="id_adminstaff" name="id_adminstaff">
				<div class="modal-body">
					<div class="form-group">
						<label for="email_adminstaff">Email</label>
						<input type="email" name="email_adminstaff" id="email_adminstaff" class="form-control" required>
					</div>
					<!--<div class="form-group">
						<label for="password_adminstaff">Password</label>
						<input type="password" name="password_adminstaff" id="password_adminstaff" class="form-control">
						<small class="text-success light">Kosongkan jika tidak ingin merubah password</small>
					</div>-->
					<div class="form-select">
						<label for="nama_staff">Role</label>
						<select type="select" name="role" id="t-role" class="form-control" required>
							<option value="Admin">Admin</option>
							<option value="Staff">Staff</option>
						</select>
					</div>
					<div class="form-group">
						<label for="nama_adminstaff">Nama</label>
						<input type="text" name="nama_adminstaff" id="nama_adminstaff" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
					<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>