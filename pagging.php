<?php
include 'koneksi.php';
$link = koneksi_db();
?>
 
<table border="1">
  <tr>
    <th>No</th>
    <th>Nama</th>                         
  </tr>
  <?php 
  $halaman = 10;
  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
  $result = mysqli_query($link,"SELECT * FROM tb_produk");
  $total = mysqli_num_rows($result);
  $pages = ceil($total/$halaman);            
  $query = mysqli_query($link , "select * from tb_produk LIMIT $mulai, $halaman")or die(mysqli_error($link));
  $no =$mulai+1;
 
 
  while ($data = mysqli_fetch_assoc($query)) {
    ?>
    <tr>
      <td><?php echo $no++; ?></td>                  
      <td><?php echo $data['id_produk']; ?></td>              
                  
    </tr>
 
    <?php               
  } 
  ?>
  
 
</table>          
 
<div class="">
  <?php for ($i=1; $i<=$pages ; $i++){ ?>
  <a href="pagging.php?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
 
  <?php } ?>
 
</div>