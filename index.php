<?php
session_start();
$title = 'Login SLB C Sukapura Kota Bandung';
$halaman = 'login';
require( 'header.php' );

if ( isset( $_SESSION[ 's_pesan' ] ) ) {
	?>
	<div class="alert alert-warning" role="alert" align="center">
		<strong>Warning! </strong>
		<?php echo $_SESSION['s_pesan']; ?>
	</div>
	<?php
	unset( $_SESSION[ 's_pesan' ] );
}
?>

<div class="limiter">
	<div class="container-login100" style="background-image: url('images/background.jpg');">
		<div class="wrap-login100">
			<form class="login100-form validate-form" enctype="multipart/form-data" action="login.php" method="post">
				<span class="login100-form-logo">
						<img src="images/logo.png" width="144" height="144">
					</span>
			


				<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
			


				<div class="wrap-input100 validate-input" data-validate="Enter username">
					<input class="input100" type="text" name="username" placeholder="Username">
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Enter password">
					<input class="input100" type="password" name="password" placeholder="Password">
					<span class="focus-input100" data-placeholder="&#xf191;"></span>
				</div>
				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
							Login
						</button>
				

				</div>
			</form>
		</div>
	</div>
</div>


<div id="dropDownSelect1"></div>

<?php require('footer.php') ?>