<body>
<?php
include "koneksi.php";
if(!empty($_POST['nis']))
{
	$nis=$_POST['nis'];
	$nama=$_POST['nama'];
	$alamat=$_POST['alamat'];
	$no_telp=$_POST['no_telp'];
	$password=$_POST['password'];
	
	$link=koneksi_db();
	$query="insert into tb_siswa (nis,nama,alamat,no_telp,password) values ('$nis','$nama','$alamat','$no_telp',$password);";
	$res=mysqli_query($link,$query);
		
	if($res)
	{ ?>
		<script language="javascript">
            alert('Berhasil Disimpan');
        	document.location.href="tampil_data_siswa.php";
    </script>
    <?php
	}
	else
	{
		echo "<center><h1>Gagal Menambah Data</h1><br>";
		echo "Error : ".mysqli_error();
		echo "<br> Kembali <br> <a href='tampil_data_siswa.php'>Link ini</a></center>";
	}
	$link->close();
}
?>
</body>