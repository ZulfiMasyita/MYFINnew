<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data Admin dan Staff Nonaktif</h1>
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
							<th>Tgl Nonaktif</th>
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
							<td><?php echo date ("d-m-Y")?></td>
							<td>
								<a href="<?php echo site_url('admin/aktifkan/') . $o->id_adminstaff; ?>" class="btn btn-success btn-circle btn-sm" onclick="return confirm('Apakah yakin ingin mengaktifkan admin?')"><i class="fa fa-power-off"></i></a>
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

