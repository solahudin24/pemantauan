<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Orangtua</h1>
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
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah">Tambah Data Orangtua</button><br><br>
                    </div>
                    <div class="col-md-4"></div>

                    <div class="col-md-4">
                        <ul class="nav">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <form method="post" action="?menu=orangtua&action=cari">
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

                    <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_orangtua">
                        <thead>
                            <tr>
                                <th>
                                    <center>No</center>
                                </th>
                                <th>
                                    <center>Id Orangtua</center>
                                </th>
                                <th>
                                    <center>Nama Orangtua</center>
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
                            $result = mysqli_query( $link, "SELECT * FROM tb_orangtua" );
                            $total = mysqli_num_rows( $result );
                            $pages = ceil( $total / 10 );
                            $query = mysqli_query( $link, "select * from tb_orangtua LIMIT $mulai, 10" )or die( mysqli_error( $link ) );
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
                                    <?php echo $data['id_orangtua']; ?>
                                </td>
                                <td>
                                    <?php echo $data['nama']; ?>
                                </td>
                                <td>
                                    <center>
                                        <img class="img-rounded" src="../images/orangtua/<?php echo $data['foto'];?>" width="75" height="75">
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <a href="#view_data" class="btn btn-default btn-small" data-toggle="modal" data-target="#<?php echo $data[ 'id_orangtua' ]; ?>">
                                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                        </a>
                                    


                                        <div class="modal fade" id="<?php echo $data[ 'id_orangtua' ]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Detail Data Orangtua</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table width="100%" class="table table-striped table-bordered table-hover">
                                                            <tr>
                                                                <td class="col-md-4">Id Orangtua</td>
                                                                <td class="col-md-8">
                                                                    <?php echo $data['id_orangtua']; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nama Orangtua</td>
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
                                                                <td>Nomor Telepon</td>
                                                                <td>
                                                                    <?php echo $data['no_telp']; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Foto</td>
                                                                <td>
                                                                    <img src="../images/siswa/<?php echo $data['foto']; ?>" class="img-rounded" width="100" height="100">
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

                                        <a href="#edit_data" class="btn btn-default btn-small" id="custId" data-toggle="modal" data-id="<?php echo $data[ 'id_orangtua' ]; ?>">
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
                                    <a href="home_admin.php?tampil=orangtua&halaman=<?php echo $i; ?>">
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
                <h4 class="modal-title">Input Data Orangtua</h4>
            </div>
            <div class="modal-body">
                <form action="proses_tambah_data_orangtua.php" method="POST" onSubmit="return confirm('Apakah anda yakin ingin menyimpan data?');" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="id_orangtua">Id Orangtua:</label>
                        <input type="text" class="form-control" name="id_orangtua" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Orangtua:</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat :</label>
                            <textarea class="form-control" rows="3" name="alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">Nomor Telepon:</label>
                        <input type="text" class="form-control" name="no_telp">
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
                <h4 class="modal-title">Ubah Data Orangtua</h4>
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
                data: 'id_orangtua=' + idx,
                success: function ( data ) {
                    $( '.hasil-data' ).html( data ); //menampilkan data ke dalam modal
                }
            } );
        } );
    } );
</script>