<!DOCTYPE html>

<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:home.php?pesan=belum_login");
	}
?>

<?php
include('koneksi.php')
?>

<?php
$sql = "SELECT * FROM Sensor order by id desc limit 5";

$result = $conn->query($sql);

while ($data = $result->fetch_assoc()){
    $sensor_data[] = $data;
}

$id_patient = array_column($sensor_data, 'id');

$nama = json_encode(array_reverse(array_column($sensor_data, 'Nama')), JSON_NUMERIC_CHECK);
$tinggi = json_encode(array_reverse(array_column($sensor_data, 'Tinggi')), JSON_NUMERIC_CHECK);
$berat = json_encode(array_reverse(array_column($sensor_data, 'Berat')), JSON_NUMERIC_CHECK);
$id = json_encode(array_reverse($id_patient), JSON_NUMERIC_CHECK);


$result->free();
$conn->close();
?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BINUS ASO Clinic Center - Grafik Pasien</title>
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
  
  <!-- BarChart Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

  <script src="./js/script.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <title>Patient Data Graph</title>

</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="pics/doctor.png" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a>Dokter <?php echo $_SESSION['username']; ?></a></h1>
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
            <li>Patient Data Chart</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
   
    <section id="skills" class="skills section-bg">
      <div class="container">

        <div class="section-title">
          <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-2">Patient Data Graph</h2>
        </div>

    <!-- BarGraph -->
<section class="section-table cid-shhgQXrNMq" id="table1-6">
  <div class="container" style="position: absolute; top: 300px;  left: 500px; height:17vh; width:3hw; " >
                <canvas id="BarChart"></canvas>
            </div>
    <script>
    var tinggi = <?php echo $tinggi ; ?>;
    var nama   = <?php echo $nama ; ?>;
    var berat  = <?php echo $berat; ?>;
    

    let BarChart = document.getElementById('BarChart').getContext('2d');

        // Global Options

        let massPopChart = new Chart(BarChart, {
      type:'bar',
      data:{
        labels:[nama[0], nama[1], nama[2], nama[3], nama[4]],
        datasets: [{
		        label:'Tinggi',
            data:[
              tinggi[0],
              tinggi[1],
              tinggi[2],
              tinggi[3],
              tinggi[4]
            ],


          backgroundColor:[
            'rgba(255, 99, 132, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(255, 99, 132, 1)'
            ],

borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        },
        {
		        label:'Berat',
            data:[
              berat[0],
              berat[1],
              berat[2],
              berat[3],
              berat[4],
            ],
          backgroundColor:[
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)'
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:false,
          text:'',
          fontSize:25
        },
        legend:{
          display:true,
          position:'bottom',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:0,
            right:0,
            bottom:0,
            top:0
          }
},   
  tooltips:{
          enabled:true
        }
      }
    });
  </script>
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
  <script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "80%" 
        }
</script>

<body onload="zoom()">
</body>

</html>