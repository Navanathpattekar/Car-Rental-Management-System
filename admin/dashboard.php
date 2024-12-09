<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Car Rental Portal | Admin Dashboard</title>
	<style>
		.dbrd{
			border:1px solid black;
			text-align:center;
			margin:5px;
			padding:5px;
			background-color:beige;
			width:100rem;
		}
		.clik{
			background-color:lightcyan;
			width:90%;
			margin:auto;
		}
	</style>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body style="background-color=teal;">
<?php include('includes/header.php');?>
<?php include('includes/leftbar.php');?>
		<div style="height:60vh;background-color:lightcyan;">
		<h2>Dashboard</h2>
			<div style="display:flex;width:100vw;flex-direction:row;">
				<div class="dbrd">
					<div >
<?php 
$sql ="SELECT email_id from users";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$regusers=$query->rowCount();
?>
													<p><?php echo htmlentities($regusers);?></p>
													<p>Reg Users</p>
											</div>
											<a href="reg-users.php" ><div class="dbrd clik"><i>Full Detail </i>
										</div></a>
				</div>
				<div class="dbrd">
					<div>
<?php 
$sql1 ="SELECT vehicle_id from vehicles_list ";
$query1 = $dbh -> prepare($sql1);;
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalvehicle=$query1->rowCount();
?>
													<p><?php echo htmlentities($totalvehicle);?></p>
													<p>Listed Vehicles</p>
												</div>
											<a href="manage-vehicles.php"><div class="dbrd clik"><i>Full Detail &nbsp; </i>
										</div></a>
				</div>
				<div class="dbrd">
					<div>
<?php 
$sql2 ="SELECT id from booking ";
$query2= $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$bookings=$query2->rowCount();
?>
													<p><?php echo htmlentities($bookings);?></p>
													<p>Total Bookings</p>
												</div>
											<a href="manage-bookings.php"><div class="dbrd clik"><i>Full Detail &nbsp; </i>
										</div></a>
				</div>
				<div class="dbrd">
					<div >
<?php 
$sql4 ="SELECT sub_id from subscribers ";
$query4 = $dbh -> prepare($sql4);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$subscribers=$query4->rowCount();
?>
													<p><?php echo htmlentities($subscribers);?></p>
													<p>Subscibers</p>
												</div>
											<a href="manage-subscribers.php""><div class="dbrd clik"><i>Full Detail </i>
										</div></a>
					</div>
	</div>
</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script>
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});
	}
	</script>
</body>
</html>
<?php } ?>