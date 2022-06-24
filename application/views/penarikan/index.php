<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="col-lg-12">
        <h1 class="h3 mb-4 text-gray-800">Penarikan Saldo Nasabah</h1>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">List Penarikan Saldo</h6>
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
							<th>Id Nasabah</th>
							<th>Jumlah Penarikan</th>
							<th>Bank</th>
							<th>No. Rekening</th>
							<th>Nama Pemilik</th>
							<th>Status</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<?php $no = 1; ?>
					<?php foreach($tb_penarikan_saldo->result() as $o) : ?>
					<tbody>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $o->id_nasabah; ?></td>
							<td>Rp. <?php echo number_format ($o->jml_penarikan,2,',','.');?></td>
							<td><?php echo $o->bank; ?></td>
							<td><?php echo $o->no_rek; ?></td>
							<td><?php echo $o->nama_pemilik; ?></td>
							<td><?php
										if ($o->status == 'diterima') {
											$status = "<span class='badge badge-pill badge-success'>Di Terima</span>";
										} elseif ($o->status == 'ditolak') {
											$status = "<span class='badge badge-pill badge-danger'>Di Tolak</span>";
										} else {
											$status = "<span class='badge badge-pill badge-dark'>Pending</span>";
										}
										echo $status; ?></td>
									<td>
										<a href="#" data-toggle="modal" data-target="#verifikasi<?= $no ?>" class="btn btn-sm btn-warning shadow-sm">Ubah Status</a>
										<!--<a href="<?php echo site_url('penarikan/hapus/') . $o->id_penarikan; ?>" class="btn btn-primary btn-circle btn-sm" onclick="return confirm('Apakah yakin ingin menghapus?')"><i class="fa fa-power-off"></i></a>-->
									</td>
						</tr>
						<div class="modal fade" id="verifikasi<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?= $no ?>" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel<?= $no ?>">Konfirmasi Status Penarikan</h5>
												<button class="close" type="button" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">×</span>
												</button>
											</div>
											<form action="<?php echo site_url('penarikan/verifikasi/' . $o->id_penarikan) ?>" class="form-admin" method="post">
												<input type="hidden" id="id_penarikan" name="id_penarikan">
												<div class="modal-body">
													<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
													<div class="form-select">
														<label for="nama_staff">Ubah Status</label>
														<select type="select" name="status" id="t-role" class="form-control" required>
															<option value="diterima">Di Terima</option>
															<option value="ditolak">Di Tolak</option>
														</select>
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
					</tbody>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

<!--<div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ubah Status Penarikan</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?php echo site_url('penarikan/ubah') ?>" class="form-penarikan" method="post">
				<input type="hidden" id="id_penarikan" name="id_penarikan">
				<div class="modal-body">
					<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
					<div class="form-select">
						<label for="status">Status</label>
						<select type="select" name="status" id="t-status" class="form-control">
							<option value="Belum Diproses">Belum Diproses</option>
							<option value="Selesai">Selesai</option>
						</select>
					</div>
					<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
					<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>