<!DOCTYPE html>

<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:login.php?pesan=belum_login");
	}
?>

<?php
$servername = "localhost";
$username = "id15456401_binusaso";
$password = "ff7cqLN%L]&3\|T8";
$dbname = "id15456401_project";
$kolom1 = $_GET["id"];
$kolom2 = $_GET["Nama"];
$kolom3 = $_GET["Tinggi"];
$kolom4 = $_GET["Berat"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE Sensor SET 
Nama = '$kolom2',
Tinggi = '$kolom3',
Berat = '$kolom4'
WHERE id = '$kolom1'";
?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BINUS ASO Clinic Center - Input Data Pasien</title>
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
        <img src="pics/maxson.jpg" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a><?php echo $_SESSION['username']; ?></a></h1>
      </div>

      <nav class="nav-menu">
        <ul>
          <li><a href="home.php"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="datapasien.php"><i class="bx bx-user"></i> <span>Data Pasien</span></a></li>
          <li><a href="grafikpasien.php"><i class="bx bxs-bar-chart-square"></i> <span>Grafik Pasien</span></a></li>
		  <li><a href="datadokter.php"><i class="bx bxs-clinic"></i> <span>Data Dokter</span></a></li>
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
            <li><a href="index.html">Home</a></li>
            <li>Update Data Pasien</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
   
    <section id="skills" class="skills section-bg">
      <div class="container">

        <div class="section-title">
          <h2><?php
if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
</h2>
		  <h5><a href="datapasien.php">BACK</a></h5>
        </div>
      </div>
    </section>

    
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
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
  </footer><!-- End  Footer -->

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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>