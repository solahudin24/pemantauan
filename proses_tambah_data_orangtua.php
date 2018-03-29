<body>
<?php
include "koneksi.php";
if(!empty($_POST['id_orangtua']))
{
	$nis=$_POST['id_orangtua'];
	$nama=$_POST['nama'];
	$no_telp=$_POST['no_telp'];
	$password=$_POST['password'];
	$nis=$_POST['nis'];
	
	$link=koneksi_db();
	$query="insert into tb_orangtua (id_orangtua,nama,no_telp,password,nis) values ('$id_orangtua','$nama','$no_telp',$password,'$nis');";
	$res=mysqli_query($link,$query);
		
	if($res)
	{ ?>
		<script language="javascript">
            alert('Berhasil Disimpan');
        	document.location.href="tampil_data_orangtua.php";
    </script>
    <?php
	}
	else
	{
		echo "<center><h1>Gagal Menambah Data</h1><br>";
		echo "Error : ".mysqli_error();
		echo "<br> Kembali <br> <a href='tampil_data_orangtua.php'>Link ini</a></center>";
	}
	$link->close();
}
?>
</body>