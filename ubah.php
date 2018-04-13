<?php
    include "koneksi.php";
    if($_POST['idx']) {
        $nuptk = $_POST['idx']; 
        $link=koneksi_db();
        $query="SELECT * FROM tb_guru WHERE nuptk = $nuptk";
        $res=mysqli_query($link,$query);
        while($row=mysqli_fetch_assoc($res)) {
?>          
            <form action="proses_edit_data_guru.php" method="POST">
                    <div class="form-group">
                        <label for="nuptk">NUPTK:</label>
                        <input type="text" class="form-control" name="nuptk" value="<?php echo $row['nuptk']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Guru:</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="mengajar">Mengajar:</label>
                        <input type="text" class="form-control" name="mengajar" value="<?php echo $row['mengajar']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>">
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#konfirmasi2">Simpan</button>
                    <button type="reset" class="btn btn-primary">Reset</button>

                    
            
        <?php } }
?>