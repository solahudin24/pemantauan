<?php 
include 'koneksi.php';
$link = koneksi_db();
?>
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
				<center>Password</center>
			</th>
			<th colspan="2">
				<center>Action</center>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$query = 'SELECT * FROM tb_guru';
		$res = mysqli_query( $link, $query );
		$no = 0;
		while ( $row = mysqli_fetch_assoc( $res ) ) {
			$no++;
			echo "<tr class='gradeC'>
                                <td>" . $no . "</td>
                                <td>" . $row[ 'nuptk' ] . "</td>
                                <td>" . $row[ 'nama' ] . "</td>
                                <td>" . $row[ 'password' ] . "</td>
                                <td>
                                <a href='#edit_data' id='custId' data-toggle='modal' data-id=" . $row[ 'nuptk' ] . "><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></td>
                                </td>
                                <td>
                                <a href='#hapus_data' id='custId' data-toggle='modal' data-id=" . $row[ 'nuptk' ] . "><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td>
                                </td>
                                </tr>";

		}
		$link->close();
		?>
	</tbody>
</table>