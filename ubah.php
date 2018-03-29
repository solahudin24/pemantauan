<?php
    include "koneksi.php";
    $link=koneksi_db();

    if($_POST['rowid']) {
        $nuptk = $_POST['rowid'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $query = "SELECT * FROM tb_guru WHERE nuptk = $nuptk";
        $res=mysqli_query($link,$query);
        if($res) { ?>

        <!-- MEMBUAT FORM -->
        <form action="update.php" method="post">
            <input type="hidden" name="nuptk" value="<?php echo $baris['nuptk']; ?>">
            <div class="form-group">
                <label>NUPTK</label>
                <input type="text" class="form-control" name="nuptk" value="<?php echo $baris['nuptk']; ?>">
            </div>
              <button class="btn btn-primary" type="submit">Update</button>
        </form>

        <?php } }
    $link->close();
?>