<body>
<?php
include "koneksi.php";
if(!empty($_POST['nuptk']))
{
	$nuptk=$_POST['nuptk'];
	$nama=$_POST['nama'];
	$mengajar=$_POST['mengajar'];
	$password=$_POST['password'];
	
	$link=koneksi_db();
	$query="insert into tb_guru (nuptk,nama,mengajar,password) values ('$nuptk','$nama','$mengajar',$password);";
	$res=mysqli_query($link,$query);
		
	if($res)
	{ ?>
		<script language="javascript">
            alert('Berhasil Disimpan');
        	document.location.href="tampil_data_guru.php";
    </script>
    <?php
	}
	else
	{
		echo "<center><h1>Gagal Menambah Data</h1><br>";
		echo "Error : ".mysqli_error();
		echo "<br> Kembali <br> <a href='tampil_data_guru.php'>Link ini</a></center>";
	}
	$link->close();
}
?>
</body>