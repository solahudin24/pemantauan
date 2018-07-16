<?php
	session_start();
	require('../koneksi.php');
	$link = koneksi_db();
	
	
?>
<markers>
<?php
	$i = 0;
	$sql_siswa = "select * from tb_siswa where status<>'1' AND id_orangtua = '".$_SESSION['s_id_orangtua']."' AND lat IS NOT NULL";
	$res_siswa = mysqli_query($link,$sql_siswa);
	while($data_siswa = mysqli_fetch_array($res_siswa)){
		?>
	<marker nama="<?php echo $data_siswa['nama']; ?>" nis="icon<?php echo $data_siswa['nis']; ?>" lat="<?php echo $data_siswa['lat']; ?>" lng="<?php echo $data_siswa['longitude']; ?>" foto="<?php echo $data_siswa['foto']; ?>" jumlah="<?php echo $i; ?>"/>
	<?php
		$i++;
	}
	?>
  
<!--  <marker status="busy" lat="-6.9305492" lng="107.6544376"/>-->
<!--  <marker status="busy" lat="37.433480" lng="-122.155062"/>-->
<!--  <marker status="busy" lat="37.431480" lng="-122.145162"/>-->
<!--  <marker status="busy" lat="37.429480" lng="-122.185162"/>-->
<!--  <marker status="busy" lat="37.427480" lng="-122.165162"/>-->
<!--  <marker status="busy" lat="37.425480" lng="-122.125162"/>-->
<!--  <marker status="busy" lat="37.445427" lng="-122.162307"/>-->
</markers>
