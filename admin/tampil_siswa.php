<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Data Siswa</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<!-- /.panel-heading -->
				<div class="panel-body">
					<ul class="nav">
						<li class="sidebar-search">
							<div class="input-group custom-search-form">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
							
							</div>
							<!-- /input-group -->
						</li>
					</ul><br>

					<table width="100%" class="table table-striped table-bordered table-hover" id="tabel_siswa">
						<thead>
							<tr>
								<th >No</th>
								<th >NIS</th>
								<th >Nama Siswa</th>
								<th >Alamat</th>
								<th >Password</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$link = koneksi_db();
							$query = 'SELECT * FROM tb_siswa';
							$res = mysqli_query( $link, $query );
							$no = 0;
							$ketemu = mysqli_num_rows( $res );
							if ( $ketemu == 0 ) {
								?>
							<td colspan="5">
								<center><strong> Tidak ada data dalam tabel</strong>
								</center>
							</td>
							<?php
							} else {
								while ( $row = mysqli_fetch_assoc( $res ) ) {
									$no++;
									echo "<tr class='gradeC'>
                                <td>" . $no . "</td>
                                <td>" . $row[ 'nis' ] . "</td>
                                <td>" . $row[ 'nama' ] . "</td>
                                <td>" . $row[ 'alamat' ] . "</td>
                                <td>" . $row[ 'password' ] . "</td>
                                <td><center>
                                <a href='#edit_data' class='btn btn-default btn-small' id='custId' data-toggle='modal' data-id=" . $row[ 'nis' ] . "><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a>
                                
                                <a href='#hapus_data' class='btn btn-default btn-small' id='custId' data-toggle='modal' data-id=" . $row[ 'nis' ] . "><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></center>
                                </td>
                                </tr>";
								}
							}
							$link->close();
							?>
						</tbody>
					</table>
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah">Tambah</button>

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
				<h4 class="modal-title">Input Data Siswa</h4>
			</div>
			<div class="modal-body">
				<form action="proses_tambah_data_siswa.php" method="POST">
					<div class="form-group">
						<label for="nis">NIS:</label>
						<input type="text" class="form-control" name="nis">
					</div>
					<div class="form-group">
						<label for="nama">Nama Siswa:</label>
						<input type="text" class="form-control" name="nama">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat:</label>
						<input type="text" class="form-control" name="alamat">
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="text" class="form-control" name="password">
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#konfirmasi">Simpan</button>
				<button type="reset" class="btn btn-primary">Reset</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal Konfirmasi -->
<div class="modal fade" id="konfirmasi" role="dialog">
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
		</form>
	</div>
</div>

<!-- modal ubah -->
<div class="modal fade" id="edit_data" tabindex="-1" role="dialog" aria-labelledby="ubah" aria-hidden="true">
	<div class="modal-dialog" role="document">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Ubah Data Siswa</h4>
			</div>
			<div class="modal-body">
				<div class="fetched-data"></div>
			</div>
			<div class="modal-footer">
				
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
		</form>
	</div>
</div>

<script type="text/javascript">
	$( document ).ready( function () {
		$( '#edit_data' ).on( 'show.bs.modal', function ( e ) {
			var rowid = $( e.relatedTarget ).data( 'id' );
			//menggunakan fungsi ajax untuk pengambilan data
			$.ajax( {
				type: 'post',
				url: 'ubah.php',
				data: 'rowid=' + rowid,
				success: function ( data ) {
					$( '.fetched-data' ).html( data ); //menampilkan data ke dalam modal
				}
			} );
		} );
	} );
</script>