<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Data Guru</h1>
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
					</ul>
					<br>

					<table width="100%" class="table table-striped table-bordered table-hover" id="tabel_guru">
						<thead>
							<tr>
								<th onclick="sortTable(0)">
									<center>No</center>
								</th>
								<th onclick="sortTable(1)">
									<center>NUPTK</center>
								</th>
								<th onclick="sortTable(2)">
									<center>Nama Guru</center>
								</th>
								<th onclick="sortTable(3)">
									<center>Password</center>
								</th>
								<th colspan="2">
									<center>Action</center>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$link = koneksi_db();
							$query = 'SELECT * FROM tb_guru';
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
                                <td>" . $row[ 'nuptk' ] . "</td>
                                <td>" . $row[ 'nama' ] . "</td>
                                <td>" . $row[ 'password' ] . "</td>
                                <td>
								<center>
                                <a href='#edit_data' class='btn btn-default btn-small' id='custId' data-toggle='modal' data-id=" . $row[ 'nuptk' ] . "><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a>
                                
                                
                                <a href='proses_hapus_data_guru.php?nuptk=" . $row[ 'nuptk' ] . "' class='btn btn-default btn-small' onClick='return confirm('Apakah anda yakin ingin menghapus data guru?');' id='custId' data-toggle='modal' data-id=" . $row[ 'nuptk' ] . "><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></center>
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
				<h4 class="modal-title">Input Data Guru</h4>
			</div>
			<div class="modal-body">
				<form action="proses_tambah_data_guru.php" method="POST">
					<div class="form-group">
						<label for="nuptk">NUPTK:</label>
						<input type="text" class="form-control" name="nuptk">
					</div>
					<div class="form-group">
						<label for="nama">Nama Guru:</label>
						<input type="text" class="form-control" name="nama">
					</div>
					<div class="form-group">
						<label for="mengajar">Mengajar:</label>
						<input type="text" class="form-control" name="mengajar">
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
				<h4 class="modal-title">Ubah Data Guru</h4>
			</div>
			<div class="modal-body">
				<div class="hasil-data"></div>
			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

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