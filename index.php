<!DOCTYPE html>

<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="assets/img/binusicon.png" rel="icon">

<style>
.login,
.image {
  min-height: 100vh;
}

.bg-image {
  background: url("assets/img/binusasogedung.jpg");
  background-size: cover;
  background-position: center center;
}

</style>
</head>
<body>
	<form method="post" action="cek_login.php">
	<div class="container-fluid">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-6 d-none d-md-flex bg-image"></div>


        <!-- The content half -->
        <div class="col-md-6 bg-light">
            <div class="login d-flex align-items-center py-5">

                <!-- Demo content-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-7 mx-auto">
                            <h3 class="display-4">BINUS ASO Clinic Center</h3>
                            <p class="text-muted mb-4">Enter your Username and Password</p>
                            <form>
                                <div class="form-group mb-3">
                                    <input type="text" name="username" placeholder="Username" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" name="password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign in</button>
                                <div class="text-center d-flex justify-content-between mt-4">
								<p>
								<?php 
									if(isset($_GET['pesan'])){
										if($_GET['pesan'] == "gagal"){
											echo "Login gagal! username dan password salah!";
										}else if($_GET['pesan'] == "logout"){
											echo "Anda telah berhasil logout";
										}else if($_GET['pesan'] == "belum_login"){
											echo "Anda harus login untuk mengakses halaman admin";
										}
									}
								?>
								</p>
								</div>
								<footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Group 6</span></strong>
      </div>
      <div class="credits">
        Designed by <a>Daniel Rason,
		Nicholas Suganda,
		Maxson Phang
		</a>
      </div>
    </div>
  </footer>
                            </form>
                        </div>
                    </div>
                </div><!-- End -->

            </div>
        </div><!-- End -->

    </div>
</div>