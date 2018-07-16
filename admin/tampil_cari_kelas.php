<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Kelas</h1>
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
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah">Tambah Data Kelas</button><br><br>
                    </div>
                    <div class="col-md-4"></div>

                    <div class="col-md-4">
                        <ul class="nav">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <form method="post" action="?menu=kelas&action=cari">
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
                    <h4> Hasil Pencarian : <?php echo $_POST['txtxcari']; ?></h4>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_orangtua">
                        <thead>
                            <tr>
                                <th>
                                    <center>No</center>
                                </th>
                                <th>
                                    <center>Id Kelas</center>
                                </th>
                                <th>
                                    <center>Kelas</center>
                                </th>
                                <th>
                                    <center>Tingkatan</center>
                                </th>
                                <th>
                                    <center>Jam Masuk</center>
                                </th>
                                <th>
                                    <center>Jam Keluar</center>
                                </th>
                                <th>
                                    <center>Action</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cari =  $_POST['txtxcari'];
                            $page = isset( $_GET[ 'halaman' ] ) ? ( int )$_GET[ 'halaman' ] : 1;
                            $mulai = ( $page > 1 ) ? ( $page * 10 ) - 10 : 0;
                            $result = mysqli_query( $link, "SELECT * FROM tb_kelas where kelas LIKE '%$cari%'" );
                            $total = mysqli_num_rows( $result );
                            $pages = ceil( $total / 10 );
                            $query = mysqli_query( $link, "select * from tb_kelas where kelas LIKE '%$cari%' LIMIT $mulai, 10" )or die( mysqli_error( $link ) );
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
                                    <?php echo $data['id_kelas']; ?>
                                </td>
                                <td>
                                    <?php echo $data['kelas']; ?>
                                </td>
                                <td>
                                    <?php echo $data['tingkatan']; ?>
                                </td>
                                <td>
                                    <?php echo $data['jam_masuk']; ?>
                                </td>
                                <td>
                                    <?php echo $data['jam_keluar']; ?>
                                </td>
                                <td>
                                    <center>
                                        <a href="#edit_data" class="btn btn-default btn-small" id="custId" data-toggle="modal" data-id="<?php echo $data[ 'id_kelas' ]; ?>">
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
                                <?php 
                                $isi = 1;
                                if(isset($_GET['halaman'])){
                                    $isi = $_GET['halaman'];
                                }
                                for ($i=1; $i<=$pages ; $i++){ ?>
                                <li <?php if($isi==$i) { echo "class='active'"; } ?>
                                    >
                                    <a href="home_admin.php?tampil=kelas&halaman=<?php echo $i; ?>">
                                        <?php echo $i; ?>
                                    </a>
                                </li>
                                <?php } ?>
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
                <h4 class="modal-title">Input Data Kelas</h4>
            </div>
            <div class="modal-body">
                <form action="proses_tambah_data_kelas.php" method="POST" onSubmit="return confirm('Apakah anda yakin ingin menyimpan data?');" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="kelas">Kelas:</label>
                        <input type="text" class="form-control" name="kelas" required>
                    </div>
                    <div class="form-group">
                        <label for="tingkatan">Tingkatan:</label>
                        <select class="form-control" name="tingkatan">
                            <option value="SDLB">SDLB</option>
                            <option value="SMPLB">SMPLB</option>
                            <option value="SMALB">SMALB</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jam_masuk">Jam Masuk:</label>
                        <input type="text" class="form-control" name="jam_masuk" required>
                    </div>
                     <div class="form-group">
                        <label for="jam_keluar">Jam Keluar:</label>
                        <input type="text" class="form-control" name="jam_keluar" required>
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
                <h4 class="modal-title">Ubah Data Kelas</h4>
            </div>
            <div class="modal-body">
                <div class="hasil-data"></div>
            </div>

        </div>
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
                data: 'id_kelas=' + idx,
                success: function ( data ) {
                    $( '.hasil-data' ).html( data ); //menampilkan data ke dalam modal
                }
            } );
        } );
    } );
</script>