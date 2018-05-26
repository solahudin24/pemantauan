<?php
$query_kabur_sdlb = "SELECT (select COUNT(DISTINCT tb_kabur.nis) FROM tb_siswa JOIN tb_kabur ON tb_siswa.nis=tb_kabur.nis JOIN tb_kelas ON tb_kelas.id_kelas=tb_siswa.id_kelas where status=0 AND tb_kelas.tingkatan='SDLB') as Kabur from dual";
$result_kabur = mysqli_query( $link, $query_kabur_sdlb );
$data_kabur = mysqli_fetch_array( $result_kabur );
$jml_kabur_sdlb = $data_kabur[ 'Kabur' ];

$query_tidak_kabur_sdlb = "SELECT ((SELECT COUNT(*) FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id_kelas WHERE tb_kelas.tingkatan='SDLB')-(select COUNT(DISTINCT tb_kabur.nis) FROM tb_siswa JOIN tb_kabur ON tb_siswa.nis=tb_kabur.nis JOIN tb_kelas ON tb_kelas.id_kelas=tb_siswa.id_kelas where status=0 AND tb_kelas.tingkatan='SDLB')) as 'Tidak Kabur' from dual";
$result_tidak_kabur = mysqli_query( $link, $query_tidak_kabur_sdlb );
$data_tidak_kabur = mysqli_fetch_array( $result_tidak_kabur );
$jml_tidak_kabur_sdlb = $data_tidak_kabur[ 'Tidak Kabur' ];

$query_kabur_smplb = "SELECT (select COUNT(DISTINCT tb_kabur.nis) FROM tb_siswa JOIN tb_kabur ON tb_siswa.nis=tb_kabur.nis JOIN tb_kelas ON tb_kelas.id_kelas=tb_siswa.id_kelas where status=0 AND tb_kelas.tingkatan='SMPLB') as Kabur from dual";
$result_kabur = mysqli_query( $link, $query_kabur_smplb );
$data_kabur = mysqli_fetch_array( $result_kabur );
$jml_kabur_smplb = $data_kabur[ 'Kabur' ];

$query_tidak_kabur_smplb = "SELECT ((SELECT COUNT(*) FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id_kelas WHERE tb_kelas.tingkatan='SMPLB')-(select COUNT(DISTINCT tb_kabur.nis) FROM tb_siswa JOIN tb_kabur ON tb_siswa.nis=tb_kabur.nis JOIN tb_kelas ON tb_kelas.id_kelas=tb_siswa.id_kelas where status=0 AND tb_kelas.tingkatan='SMPLB')) as 'Tidak Kabur' from dual";
$result_tidak_kabur = mysqli_query( $link, $query_tidak_kabur_smplb );
$data_tidak_kabur = mysqli_fetch_array( $result_tidak_kabur );
$jml_tidak_kabur_smplb = $data_tidak_kabur[ 'Tidak Kabur' ];

$query_kabur_smalb = "SELECT (select COUNT(DISTINCT tb_kabur.nis) FROM tb_siswa JOIN tb_kabur ON tb_siswa.nis=tb_kabur.nis JOIN tb_kelas ON tb_kelas.id_kelas=tb_siswa.id_kelas where status=0 AND tb_kelas.tingkatan='SMALB') as Kabur from dual";
$result_kabur = mysqli_query( $link, $query_kabur_smalb );
$data_kabur = mysqli_fetch_array( $result_kabur );
$jml_kabur_smalb = $data_kabur[ 'Kabur' ];

$query_tidak_kabur_smalb = "SELECT ((SELECT COUNT(*) FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id_kelas WHERE tb_kelas.tingkatan='SMALB')-(select COUNT(DISTINCT tb_kabur.nis) FROM tb_siswa JOIN tb_kabur ON tb_siswa.nis=tb_kabur.nis JOIN tb_kelas ON tb_kelas.id_kelas=tb_siswa.id_kelas where status=0 AND tb_kelas.tingkatan='SMALB')) as 'Tidak Kabur' from dual";
$result_tidak_kabur = mysqli_query( $link, $query_tidak_kabur_smalb );
$data_tidak_kabur = mysqli_fetch_array( $result_tidak_kabur );
$jml_tidak_kabur_smalb = $data_tidak_kabur[ 'Tidak Kabur' ];
?>

<script type="text/javascript">
	
	$( function () {

		//get the doughnut chart canvas
		var ctx1 = $( "#chartSDLB" );
		var ctx2 = $( "#chartSMPLB" );
		var ctx3 = $( "#chartSMALB" );

		//doughnut chart data
		var data1 = {
			labels: [ "Kabur", "Tidak Kabur" ],
			datasets: [ {
				label: "SDLB",
				data: [ <?php echo $jml_kabur_sdlb; ?>, <?php echo $jml_tidak_kabur_sdlb; ?> ],
				backgroundColor: [
					"#DEB887",
					"#A9A9A9"
				],
				borderColor: [
					"#CDA776",
					"#989898"
				],
				borderWidth: [ 1, 1 ]
			} ]
		};

		var data2 = {
			labels: [ "Kabur", "Tidak Kabur" ],
			datasets: [ {
				label: "SMPLB",
				data: [ <?php echo $jml_kabur_smplb; ?>, <?php echo $jml_tidak_kabur_smplb; ?> ],
				backgroundColor: [
					"#DEB887",
					"#A9A9A9"
				],
				borderColor: [
					"#CDA776",
					"#989898"
				],
				borderWidth: [ 1, 1 ]
			} ]
		};
		
		var data3 = {
			labels: [ "Kabur", "Tidak Kabur" ],
			datasets: [ {
				label: "SMALB",
				data: [ <?php echo $jml_kabur_smalb;?>, <?php echo $jml_tidak_kabur_smalb; ?> ],
				backgroundColor: [
					"#DEB887",
					"#A9A9A9"
				],
				borderColor: [
					"#CDA776",
					"#989898"
				],
				borderWidth: [ 1, 1 ]
			} ]
		};

		//options
		var optionsSDLB = {
			responsive: true,
			title: {
				display: true,
				position: "top",
				text: "SDLB",
				fontSize: 18,
				fontColor: "#111"
			},
			legend: {
				display: true,
				position: "bottom",
				labels: {
					fontColor: "#333",
					fontSize: 16
				}
			}
		};
		var optionsSMPLB = {
			responsive: true,
			title: {
				display: true,
				position: "top",
				text: "SMPLB",
				fontSize: 18,
				fontColor: "#111"
			},
			legend: {
				display: true,
				position: "bottom",
				labels: {
					fontColor: "#333",
					fontSize: 16
				}
			}
		};
		
		var optionsSMALB = {
			responsive: true,
			title: {
				display: true,
				position: "top",
				text: "SMALB",
				fontSize: 18,
				fontColor: "#111"
			},
			legend: {
				display: true,
				position: "bottom",
				labels: {
					fontColor: "#333",
					fontSize: 16
				}
			}
		};

		//create Chart class object
		var chart1 = new Chart( ctx1, {
			type: "doughnut",
			data: data1,
			options: optionsSDLB
		} );

		var chart2 = new Chart( ctx2, {
			type: "doughnut",
			data: data2,
			options: optionsSMPLB
		} );
		
		var chart3 = new Chart( ctx3, {
			type: "doughnut",
			data: data3,
			options: optionsSMALB
		} );

	} );
</script>

<div id="page-wrapper">
	<div class="row">
		<div class="col-md-12">
			<center>
				<h1>Statistik Pemantauan Siswa</h1>
			</center>
		</div>

		<!-- /.row -->
		
			<div class="row">
				<div class="col-md-6">
					<canvas id="chartSDLB"></canvas>
				</div>
				<div class="col-md-6">
					<canvas id="chartSMPLB"></canvas>
				</div>
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<canvas id="chartSMALB"></canvas>
				</div>
				<div class="col-md-3"></div>
				<!--				<div class="col-md-4">-->
				<!--										<div id="piechartSMALB"></div>-->
				<!--				</div>-->
			</div>
			

	</div>


	<!-- /#wrapper -->