<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data Ajuan Kredit</h1>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">List Ajuan Kredit</h6>
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
								<th>Id</th>
								<th>Tgl Ajuan</th>
								<th>Penggunaan</th>
								<th>Besar Ajuan</th>
								<th>Besar Ajuan Diterima</th>
								<th>Tenor</th>
								<th>Score</th>
								<th>Tgl Ubah</th>
								<th>Status</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<?php $no = 1; ?>
						<?php foreach ($tb_pengajuan_kredit->result() as $o) : ?>
							<tbody>
								<tr>
									<td><?php echo $no; ?></td>
									<td><a class='btn btn-info btn-circle btn-sm' href="<?= base_url('Ajuan/detail/'); ?><?= $o->id_pengajuan_kredit?>"><?= $o->id_nasabah?></a></td>
									<td><?php echo $o->tanggal_pengajuan; ?></td>
									<td><?php echo $o->penggunaan; ?></td>
									<td>Rp. <?php echo number_format ($o->besar_pengajuan,2,',','.');?></td>
									<td>Rp. <?php echo number_format ($o->bsr_pengajuan_diterima,2,',','.');?></td>
									<td><?php echo $o->tenor; ?></td>
									<td><?php echo $o->score; ?></td>
									<td><?php echo $o->tanggal_ubah; ?></td>
									<td><?php
										if ($o->status == 'diterima') {
											$status = "<span class='badge badge-pill badge-success'>Di Terima</span>";
										} elseif ($o->status == 'ditolak') {
											$status = "<span class='badge badge-pill badge-danger'>Di Tolak</span>";
										} elseif ($o->status == 'catatan') {
											$status = "<span class='badge badge-pill badge-warning'>Di Terima <br> dengan Catatan</span>";
										} else {
											$status = "<span class='badge badge-pill badge-dark'>Pending</span>";
										}
										echo $status; ?></td>
									<td>
										<a href="#" data-toggle="modal" data-target="#verifikasi<?= $no ?>" class="btn btn-sm btn-warning shadow-sm">Ubah Status</a>
										<!--<a href="<?php echo site_url('ajuan/hapus/') . $o->id_pengajuan_kredit; ?>" class="btn btn-primary btn-circle btn-sm" onclick="return confirm('Apakah yakin ingin menghapus?')"><i class="fa fa-power-off"></i></a>-->
									</td>
								</tr>
								<div class="modal fade" id="verifikasi<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?= $no ?>" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel<?= $no ?>">Konfirmasi Status Pengajuan</h5>
												<button class="close" type="button" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">×</span>
												</button>
											</div>
											<form action="<?php echo site_url('ajuan/verifikasi/' . $o->id_pengajuan_kredit) ?>" class="form-admin" method="post">
												<input type="hidden" id="id_pengajuan_kredit" name="id_pengajuan_kredit">
												<div class="modal-body">
													<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
													<div class="form-select">
														
														<div class="form-group">
															<label for="bsr_pengajuan_diterima">Besar Pengajuan yang Diterima</label>
															<input type="numeric" name="bsr_pengajuan_diterima" id="bsr_pengajuan_diterima" class="form-control" required>
														</div>
														<div class="form-group">
															<label for="tanggal_ubah">Tanggal Ubah</label>
															<input type="date" name="tanggal_ubah" id="tanggal_ubah" class="form-control" required>
														</div>
														<label for="nama_staff">Ubah Status</label>
														<select type="select" name="status" id="t-role" class="form-control" required>
															<option value="diterima">Di Terima</option>
															<option value="ditolak">Di Tolak</option>
															<option value="catatan">Di Terima dengan Catatan</option>
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
						<?php
							$no++;
						endforeach ?>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
	<!-- modal -->

	