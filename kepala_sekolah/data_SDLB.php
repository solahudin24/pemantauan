<?php include "../koneksi.php";

$link = koneksi_db();?>

<h1> Data Siswa SDLB</h1>

<table border=1>
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
                            </tr>
                            <?php
                            $query = mysqli_query( $link, "SELECT nis, nama FROM tb_siswa WHERE nis NOT IN (select DISTINCT tb_laporan.nis FROM tb_siswa JOIN tb_laporan ON tb_siswa.nis=tb_laporan.nis JOIN tb_kelas ON tb_kelas.id_kelas=tb_siswa.id_kelas where status=0 AND tb_kelas.tingkatan='SDLB')" )or die( mysqli_error( $link ) );
                            $no = 1;
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
                    </table>

<h1> Data Siswa SDLB yang pernah kabur</h1>

<table border=1>
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
                                    <center>Waktu Kabur</center>
                                </th>
                            </tr>
                            <?php
                            $query = mysqli_query( $link, "SELECT tb_siswa.nis,tb_siswa.nama,tb_laporan.waktu_kabur FROM tb_siswa JOIN tb_laporan ON tb_siswa.nis=tb_laporan.nis JOIN tb_kelas ON tb_kelas.id_kelas=tb_siswa.id_kelas where status=0 AND tb_kelas.tingkatan='SDLB'" )or die( mysqli_error( $link ) );
                            $no = 1;
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
                                    <?php echo $data['waktu_kabur']; ?>
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
                    </table>