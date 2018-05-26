<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">
			<li>
			<center>
				<img src="../images/logo.png" width="120px" height="120px">
			</center>
			</li>
			<li class="active">
				<a class="active" href="home_kepsek.php"><i class="fa fa-dashboard fa-fw"></i> Statistik Siswa</a>
			</li>

			<li>
				<a href="kepsek_lokasi_siswa.php"><i class="fa fa-dashboard fa-fw"></i> Lokasi Siswa</a>
				<!-- /.nav-second-level -->
			</li>
			<li>
				<a href="#ubah_pw" id="custId" data-toggle="modal" data-id="<?php echo $_SESSION['s_nuptk'];?>"><i class="fa fa-edit fa-fw"></i> Ubah Password</a>
				<!-- /.nav-second-level -->
			</li>
			<li>
				<a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
			</li>

		</ul>
	</div>
	<!-- /.sidebar-collapse -->
</div>

