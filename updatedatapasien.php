<!DOCTYPE html>

<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:index.php?pesan=belum_login");
	}
?>

<?php
include('koneksi.php')
?>

<?php
$id = $_GET["id"];
?>


<?php
$sql = "SELECT * FROM Sensor where id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
mysqli_close($conn);
?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BINUS ASO Clinic Center - Update Data Pasien</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/binusicon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css"> 
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
<link rel="stylesheet" href="assets/tether/tether.min.css">
<link rel="stylesheet" href="assets/datatables/data-tables.bootstrap4.min.css">
<link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="pics/doctor.png" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.php">Dokter <?php echo $_SESSION['username']; ?></a></h1>
      </div>

      <nav class="nav-menu">
        <ul>
          <li><a href="home.php"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="datapasien.php"><i class="bx bx-user"></i> <span>Patient Data</span></a></li>
          <li><a href="grafikpasien.php"><i class="bx bxs-bar-chart-square"></i> <span>Patient Data Chart</span></a></li>
		  <li><a href="datadokter.php"><i class="bx bxs-clinic"></i> <span>Doctor Data</span></a></li>
		  
		  <li><a href="logout.php"><i class="bx bx-power-off"></i> <span>Logout</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
      <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>BINUS ASO Clinic Center</h2>
          <ol>
            <li><a href="home.php">Home</a></li>
            <li>Update Patient Data</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

   <div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
      <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-2">UPDATE PATIENT DATA</h2>
	  
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <p>&larr; <a href="datapasien.php">Back</a>
		

        <h3>Update Data Pasien</h3>


        <form action="koneksidatapasien.php" method="GET">

            <div class="form-group">
                <label for="id">ID</label>
                <input class="form-control" type="text" name="id" value="<?php echo $row["id"]; ?>" />
            </div>

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input class="form-control" type="text" name="Nama" value="<?php echo $row["Nama"]; ?>" />
            </div>

            <div class="form-group">
                <label for="tinggi">Tinggi</label>
                <input class="form-control" type="text" name="Tinggi" value="<?php echo $row["Tinggi"]; ?>" />
            </div>

            <div class="form-group">
                <label for="berat">Berat</label>
                <input class="form-control" type="text" name="Berat" value="<?php echo $row["Berat"]; ?>" />
            </div>

            <input type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm" name="register" value="Submit" >

        </form>
            
        </div>

    </div>
</div>
</section>

  </main><!-- End #main -->

  <footer id="footer">
    
      <div class="copyright">
        &copy; Copyright <strong><span>Group 6</span></strong>
      </div>
      <div class="credits">
        Designed by <a>Daniel Rason,
		Nicholas Suganda,
		Maxson Phang
		</a>
     
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  
<section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="https://mobirise.site/k" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a></section>
<script src="assets/web/assets/jquery/jquery.min.js"></script>  
<script src="assets/popper/popper.min.js"></script>  
<script src="assets/bootstrap/js/bootstrap.min.js"></script>  
<script src="assets/tether/tether.min.js"></script>  
<script src="assets/smoothscroll/smooth-scroll.js"></script>  
<script src="assets/datatables/jquery.data-tables.min.js"></script>  
<script src="assets/datatables/data-tables.bootstrap4.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "90%" 
        }
</script>

<body onload="zoom()">

</body>

</html>