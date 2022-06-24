<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Detail Data Nasabah</h1>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">List Data Nasabah</h6>
				</div>
				<div class="card-body">
					<?php if ($this->session->flashdata('info')) : ?>
						<div class="alert alert-success">
							<?php echo $this->session->flashdata('info'); ?>
						</div>
					<?php endif; ?>
					<table class="table table-bordered">
						<thead>
						<?php foreach ($detail_ajuan->result_array() as $o) : ?>
							<div>
							<a href="<?php echo site_url('ajuan'); ?>" class="btn btn-sm btn-warning shadow-sm" >< Kembali Ke Halaman Utama</a>
							</div>
							<tbody>
							<br>
							<tr>
								<th>ID Nasabah</th>
								<td colspan="3"><?php echo $o['id_user']; ?>
							</tr>
						<tr>
								<th>Email</th>
								<td colspan="3"><?php echo $o['email']; ?>
								</tr>
								<tr>
								<th>NIK</th>
								<td colspan="3"><?php echo $o['nik']; ?>
								</tr>
								<tr>
								<th>Nama Lengkap</th>
								<td colspan="3"><?php echo $o['nama_lengkap']; ?>
							</tr>
							<tr>
								<th>Nomor Hp</th>
								<td colspan="3"><?php echo $o['no_hp']; ?>
							</tr>
							<tr>
								<th>Alamat</th>
								<td colspan="3"><?php echo $o['alamat']; ?>
							</tr>
							<tr>
								<th>Kota Lahir</th>
								<td colspan="3"><?php echo $o['kota_lahir']; ?>
							</tr>
							<tr>
								<th>Tanggal Lahir</th>
								<td colspan="3"><?php echo $o['tgl_lahir']; ?>
							</tr>
							<tr>
								<th>Pekerjaan</th>
								<td colspan="3"><?php echo $o['pekerjaan']; ?>
							</tr>
							<tr>
								<th>Gaji</th>
								<td colspan="3"><?php echo $o['gaji']; ?></td>
							</tr>
							<tr>
								<th>Gaji Tambahan</th>
								<td colspan="3">Rp. <?php echo number_format ($o['gaji_tambahan'],2,',','.');?> / Bulan</td>
							</tr>
							</tbody>
						<?php
						endforeach ?>
						</thead>	
				</table>
			</div>
		</div>
	</div>
</div>