<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Siswa</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php
    if ( isset( $_SESSION[ 's_pesan' ] ) ) {
        ?>
    <div class="alert alert-warning alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    
    <?php 
            echo $_SESSION['s_pesan'];
            unset($_SESSION['s_pesan']);
        ?>
    </div>
    <?php
    }
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah">Tambah Data Siswa</button><br><br>
                    </div>
                    <div class="col-md-4"></div>

                    <div class="col-md-4">
                        <ul class="nav">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <form method="post" action="?menu=siswa&action=cari">
                                    <input type="text" class="form-control" placeholder="Search..." name="txtxcari">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                    </form>
                                
                                </div>
                                <!-- /input-group -->
                            </li>
                        </ul>

                    </div>
                    <br>

                    <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_guru">
                        <thead>
                            <tr>
                                <th>
                                    <center>No</center>
                                </th>
                                <th>
                                    <center>NIS</center>
                                </th>
                                <th>
                                    <center>Nama Siswa</center>
                                </th>
                                <th>
                                    <center>Foto</center>
                                </th>
                                <th colspan="2">
                                    <center>Action</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $page = isset( $_GET[ 'halaman' ] ) ? ( int )$_GET[ 'halaman' ] : 1;
                            $mulai = ( $page > 1 ) ? ( $page * 10 ) - 10 : 0;
                            $result = mysqli_query( $link, "SELECT * FROM tb_siswa" );
                            $total = mysqli_num_rows( $result );
                            $pages = ceil( $total / 10 );
                            $query = mysqli_query( $link, "select * from tb_siswa LIMIT $mulai, 10" )or die( mysqli_error( $link ) );
                            $no = $mulai + 1;
                            $ketemu = mysqli_num_rows( $query );
                            if ( $ketemu > 0 ) {
                                while ( $data = mysqli_fetch_assoc( $query ) ) {
                                    ?>
                            <tr>
                                <td>
                                    <?php echo $no++; ?>
                                </td>
                                <td>
                                    <?php echo $data['nis']; ?>
                                </td>
                                <td>
                                    <?php echo $data['nama']; ?>
                                </td>
                                <td>
                                    <center>
                                        <img class="img-rounded" src="../images/siswa/<?php echo $data['foto'];?>" width="75" height="75">
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <a href="#view_data" class="btn btn-default btn-small" data-toggle="modal" data-target="#<?php echo $data[ 'nis' ]; ?>">
                                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                        </a>
                                    


                                        <div class="modal fade" id="<?php echo $data[ 'nis' ]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Detail Data Siswa</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table width="100%" class="table table-striped table-bordered table-hover">
                                                            <tr>
                                                                <td class="col-md-4">NIS</td>
                                                                <td class="col-md-8">
                                                                    <?php echo $data['nis']; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nama Siswa</td>
                                                                <td>
                                                                    <?php echo $data['nama']; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Alamat</td>
                                                                <td>
                                                                    <?php echo $data['alamat']; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tempat Lahir</td>
                                                                <td>
                                                                    <?php echo $data['tempat_lahir']; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tanggal Lahir</td>
                                                                <td>
                                                                    <?php echo $data['tgl_lahir']; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Kelas</td>
                                                                <td>
                                                                    <?php 
                                                                        $sql_kelas = "select * from tb_kelas where id_kelas='".$data['id_kelas']."'";
                                                                        $res_kelas = mysqli_query($link,$sql_kelas);
                                                                        $data_kelas = mysqli_fetch_array($res_kelas);
                                                                        echo $data_kelas['kelas']." ".$data_kelas['tingkatan']; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Orangtua</td>
                                                                <td>
                                                                    <?php 
                                                                        $sql_orangtua = "select * from tb_orangtua where id_orangtua='".$data['id_orangtua']."'";
                                                                        $res_orangtua = mysqli_query($link,$sql_orangtua);
                                                                        $data_orangtua = mysqli_fetch_array($res_orangtua);
                                                                        echo $data_orangtua['nama']; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Guru</td>
                                                                <td>
                                                                    <?php 
                                                                        $sql_guru = "select * from tb_guru where nuptk='".$data['nuptk']."'";
                                                                        $res_guru = mysqli_query($link,$sql_guru);
                                                                        $data_guru = mysqli_fetch_array($res_guru);
                                                                        echo $data_guru['nama']; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Foto</td>
                                                                <td>
                                                                    <img src="../images/siswa/<?php echo $data['foto']; ?>" class="img-rounded" width="100" height="100">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Lokasi</td>
                                                                <td>
                                                                    <?php
                                                                        echo $data['lat'].",".$data['longitude'];
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Baterai</td>
                                                                <td>
                                                                    <?php
                                                                        echo $data['baterai']."%";
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Update Terakhir</td>
                                                                <td>
                                                                    <?php
                                                                        echo $data['update_time'];
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Status</td>
                                                                <td>
                                                                    <?php 
                                                                        if ($data['status']==0) {
                                                                                echo "Aktif";
                                                                            }else {
                                                                                echo "Tidak Aktif";
                                                                            }   
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="#edit_data" class="btn btn-default btn-small" id="custId" data-toggle="modal" data-id="<?php echo $data[ 'nis' ]; ?>">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        </a>                        

                                    </center>
                                </td>
                            </tr>
                            <?php
                            }
                            } else {
                                ?>
                            <tr>
                                <td colspan="5">
                                    <center>Tidak ada data dalam tabel</center>
                                </td>
                            </tr>

                            <?php
                            }
                            //                          $link->close();
                            ?>
                        </tbody>
                    </table>
                    <?php
                    if ( $pages > 0 ) {


                        ?>
                    <center>
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <!--
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                
                                </li>
-->
                                <?php 
                                $isi = 1;
                                if(isset($_GET['halaman'])){
                                    $isi = $_GET['halaman'];
                                }
                                for ($i=1; $i<=$pages ; $i++){ ?>
                                <li <?php if($isi==$i) { echo "class='active'"; } ?>
                                    >
                                    <a href="home_admin.php?tampil=siswa&halaman=<?php echo $i; ?>">
                                        <?php echo $i; ?>
                                    </a>
                                </li>
                                <?php } ?>
                                <!--
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                
                                </li>
-->
                            </ul>
                        </nav>
                    </center>
                    <?php
                    }
                    ?>




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
                <h4 class="modal-title">Input Data Siswa</h4>
            </div>
            <div class="modal-body">
                <form action="proses_tambah_data_siswa.php" method="POST" onSubmit="return confirm('Apakah anda yakin ingin menyimpan data?');" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nis">NIS:</label>
                        <input type="text" class="form-control" name="nis" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Siswa:</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir:</label>
                        <input type="text" class="form-control" name="tempat_lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir:</label>
                        <input type="date" class="form-control" name="tgl_lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="id_kelas">Kelas:</label>
                        <select name="id_kelas" class="form-control">
                            <?php
                            //                              $link = koneksi_db();
                            $sql = "SELECT * FROM tb_kelas";
                            $res = mysqli_query( $link, $sql );
                            while ( $data_kelas = mysqli_fetch_array( $res ) ) {
                                ?>
                            <option value="<?php echo $data_kelas['id_kelas']; ?>">
                                <?php echo $data_kelas['kelas']." ".$data_kelas['tingkatan']; ?>
                            </option>
                            <?php
                            }
                            //                              $link -> close();
                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_orangtua">Orangtua:</label>
                        <select name="id_orangtua" class="form-control">
                            <?php
                            //                              $link = koneksi_db();
                            $sql = "SELECT * FROM tb_orangtua where Status='0'";
                            $res = mysqli_query( $link, $sql );
                            while ( $data_orangtua = mysqli_fetch_array( $res ) ) {
                                ?>
                            <option value="<?php echo $data_orangtua['id_orangtua']; ?>">
                                <?php echo $data_orangtua['nama']; ?>
                            </option>
                            <?php
                            }
                            //                              $link -> close();
                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nuptk">Guru:</label>
                        <select name="nuptk" class="form-control">
                            <?php
                            //                              $link = koneksi_db();
                            $sql = "SELECT * FROM tb_guru where Status='0'";
                            $res = mysqli_query( $link, $sql );
                            while ( $data_guru = mysqli_fetch_array( $res ) ) {
                                ?>
                            <option value="<?php echo $data_guru['nuptk']; ?>">
                                <?php echo $data_guru['nama']; ?>
                            </option>
                            <?php
                            }
                            //                              $link -> close();
                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat :</label>
                            <textarea class="form-control" rows="3" name="alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto:</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-primary">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- modal ubah -->
<div class="modal fade" id="edit_data" tabindex="-1" role="dialog" aria-labelledby="ubah" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ubah Data Siswa</h4>
            </div>
            <div class="modal-body">
                <div class="hasil-data"></div>
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


<script type="text/javascript">
    $( document ).ready( function () {
        $( '#edit_data' ).on( 'show.bs.modal', function ( e ) {
            var idx = $( e.relatedTarget ).data( 'id' ); //harus tetap id, jika tidak akan data tak akan terambil
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax( {
                type: 'post',
                url: 'ubah.php',
                data: 'nis=' + idx,
                success: function ( data ) {
                    $( '.hasil-data' ).html( data ); //menampilkan data ke dalam modal
                }
            } );
        } );
    } );
</script>