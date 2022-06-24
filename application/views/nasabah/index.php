<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data Nasabah</h1>
    </div>
    <div class="row">
	<div class="col-lg-12">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">List Nasabah Terdaftar</h6>
			</div>
			<div class="card-body">
				<?php if ($this->session->flashdata('info')) : ?>
					<div class="alert alert-success">
						<?php echo $this->session->flashdata('info'); ?>
					</div>
				<?php endif; ?>
				<table class="table table-bordered" id="dataTable">
					<thead>
						<tr>
							<th>No</th>
							<th>Email</th>
							<th>NIK</th>
							<th>Nama Lengkap</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<?php $no = 1; ?>
					<?php foreach($tb_data_nasabah->result() as $o) : ?>
					<tbody>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $o->email; ?></td>
							<td><?php echo $o->nik; ?></td>
							<td><?php echo $o->nama_lengkap; ?></td>
							<td>
								<a href="<?php echo site_url('nasabah/nonaktifkan/') . $o->id_user; ?>" 
									class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah yakin ingin menonaktifkan?')"><i class="fa fa-power-off"></i></a>
									<!--<a href="" data-id="<?php echo $o->id_user; ?>"
									class="btn btn-primary btn-circle btn-sm btn-ubah-nas"><i
										class="fa fa-edit"></i></a>-->
								</td>
						</tr>
					</tbody>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

