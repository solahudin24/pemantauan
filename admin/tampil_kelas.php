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
                    
                    <div class="col-md-4">
                    <ul class="nav">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                    </ul>
                        
                        </div>
                    <br>

                    <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_orangtua">
                        <thead>
                            <tr>
                                <th onclick="sortTable(0)">
                                    <center>No</center>
                                </th>
                                <th onclick="sortTable(1)">
                                    <center>Id Kelas</center>
                                </th>
                                <th onclick="sortTable(2)">
                                    <center>Kelas</center>
                                </th>
                                <th onclick="sortTable(3)">
                                    <center>Tingkatan</center>
                                </th>
                                <th onclick="sortTable(4)">
                                    <center>Jam Masuk</center>
                                </th>
                                <th onclick="sortTable(5)">
                                    <center>Jam Keluar</center>
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
                            $result = mysqli_query( $link, "SELECT * FROM tb_kelas" );
                            $total = mysqli_num_rows( $result );
                            $pages = ceil( $total / 10 );
                            $query = mysqli_query( $link, "select * from tb_kelas LIMIT $mulai, 10" )or die( mysqli_error( $link ) );
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
                                    

                                        <a href="proses_hapus_data_kelas.php?nuptk=<?php echo $data[ 'id_kelas' ]; ?>" class="btn btn-default btn-small" onClick="return confirm('Apakah anda yakin ingin menghapus data orangtua?');" id="custId" data-toggle="modal" data-id="<?php echo $data[ 'id_kelas' ]; ?>">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
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
                            $link->close();
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
                                    <a href="home_admin.php?tampil=kelas&halaman=<?php echo $i; ?>">
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
                <h4 class="modal-title">Input Data Kelas</h4>
            </div>
            <div class="modal-body">
                <form action="proses_tambah_data_kelas.php" method="POST" onSubmit="return confirm('Apakah anda yakin ingin menyimpan data?');">
                    <div class="form-group">
                        <label for="id_kelas">Id Kelas :</label>
                        <input type="text" class="form-control" name="id_kelas">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas :</label>
                        <input type="text" class="form-control" name="kelas">
                    </div>
                    <div class="form-group">
                        <label for="tingkatan">Tingkatan :</label>
                        <input type="text" class="form-control" name="tingkatan">
                    </div>
                    <div class="form-group">
                        <label for="jam_masuk">Jam Masuk :</label>
                        <input type="text" class="form-control" name="jam_masuk">
                    </div>
                    <div class="form-group">
                        <label for="jam_keluar">Jam Keluar :</label>
                        <input type="text" class="form-control" name="jam_keluar">
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


<!--
<div id="konfirmasi" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Konfirmasi</h4>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menyimpan data?
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary">Ya</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">batal</button>
            </div>
        </div>
    </div>
</div>
-->


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



<!--
<script>
    $( document ).ready( function () {
        $( '#tabel_guru' ).DataTable( {
            responsive: true
        } );
    } );
</script>
-->

<script type="text/javascript">
    $( document ).ready( function () {
        $( '#edit_data' ).on( 'show.bs.modal', function ( e ) {
            var id_kelas = $( e.relatedTarget ).data( 'id' ); //harus tetap id, jika tidak akan data tak akan terambil
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax( {
                type: 'post',
                url: 'ubah.php',
                data: 'id_kelas=' + id_kelas,
                success: function ( data ) {
                    $( '.hasil-data' ).html( data ); //menampilkan data ke dalam modal
                }
            } );
        } );
    } );
</script>