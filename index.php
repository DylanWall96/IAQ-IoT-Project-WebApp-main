<?php
require_once 'api/functions.php';

$db = new Functions ();

$BME = $db->getData ()->fetch_assoc ();


?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Dylan's IoT Hub</title>

<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
	type="text/css">
<link
	href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
	rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<script src="https://rawgit.com/moment/moment/2.2.1/min/moment.min.js"></script>

  



</head>

<body>

	<!-- Page Wrapper -->

	<div id="wrapper">
		
		<nav
			class="navbar navbar-expand-lg py-3 navbar-light bg-light shadow-sm"
			style="width: 100%;">

			<a href="#" class="navbar-brand"> <!-- Logo Image --> <img
				src="img/logo.png" width="45" alt=""
				class="d-inline-block align-middle mr-2"> <!-- Logo Text --> <span
				class="text-uppercase font-weight-bold" style="color: #5a5c69!important;">Dylan's IoT Hub <sup>v1</sup></span>
			</a>

			<button type="button" data-toggle="collapse"
				data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation" class="navbar-toggler">
				<span class="navbar-toggler-icon"></span>
			</button>


			<div id="navbarSupportedContent" class="collapse navbar-collapse">

				<ul class="navbar-nav">
					<li class="nav-item dropdown"><a href="#"
						class="nav-link dropdown-toggle" data-toggle="dropdown" style="color: #5a5c69!important;">Change
							Location</a>
						<div class="dropdown-menu">
							<a href="index.php" class="dropdown-item active">Bedroom</a> <a
								href="kitchen.php" class="dropdown-item">Kitchen</a>

						</div>
						</li>
							<li class="nav-item">
						<div class="form-group">

							<button onclick="Export()"
								class=" nav link btn btn-link-gray"  style="color: #5a5c69!important;">Export IAQ Data</button>
						</div></li>
				
				</ul>



				<ul class="navbar-nav ml-auto">
				

					<li class="nav-item active"><span class="sr-only">(current)</span>
						<span class="text-uppercase font-weight-bold"
						style="color: #5a5c69!important;">Last Updated: <sup id="last-recorded"></sup></span>

					</li>

				</ul>
			</div>

		</nav>
	</div>
	
	
	



	<!-- End of Sidebar -->

	<!-- Content Wrapper -->
	<div id="content-wrapper" class="d-flex flex-column">
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->


		<!-- Main Content -->
		<div id="content">

			<!-- Topbar -->


			<!-- End of Topbar -->

			<!-- Begin Page Content -->
			<div class="container-fluid">

				<!-- Page Heading -->

				<div class="row">


					<div class="col-sm-12">
						<div class="card shadow mb-12">

							<div class="card-header py-3">
								<div class="row">

									<div class="col-sm-4">

										<h6 class="m-0 font-weight-bold text-danger"
											style="text-align: center;">Location -</h6>
									</div>


									<div class="col-sm-4">
										<h6 class="m-0 font-weight-bold text-danger"
											style="text-align: center;">Indoor Air Quality (IAQ) Score -</h6>
									</div>

									<div class="col-sm-4">
										<h6 class="m-0 font-weight-bold text-danger"
											style="text-align: center;">Overall Air Quality -</h6>

									</div>

								</div>

							</div>

							<div class="card border-left-danger shadow">
								<div class="card-body">
									<div class="row">
										<div class="col-sm-4">

											<h1 class="m-0 font-weight-bold text-dark"
												style="text-align: center;" id="location"></h1>
										</div>
										<div class="col-sm-4">

											<h1 class="m-0 font-weight-bold text-dark"
												style="text-align: center;" id="score"></h1>
										</div>


										<div class="col-sm-4">
											<h6 style="text-align: center;" id="IAQ-box"></h6>
										</div>
									</div>

								</div>
							</div>
						</div>


					</div>


				</div>


				<hr>




				<!-- Content Row -->
				<div class="row">



					<!-- Earnings (Monthly) Card Example -->
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-primary shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div
											class="text-xs font-weight-bold text-primary text-uppercase mb-1">Temperature
											(Celcius)</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800" id="temp">&deg;C</div>
									</div>
									<div class="col-auto">
										<i class="fa fa-thermometer-half fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Earnings (Monthly) Card Example -->
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-success shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div
											class="text-xs font-weight-bold text-success text-uppercase mb-1">Pressure</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800" id="pres">hPa</div>
									</div>
									<div class="col-auto">
										<i class="fas fa-tachometer-alt fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Earnings (Monthly) Card Example -->
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-info shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div
											class="text-xs font-weight-bold text-info text-uppercase mb-1">Humidity</div>
										<div class="row no-gutters align-items-center">
											<div class="col-auto">
												<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"
													id="hum">%</div>
											</div>

										</div>
									</div>
									<div class="col-auto">
										<i class="fas fa-tint fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Pending Requests Card Example -->
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-warning shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div
											class="text-xs font-weight-bold text-warning text-uppercase mb-1">Gas
											Resistance (&#8486;)</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800" id="gas"></div>
									</div>
									<div class="col-auto">
										<i class="fas fa-burn fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Content Row -->
				<hr>


				<!-- Area Chart -->
				<div class="col-xl-12 ">
					<div class="card shadow mb-4">
						<!-- Card Header - Dropdown -->
						<div
							class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
							<h6 class="m-0 font-weight-bold text-primary">Temperature Time
								Series</h6>


						</div>
						<!-- Card Body -->

						<div class="card-body">
							<div class="row">
								<div class="chart-area">
									<canvas id="tempGraph"
										style="display: block; height: 100%; width: 100%;"></canvas>
								</div>

							</div>


						</div>
					</div>



				</div>
				<div class="col-xl-12 ">
					<div class="card shadow mb-4">
						<!-- Card Header - Dropdown -->
						<div
							class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
							<h6 class="m-0 font-weight-bold text-success">Pressure Time
								Series</h6>

						</div>


						<div class="card-body">
							<div class="row">
								<div class="chart-area">
									<canvas id="presGraph"
										style="display: block; height: 100%; width: 100%;"></canvas>
								</div>

							</div>


						</div>
					</div>



				</div>


				<!-- First Row of Graphs -->



				<!-- Area Chart -->
				<div class="col-xl-12 ">
					<div class="card shadow mb-4">
						<!-- Card Header - Dropdown -->
						<div
							class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
							<h6 class="m-0 font-weight-bold text-info">Humidity Time Series</h6>

						</div>
						<!-- Card Body -->

						<div class="card-body">
							<div class="row">
								<div class="chart-area">
									<canvas id="humGraph"
										style="display: block; height: 100%; width: 100%;"></canvas>
								</div>

							</div>


						</div>
					</div>



				</div>
				<div class="col-xl-12 ">
					<div class="card shadow mb-4">
						<!-- Card Header - Dropdown -->
						<div
							class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
							<h6 class="m-0 font-weight-bold text-warning">Gas Resistance Time
								Series</h6>


						</div>


						<div class="card-body">
							<div class="row">
								<div class="chart-area">
									<canvas id="gasGraph"
										style="display: block; height: 100%; width: 100%;"></canvas>
								</div>

							</div>


						</div>
					</div>

					<div class="col-xl-12 ">
						<div class="card shadow mb-4">
							<!-- Card Header - Dropdown -->
							<div
								class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
								<h6 class="m-0 font-weight-bold text-danger">Indoor Air Quality
									Score (IAQ)</h6>

							</div>
							<div class="card-body">
								<div class="row">
									<div class="chart-area">
										<canvas id="scoreGraph"
											style="display: block; height: 100%; width: 100%;"></canvas>
									</div>

								</div>


							</div>
						</div>



					</div>
				</div>



				<!-- Content Row -->
				<div class="row">


					<!-- /.container-fluid -->

				</div>
				<!-- End of Main Content -->



			</div>
			<!-- End of Content Wrapper -->
			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>IoT Air Quality</span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->

		</div>
		<!-- End of Page Wrapper -->

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top"> <i
			class="fas fa-angle-up"></i>
		</a>

		<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
			aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
						<button class="close" type="button" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Select "Logout" below if you are ready to
						end your current session.</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button"
							data-dismiss="modal">Cancel</button>
						<a class="btn btn-primary" href="login.html">Logout</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Bootstrap core JavaScript-->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="js/sb-admin-2.min.js"></script>

		<!-- Page level plugins -->
		<script src="vendor/chart.js/Chart.min.js"></script>

		<!-- Page level custom scripts -->
		<script src="js/demo/chart-area-demo.js"></script>
		<script src="js/demo/chart-pie-demo.js"></script>

</body>
<script type="text/javascript">

time=setInterval(function(){
	var request = $.ajax({
	    url: 'BME680Data.php',
	    type: "GET",
	    success: function (data) {
	    	var results = JSON.parse(data);
			var temp = parseFloat(results["temp"]);
			var hum = parseFloat(results["hum"]);
			var pres = parseFloat(results["pres"]);
			var gas = parseFloat(results["gas"]);
			var score = parseInt(results["score"]);
			var timestamp = results["Timestamp"];
			var location = results["location"];

			//console.log(location);
            var formattedTime = moment(timestamp, "YYYY-MM-DD HH:mm:ss").fromNow();
			

			$('#temp').html(results["temp"] + '\u00B0C');
			$('#hum').html(results["hum"] + "%");
			$('#pres').html(results["pres"] + "hPa");
			$('#gas').html(results["gas"] + 'k&#8486;');
			$('#score').html(results["score"] + " IAQ");
	        $('#last-recorded').html(formattedTime);
	        $('#location').html(results["location"]);

			/* IAQ Alerts according BME680 datasheet */
	    	if(score < 50){
				$('#IAQ-box').html('<div class="alert alert-success" role="alert">Air Quality - Good!</div>');
	    	} else if(score >= 51 && score <= 100)  {
				$('#IAQ-box').html('<div class="alert alert-success" role="alert">Air Quality - Average!</div>');
	    	} else if(score >= 101 && score <= 150) {
				$('#IAQ-box').html('<div class="alert alert-warning" role="alert">Air Quality - Unhealthy for Sensitive Groups!</div>');
	    	} else if(score >= 151 && score <= 200) {
				$('#IAQ-box').html('<div class="alert alert-warning" role="alert">Air Quality - Unhealthy!</div>');
	    	} else if(score >= 201 && score <= 300) {
				$('#IAQ-box').html('<div class="alert alert-danger" role="alert">Air Quality - Very Unhealthy!</div>');
	    	} else if(score >= 301) {
				$('#IAQ-box').html('<div class="alert alert-danger" role="alert">Air Quality - Hazardous!</div>');
	    	}
	    }
	});
	}, 6000);

</script>

<script>
time=setInterval(function(){
	
$(document).ready(function () {
    tempGraph();
    presGraph()
    humGraph();
    gasGraph();
    scoreGraph();
});



function tempGraph()
	{
        $.post("api/tempData.php",
        function (data)
        {
 	
             var timestamp = [];
            var temperature = [];

            for (var i in data) {
               timestamp.push(data[i].Timestamp);
               temperature.push(data[i].temp);
            }

            var chartdata = {
                labels: timestamp,
                datasets: [
                    {
                        label: 'Temperature Data (\u00B0C)',
                        backgroundColor: '#0275d8',
                        borderColor: '#0275d8',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: temperature,
                        fill: false
                    }
                ]

        
            };

            var graphTarget = $("#tempGraph");

            var barGraph = new Chart(graphTarget, {
                type: 'line',
                data: chartdata,
                options: {
                    animation: false
                }
            });
            
  
});
}

function presGraph()
{
    $.post("api/presData.php",
    function (data)
    {
	
        var timestamp = [];
        var pressure = [];

        for (var i in data) {
           timestamp.push(data[i].Timestamp);
           pressure.push(data[i].pres);
        }

        var chartdata = {
            labels: timestamp,
            datasets: [
                {
                    label: 'Pressure Data (hPa)',
                    backgroundColor: '#5cb85c',
                    borderColor: '#5cb85c',
                    hoverBackgroundColor: '#CCCCCC',
                    hoverBorderColor: '#666666',
                    data: pressure,
                    fill: false
                }
            ]

    
        };

        var graphTarget = $("#presGraph");

        var barGraph = new Chart(graphTarget, {
            type: 'line',
            data: chartdata,
            options: {
                animation: false
            }
        });
        

});
}
function humGraph()
{
    $.post("api/humData.php",
    function (data)
    {
	
        var timestamp = [];
        var humidity = [];

        for (var i in data) {
           timestamp.push(data[i].Timestamp);
           humidity.push(data[i].hum);
        }

        var chartdata = {
            labels: timestamp,
            datasets: [
                {
                    label: 'Humidity Data (%)',
                    backgroundColor: '#5bc0de',
                    borderColor: '#5bc0de',
                    hoverBackgroundColor: '#CCCCCC',
                    hoverBorderColor: '#666666',
                    data: humidity,
                    fill: false
                }
        ]
        };

        var graphTarget = $("#humGraph");

        var barGraph = new Chart(graphTarget, {
            type: 'line',
            data: chartdata,
            options: {
                animation: false
            }
        });
        

});
}

function gasGraph()
{
$.post("api/gasData.php",
function (data)
{

    var timestamp = [];
    var gas = [];

    for (var i in data) {
       timestamp.push(data[i].Timestamp);
       gas.push(data[i].gas);
    }

    var chartdata = {
        labels: timestamp,
        datasets: [
            {
                label: 'Gas Resistance (k\u2126)',
                backgroundColor: '#f0ad4e',
                borderColor: '#f0ad4e',
                hoverBackgroundColor: '#CCCCCC',
                hoverBorderColor: '#666666',
                data: gas,
                fill: false
            }
        ]


    };

    var graphTarget = $("#gasGraph");

    var barGraph = new Chart(graphTarget, {
        type: 'line',
        data: chartdata,
        options: {
            animation: false
        }
    });
    

});
}


function scoreGraph()
{
$.post("api/scoreData.php",
function (data)
{

    var timestamp = [];
    var score = [];

    for (var i in data) {
       timestamp.push(data[i].Timestamp);
       score.push(data[i].score);
    }

    var chartdata = {
        labels: timestamp,
        datasets: [
            {
                label: 'IAQ Score',
                backgroundColor: '#ff0000',
                borderColor: '#ff0000',
                hoverBackgroundColor: '#CCCCCC',
                hoverBorderColor: '#666666',
                data: score,
                fill: false
            }
        ]


    };

    var graphTarget = $("#scoreGraph");

    var barGraph = new Chart(graphTarget, {
        type: 'line',
        data: chartdata,
        options: {
            animation: false
        }
    });
    

});
}
}, 6000);
</script>

 <script>
        function Export()
        {
            var conf = confirm("Download Air Quality Data?");
            if(conf == true)
            {
                window.open("export.php", '_blank');
            }
        }
    </script>


</html>
