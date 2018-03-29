<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator SLB C Sukapura Kota Bandung</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home_admin.php">Administrator</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="home_admin.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Data <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="tampil_guru.php">Data Guru</a>
                                </li>
                                <li>
                                    <a href="tampil_siswa.php">Data Siswa</a>
                                </li>
                                <li>
                                    <a href="tampil_orangtua.php">Data Orangtua</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Guru</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
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
                            <table width="100%" class="table table-striped table-bordered table-hover" id="table_guru">
                            <thead>
                              <tr>
                                <th onclick="sortTable(0)">No</th>
                                <th onclick='sortTable(1)'>NUPTK</th>
                                <th onclick='sortTable(2)'>Nama Guru</th>
                                <th  onclick='sortTable(3)'>Mengajar</th>
                                <th onclick='sortTable(4)'>Password</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $link=koneksi_db();
                            $query='SELECT * FROM tb_guru';
                            $res=mysqli_query($link,$query);
                            $no=0;
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $no++;
                                echo"<tr class='gradeC'>
                                <td>".$no."</td>
                                <td>".$row['nuptk']."</td>
                                <td>".$row['nama']."</td>
                                <td>".$row['mengajar']."</td>
                                <td>".$row['password']."</td>
                                <td>
                                <a href='#ubah' class='btn btn-default btn-small' id='custId' data-toggle='modal' data-id=".$row['nuptk']."><img src='images/icons/ubah.gif'></a></td>
                                </td>
                                <td><a id='edit_data' data-toggle='modal' data-target='#ubah' href='ubah.php?id=".$row['nuptk']."'><img src='images/icons/hapus.gif'></a>
                                </td>
                                </tr>";

                            } $link->close();
	                        ?>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah">Tambah</button>

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
		        <h4 class="modal-title">Input Data Guru</h4>
		      </div>
		    	<div class="modal-body">
		        	<form action="proses_tambah_data_guru.php" method="POST">
		          	<div class="form-group">
		            	<label for="nuptk">NUPTK:</label>
		            	<input type="text" class="form-control" name="nuptk">
		        	</div>
			        <div class="form-group">
			            <label for="nama">Nama Guru:</label>
			            <input type="text" class="form-control" name="nama">
			        </div>
			        <div class="form-group">
			            <label for="mengajar">Mengajar:</label>
			            <input type="text" class="form-control" name="mengajar">
			        </div>
			        <div class="form-group">
			            <label for="password">Password:</label>
			            <input type="text" class="form-control" name="password">
			        </div>
				</div>
				<div class="modal-footer">
				    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#konfirmasi">Simpan</button>
				    <button type="reset" class="btn btn-primary">Reset</button>
				    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
  

<!-- Modal Konfirmasi -->                                                    
    <div class="modal fade" id="konfirmasi" role="dialog">
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
					</form>
    	</div>
    </div>

    <!-- modal ubah -->
	<div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="ubah" aria-hidden="true">
		<div class="modal-dialog" role="document">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Ubah Data Guru</h4>
		      </div>
		    	<div class="modal-body">
		        	<div class="fetched-data"></div>
				</div>
				<div class="modal-footer">
				    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#konfirmasi2">Simpan</button>
				    <button type="reset" class="btn btn-primary">Reset</button>
				    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
					</form>
    	</div>
    </div>



    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#tabel_guru').DataTable({
            responsive: true
        });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
        $('#ubah').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('nuptk');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'ubah.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>

</body>

</html>
