<?xml version="1.0" encoding="UTF-8"?>
<?php
	session_start();
	require('../koneksi.php');
	$link = koneksi_db();
	
	
?>
<markers>
<?php
	$sql_siswa = "select * from tb_siswa where status='0' and id_kelas = '".$_SESSION['s_id_kelas']."'";
	$res_siswa = mysqli_query($link,$sql_siswa);
	while($data_siswa = mysqli_fetch_array($res_siswa)){
		?>
	<marker status="<?php echo $data_siswa['nama']; ?>" nis="<?php echo $data_siswa['nis']; ?>" lat="<?php echo $data_siswa['lat']; ?>" lng="<?php echo $data_siswa['longitude']; ?>"/>
	<?php
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
