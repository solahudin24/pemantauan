<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Data Guru</h1>
		</div>
	</div>
	<?php
	if ( isset( $_SESSION[ 's_pesan' ] ) ) {
		?>
	<div class="alert alert-warning alert-dismissible fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
	
	<?php 
			echo $_SESSION['s_pesan'];
			unset($_SESSION['s_pesan']);
		?>
	</div>
	<?php
	}
	?>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="col-md-4">
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah">Tambah Data Guru</button><br><br>
					</div>
					<div class="col-md-4"></div>

					<div class="col-md-3">
						<ul class="nav">
							<li class="sidebar-search">
								<div class="input-group custom-search-form">
								<form method="post" action="?menu=guru&action=cari">
									<input type="text" class="form-control" placeholder="Search..." name="txtxcari">
								</div>
								<!-- /input-group -->
							</li>
						</ul>

					</div>
					<div class="col-md-1">
						<button class="btn btn-default" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    
								</form>
					</div>
					<br>

					<table width="100%" class="table table-striped table-bordered table-hover" id="tabel_guru">
						<thead>
							<tr>
								<th>
									<center>No</center>
								</th>
								<th>
									<center>NUPTK</center>
								</th>
								<th>
									<center>Nama Guru</center>
								</th>
								<th>
									<center>Jabatan</center>
								</th>
								<th>
									<center>Foto</center>
								</th>
								<th colspan="2">
									<center>Action</center>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php

							$page = isset( $_GET[ 'halaman' ] ) ? ( int )$_GET[ 'halaman' ] : 1;
							$mulai = ( $page > 1 ) ? ( $page * 10 ) - 10 : 0;
							$result = mysqli_query( $link, "SELECT * FROM tb_guru" );
							$total = mysqli_num_rows( $result );
							$pages = ceil( $total / 10 );
							$query = mysqli_query( $link, "select * from tb_guru LIMIT $mulai, 10" )or die( mysqli_error( $link ) );
							$no = $mulai + 1;
							$ketemu = mysqli_num_rows( $query );
							if ( $ketemu > 0 ) {



								while ( $data = mysqli_fetch_assoc( $query ) ) {
									?>
							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['nuptk']; ?>
								</td>
								<td>
									<?php echo $data['nama']; ?>
								</td>
								<td>
									<?php  
									$sql_jabatan = "select * from tb_jabatan where kode_jabatan='".$data['kode_jabatan']."'";
									$res_jabatan = mysqli_query($link,$sql_jabatan);
									$data_jabatan = mysqli_fetch_array($res_jabatan);
									echo $data_jabatan['nama_jabatan']; ?>
								</td>
								<td>
									<center>
										<img class="img-rounded" src="../images/guru/<?php echo $data['foto'];?>" width="75" height="75">
									</center>
								</td>
								<td>
									<center>
										<a href="#view_data" class="btn btn-default btn-small" data-toggle="modal" data-target="#<?php echo $data[ 'nuptk' ]; ?>">
											<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
										</a>
									


										<div class="modal fade" id="<?php echo $data[ 'nuptk' ]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title" id="myModalLabel">Detail Data Guru</h4>
													</div>
													<div class="modal-body">
														<table width="100%" class="table table-striped table-bordered table-hover">
															<tr>
																<td class="col-md-4">NUPTK</td>
																<td class="col-md-8">
																	<?php echo $data['nuptk']; ?>
																</td>
															</tr>
															<tr>
																<td>NIP</td>
																<td>
																	<?php echo $data['nip']; ?>
																</td>
															</tr>
															<tr>
																<td>Nama Guru</td>
																<td>
																	<?php echo $data['nama']; ?>
																</td>
															</tr>
															<tr>
																<td>Tempat Lahir</td>
																<td>
																	<?php echo $data['tempat_lahir']; ?>
																</td>
															</tr>
															<tr>
																<td>Tanggal Lahir</td>
																<td>
																	<?php echo $data['tgl_lahir']; ?>
																</td>
															</tr>
															<tr>
																<td>Kelas</td>
																<td>
																	<?php 
																		$sql_kelas = "select * from tb_kelas where id_kelas='".$data['id_kelas']."'";
																		$res_kelas = mysqli_query($link,$sql_kelas);
																		$data_kelas = mysqli_fetch_array($res_kelas);
																		echo $data_kelas['kelas']." ".$data_kelas['tingkatan']; ?>
																</td>
															</tr>
															<tr>
																<td>Jabatan</td>
																<td>
																	<?php 
																		$sql_jabatan = "select * from tb_jabatan where kode_jabatan='".$data['kode_jabatan']."'";
																		$res_jabatan = mysqli_query($link,$sql_jabatan);
																		$data_jabatan = mysqli_fetch_array($res_jabatan);
																		echo $data_jabatan['nama_jabatan']; ?>
																</td>
															</tr>
															<tr>
																<td>Foto</td>
																<td>
																	<img src="../images/guru/<?php echo $data['foto']; ?>" class="img-rounded" width="100" height="100">
																</td>
															</tr>
															<tr>
																<td>Status</td>
																<td>
																	<?php 
																		if ($data['status']==0) {
																				echo "Aktif";
																			}else {
																				echo "Tidak Aktif";
																			}	
																	?>
																</td>
															</tr>
														</table>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>

										<a href="#edit_data" class="btn btn-default btn-small" id="custId" data-toggle="modal" data-id="<?php echo $data[ 'nuptk' ]; ?>">
											<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
										</a>						

									</center>
								</td>
							</tr>
							<?php
							}
							} else {
								?>
							<tr>
								<td colspan="5">
									<center>Tidak ada data dalam tabel</center>
								</td>
							</tr>

							<?php
							}
							//							$link->close();
							?>
						</tbody>
					</table>
					<?php
					if ( $pages > 0 ) {


						?>
					<center>
						<nav aria-label="Page navigation">
							<ul class="pagination">
								<!--
								<li>
									<a href="#" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
								
								</li>
-->
								<?php 
								$isi = 1;
								if(isset($_GET['halaman'])){
									$isi = $_GET['halaman'];
								}
								for ($i=1; $i<=$pages ; $i++){ ?>
								<li <?php if($isi==$i) { echo "class='active'"; } ?>
									>
									<a href="home_admin.php?tampil=guru&halaman=<?php echo $i; ?>">
										<?php echo $i; ?>
									</a>
								</li>
								<?php } ?>
								<!--
								<li>
									<a href="#" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									</a>
								
								</li>
-->
							</ul>
						</nav>
					</center>
					<?php
					}
					?>




				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<div class="modal fade" id="tambah" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Input Data Guru</h4>
			</div>
			<div class="modal-body">
				<form action="proses_tambah_data_guru.php" method="POST" onSubmit="return confirm('Apakah anda yakin ingin menyimpan data?');" enctype="multipart/form-data">
					<div class="form-group">
						<label for="nuptk">NUPTK:</label>
						<input type="text" class="form-control" name="nuptk" required>
					</div>
					<div class="form-group">
						<label for="nip">NIP:</label>
						<input type="text" class="form-control" name="nip">
					</div>
					<div class="form-group">
						<label for="nama">Nama Guru:</label>
						<input type="text" class="form-control" name="nama" required>
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="text" class="form-control" name="password" required>
					</div>
					<div class="form-group">
						<label for="tempat_lahir">Tempat Lahir:</label>
						<input type="text" class="form-control" name="tempat_lahir" required>
					</div>
					<div class="form-group">
						<label for="tgl_lahir">Tanggal Lahir:</label>
						<input type="date" class="form-control" name="tgl_lahir" required>
					</div>
					<div class="form-group">
						<label for="id_kelas">Kelas:</label>
						<select name="id_kelas" class="form-control">
							<?php
							//								$link = koneksi_db();
							$sql = "SELECT * FROM tb_kelas";
							$res = mysqli_query( $link, $sql );
							while ( $data_kelas = mysqli_fetch_array( $res ) ) {
								?>
							<option value="<?php echo $data_kelas['id_kelas']; ?>">
								<?php echo $data_kelas['kelas']." ".$data_kelas['tingkatan']; ?>
							</option>
							<?php
							}
							//								$link -> close();
							?>

						</select>
					</div>
					<div class="form-group">
						<label for="id_jabatan">Jabatan:</label>
						<select name="id_jabatan" class="form-control">
							<?php
							//								$link = koneksi_db();
							$sql = "SELECT * FROM tb_jabatan";
							$res = mysqli_query( $link, $sql );
							while ( $data_jabatan = mysqli_fetch_array( $res ) ) {
								?>
							<option value="<?php echo $data_jabatan['kode_jabatan']; ?>">
								<?php echo $data_jabatan['nama_jabatan']; ?>
							</option>
							<?php
							}
							//								$link -> close();
							?>

						</select>
					</div>
					<div class="form-group">
						<label for="foto">Foto:</label>
						<input type="file" class="form-control" name="foto">
					</div>
			</div>
			<div class="modal-footer">
				<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
				<button type="reset" class="btn btn-primary">Reset</button>
				</form>
			</div>
		</div>
	</div>
</div>




<!-- modal ubah -->
<div class="modal fade" id="edit_data" tabindex="-1" role="dialog" aria-labelledby="ubah" aria-hidden="true">
	<div class="modal-dialog" role="document">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Ubah Data Guru</h4>
			</div>
			<div class="modal-body">
				<div class="hasil-data"></div>
			</div>

		</div>
	</div>
</div>

<!-- Modal Konfirmasi -->
<div class="modal fade" id="konfirmasi2" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Konfirmasi</h4>
			</div>
			<div class="modal-body">
				Apakah anda yakin ingin menyimpan data?
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Ya</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">batal</button>
			</div>
		</div>
		<!--                </form>      -->
	</div>
</div>



<!--
<script>
	$( document ).ready( function () {
		$( '#tabel_guru' ).DataTable( {
			responsive: true
		} );
	} );
</script>
-->

<script type="text/javascript">
	$( document ).ready( function () {
		$( '#edit_data' ).on( 'show.bs.modal', function ( e ) {
			var idx = $( e.relatedTarget ).data( 'id' ); //harus tetap id, jika tidak akan data tak akan terambil
			//menggunakan fungsi ajax untuk pengambilan data
			$.ajax( {
				type: 'post',
				url: 'ubah.php',
				data: 'idx=' + idx,
				success: function ( data ) {
					$( '.hasil-data' ).html( data ); //menampilkan data ke dalam modal
				}
			} );
		} );
	} );
</script>