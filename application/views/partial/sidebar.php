<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center"
				href="<?php echo site_url('dashboard'); ?>">
				<div class="sidebar-brand-icon" >
                    <!-- <i class="fas fa-laugh-wink"></i> -->
										<img width="30px" height="30px" src="<?= base_url() ?>/assets/logoo.png">
										<link rel="shortcut icon" href="<?php echo base_url('assets/logoo.png') ?>" type="image/x-icon">
				</div>
				<div class="sidebar-brand-text mx-3">MYFIN</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item <?php echo active_link('dashboard') ?>">
				<a class="nav-link" href="<?php echo site_url('dashboard'); ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>
			<!-- Nav Item - Charts -->
			<!--<li class="nav-item <?php echo active_link('staff') ?>">
				<a class="nav-link" href="<?php echo site_url('staff'); ?>">
					<i class="fas fa-user-tie"></i>
					<span>Data Staff Koperasi</span></a>
			</li>-->
			<hr class="sidebar-divider">
			<div class="sidebar-heading">
                Data Master
            </div>
			<!-- Nav Item - Tables -->
			<li class="nav-item <?php echo active_link('admin') ?>">
				<a class="nav-link" href="<?php echo site_url('admin'); ?>">
					<i class="fas fa-chalkboard-teacher"></i>
					<span>Data Admin dan Staff</span></a>
			</li>
			<li class="nav-item <?php echo active_link('admin/nonaktif') ?>">
				<a class="nav-link" href="<?php echo site_url('admin/nonaktif'); ?>">
					<i class="fas fa-chalkboard-teacher"></i>
					<span>Data Non Aktif</span></a>
			</li>
				<!-- Nav Item - Pages Collapse Menu -->
				<!--<li class="nav-item <?php echo active_link(['nasabah', 'nasabah/ajuan','nasabah/penarikan']) ?>">
				<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
					aria-controls="collapseTwo">
					<i class="fas fa-address-card"></i>
					<span>Manajemen Nasabah</span>
				</a>
				<div id="collapseTwo" class="collapse <?php echo active_link(['nasabah', 'nasabah/ajuan', 'nasabah/penarikan'], 'show') ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item <?php echo active_link('nasabah') ?>" href="<?php echo site_url('nasabah'); ?>">Data Nasabah</a>
						<a class="collapse-item <?php echo active_link('nasabah/ajuan') ?>" href="<?php echo site_url('nasabah/ajuan'); ?>">Data Ajuan Kredit</a>
						<a class="collapse-item <?php echo active_link('nasabah/penarikan') ?>" href="<?php echo site_url('nasabah/penarikan'); ?>">Penarikan Kredit Nasabah</a>
					</div>
				</div>
			</li>-->

			<li class="nav-item">
                <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
                    <i class="fas fa-address-card"></i>
                    <span>Manajemen Nasabah</span>
                </a>
                <div id="collapseMaster" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-light py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manajemen Nasabah :</h6>
                        <a class="collapse-item" href="<?= base_url('nasabah'); ?>">Data Nasabah</a>
												<a class="collapse-item" href="<?= base_url('nasabah/nonaktif'); ?>">Data Nasabah Nonaktif</a>
												<br>
												<h6 class="collapse-header">Manajemen Ajuan :</h6>
                        <a class="collapse-item" href="<?= base_url('ajuan'); ?>">Data Ajuan Kredit</a>
												<a class="collapse-item" href="<?= base_url('catatan'); ?>">Ajuan dengan Catatan</a>
												<br>
												<h6 class="collapse-header">Manajemen Penarikan:</h6>
                        <a class="collapse-item" href="<?= base_url('penarikan'); ?>">Penarikan Saldo Nasabah</a>
                    </div>
                </div>
            </li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>