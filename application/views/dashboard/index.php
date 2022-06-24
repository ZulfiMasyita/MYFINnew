<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
	<div class="row">
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-secondary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Jumlah Admin dan Staff
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?php 
									$servername = "localhost";
									$database   = "app_myfin";
									$username   = "root";
									$password   = "";
									$con = mysqli_connect($servername, $username, $password, $database);

									$dash_admin_query = "SELECT * from tb_adminstaff";
									$dash_admin_query_run = mysqli_query($con, $dash_admin_query);

									if($admin = mysqli_num_rows($dash_admin_query_run))
									{
											echo '<h4 class="mb-0"> '.$admin.'</h4>';
									}
									else
									{
										echo '<h4 class="mb-0"> 0 </h4>';
									}
								
								?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="card-footer d-flex align-items-center justify-content-between">
						<a class="small text-black stretched-link" href="admin">View Details</a>
						<i class="fas fa-angle-right"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1"> Jumlah Nasabah Terdaftar
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?php 
								$servername = "localhost";
								$database   = "app_myfin";
								$username   = "root";
								$password   = "";
								$con = mysqli_connect($servername, $username, $password, $database);
									$dash_nasabah_query = "SELECT * from tb_data_nasabah";
									$dash_nasabah_query_run = mysqli_query($con, $dash_nasabah_query);

									if($nasabah = mysqli_num_rows($dash_nasabah_query_run))
									{
											echo '<h4 class="mb-0"> '.$nasabah.'</h4>';
									}
									else
									{
										echo '<h4 class="mb-0"> 0 </h4>';
									}
								
								?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-address-card fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="card-footer d-flex align-items-center justify-content-between">
						<a class="small text-black stretched-link" href="nasabah">View Details</a>
						<i class="fas fa-angle-right"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pengajuan Kredit  
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?php 
								$servername = "localhost";
								$database   = "app_myfin";
								$username   = "root";
								$password   = "";
								$con = mysqli_connect($servername, $username, $password, $database);
									$dash_ajuan_query = "SELECT * from tb_pengajuan_kredit";
									$dash_ajuan_query_run = mysqli_query($con, $dash_ajuan_query);

									if($ajuan = mysqli_num_rows($dash_ajuan_query_run))
									{
											echo '<h4 class="mb-0"> '.$ajuan.'</h4>';
									}
									else
									{
										echo '<h4 class="mb-0"> 0 </h4>';
									}
								
								?></div>
						</div>
						<div class="col-auto">
						<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="card-footer d-flex align-items-center justify-content-between">
						<a class="small text-black stretched-link" href="ajuan">View Details</a>
						<i class="fas fa-angle-right"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Ajuan Kredit yang Diterima
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?php 
								$servername = "localhost";
								$database   = "app_myfin";
								$username   = "root";
								$password   = "";
								$con = mysqli_connect($servername, $username, $password, $database);
									$dash_ajuan_diterima_query = "SELECT * from tb_pengajuan_kredit WHERE status='diterima' ";
									$dash_ajuan_diterima_query_run = mysqli_query($con, $dash_ajuan_diterima_query);

									if($ajuanditerima_total = mysqli_num_rows($dash_ajuan_diterima_query_run))
									{
											echo '<h4 class="mb-0"> '.$ajuanditerima_total.'</h4>';
									}
									else
									{
										echo '<h4 class="mb-0"> 0 </h4>';
									}
								
								?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user-check fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="card-footer d-flex align-items-center justify-content-between">
						<a class="small text-black stretched-link" href="ajuan">View Details</a>
						<i class="fas fa-angle-right"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1"> Ajuan Kredit yang Ditolak
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
							<?php 
							$servername = "localhost";
							$database   = "app_myfin";
							$username   = "root";
							$password   = "";
							$con = mysqli_connect($servername, $username, $password, $database);
									$dash_ajuan_ditolak_query = "SELECT * from tb_pengajuan_kredit WHERE status='ditolak' ";
									$dash_ajuan_ditolak_query_run = mysqli_query($con, $dash_ajuan_ditolak_query);

									if($ajuanditolak_total = mysqli_num_rows($dash_ajuan_ditolak_query_run))
									{
											echo '<h4 class="mb-0"> '.$ajuanditolak_total.'</h4>';
									}
									else
									{
										echo '<h4 class="mb-0"> 0 </h4>';
									}
								
								?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user-times fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="card-footer d-flex align-items-center justify-content-between">
						<a class="small text-black stretched-link" href="ajuan">View Details</a>
						<i class="fas fa-angle-right"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Ajuan Kredit dengan Catatan
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
							<?php 
							$servername = "localhost";
							$database   = "app_myfin";
							$username   = "root";
							$password   = "";
							$con = mysqli_connect($servername, $username, $password, $database);
									$dash_ajuan_catatan_query = "SELECT * from tb_pengajuan_kredit WHERE status='catatan' ";
									$dash_ajuan_catatan_query_run = mysqli_query($con, $dash_ajuan_catatan_query);

									if($ajuancatatan_total = mysqli_num_rows($dash_ajuan_catatan_query_run))
									{
											echo '<h4 class="mb-0"> '.$ajuancatatan_total.'</h4>';
									}
									else
									{
										echo '<h4 class="mb-0"> 0 </h4>';
									}
								
								?></div>
						</div>
						<div class="col-auto">
						<i class="fas fa-user-edit fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="card-footer d-flex align-items-center justify-content-between">
						<a class="small text-black stretched-link" href="catatan">View Details</a>
						<i class="fas fa-angle-right"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-dark shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-dark text-uppercase mb-1"> Ajuan Kredit yang Pending
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
							<?php 
							$servername = "localhost";
							$database   = "app_myfin";
							$username   = "root";
							$password   = "";
							$con = mysqli_connect($servername, $username, $password, $database);
									$dash_ajuan_query = "SELECT * from tb_pengajuan_kredit WHERE status='pending'";
									$dash_ajuan_query_run = mysqli_query($con, $dash_ajuan_query);

									if($ajuan = mysqli_num_rows($dash_ajuan_query_run))
									{
											echo '<h4 class="mb-0"> '.$ajuan.'</h4>';
									}
									else
									{
										echo '<h4 class="mb-0"> 0 </h4>';
									}
								
								?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user-clock fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="card-footer d-flex align-items-center justify-content-between">
						<a class="small text-black stretched-link" href="ajuan">View Details</a>
						<i class="fas fa-angle-right"></i>
					</div>
				</div>
			</div>
			</div>
			<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1"> Jumlah Penarikan Saldo
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?php 
								$servername = "localhost";
								$database   = "app_myfin";
								$username   = "root";
								$password   = "";
								$con = mysqli_connect($servername, $username, $password, $database);
									$dash_penarikan_query = "SELECT * from tb_penarikan_saldo";
									$dash_penarikan_query_run = mysqli_query($con, $dash_penarikan_query);

									if($penarikan = mysqli_num_rows($dash_penarikan_query_run))
									{
											echo '<h4 class="mb-0"> '.$penarikan.'</h4>';
									}
									else
									{
										echo '<h4 class="mb-0"> 0 </h4>';
									}
								
								?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-address-card fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="card-footer d-flex align-items-center justify-content-between">
						<a class="small text-black stretched-link" href="penarikan">View Details</a>
						<i class="fas fa-angle-right"></i>
					</div>
				</div>
			</div>
			</div>

		<!--<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-dark shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Jumlah Ajuan Kredit
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo($count['tb_penarikan_saldo']); ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>-->
	</div>
</div>


<!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <!--<div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-white">Grafik Pengajuan Kredit <?= date('Y'); ?></h6>
            </div>
            <!-- Card Body -->
            <!--<div class="card-body">
                <div class="chart-area">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="myAreaChart" width="669" height="320" class="chartjs-render-monitor" style="display: block; width: 669px; height: 320px;"></canvas>
                </div>
            </div>
        </div>
    </div>
<!-- /.container-fluid -->
