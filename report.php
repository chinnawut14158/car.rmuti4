<?php
session_start(); 
    include('connect.php');

  $level = $_SESSION['userlevel'];
 	if($level!='1'){
    Header("Location:logout.php");  
  }  
  ?>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>CarBooking RMUTI</title>
	<!-- <link src="js/chart.js"> -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
	<script	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">
	<link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Favicons -->
	<link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
	<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
	<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
	<link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
	<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
	<meta name="theme-color" content="#712cf9">
</head>
<body style="background-color:ebebeb" >

  <!-- Navbar -->
  <?php
    include('ul.php');
	?>
  <!-- EndNavbar -->
    
<div class="container" >
<center><h1>รายงานการใช้รถ</h1></center>
<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="card mt-4">
						<div class="card-header">Pie Chart : จำนวนครั้งที่ใช้งานรถ</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="pie_chart"></canvas>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="col-md-4">
					<div class="card mt-4">
						<div class="card-header">Doughnut Chart</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="doughnut_chart"></canvas>
							</div>
						</div>
					</div>
				</div> -->
				<div class="col-md-6">
					<div class="card mt-4 mb-4">
						<div class="card-header">Bar Chart : จำนวนครั้งที่ใช้งานรถ</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="bar_chart"></canvas>
							</div>
						</div>
					</div>
				</div>
                <div class="col-md-6">
					<div class="card mt-4">
						<div class="card-header">Pie Chart : จำนวนครั้งที่ใช้งานพนักงานขับรถ</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="pie_chart2"></canvas>
							</div>
						</div>
					</div>
				</div>
                <!-- <div class="col-md-6">
					<div class="card mt-4 mb-4">
						<div class="card-header">Bar Chart : จำนวนครั้งที่ใช้งานพนักงานขับรถ</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="bar_chart2"></canvas>
							</div>
						</div>
					</div>
				</div> -->

				<div class="col-md-6">
					<div class="card mt-4 mb-4">
						<div class="card-header">Bar Chart : จำนวนกิโลเมตรของรถ</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="bar_chart3"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
</body>
</html>
<script src="js/chart.js"></script>
<script>
	
$(document).ready(function(){

	$('#submit_data').click(function(){

		var language = $('input[name=programming_language]:checked').val();

		$.ajax({
			url:"report_data.php",
			method:"POST",
			data:{action:'insert', language:language},
			beforeSend:function()
			{
				$('#submit_data').attr('disabled', 'disabled');
			},
			success:function(data)
			{
				$('#submit_data').attr('disabled', false);

				$('#programming_language_1').prop('checked', 'checked');

				$('#programming_language_2').prop('checked', false);

				$('#programming_language_3').prop('checked', false);

				alert("Your Feedback has been send...");

				makechart();
                makechart2();
				makechart3();
			}
		})

	});

	makechart();
    makechart2();
	makechart3();

	function makechart()
	{
		$.ajax({
			url:"report_data.php",
			method:"POST",
			data:{action:'fetch'},
            // data2:{action:'fetch2'},
			dataType:"JSON",
			success:function(data)
			{
				var language = [];
                // var language2 = [];
				var total = [];
                // var total2 = [];
				var color = [];

                for(var count = 0; count < data.length; count++)
				{
					language.push(data[count].language);
					total.push(data[count].total);
                    // language2.push(data[count].language2);
					// total2.push(data[count].total2);
					color.push(data[count].color);
				}

				var chart_data = {
					labels:language,
					datasets:[
						{
							label:'จำนวนครั้งที่ใช้งานรถ',
							backgroundColor:color,
							color:'#fff',
							data:total
						}
					]
				};

				var options = {
					responsive:true,
					scales:{
						yAxes:[{
							ticks:{
								min:0
							}
						}]
					}
				};

				var group_chart1 = $('#pie_chart');

				var graph1 = new Chart(group_chart1, {
					type:"pie",
					data:chart_data
				});

				// var group_chart2 = $('#doughnut_chart');

				// var graph2 = new Chart(group_chart2, {
				// 	type:"doughnut",
				// 	data:chart_data
				// });

				var group_chart2 = $('#bar_chart');

				var graph2 = new Chart(group_chart2, {
					type:'bar',
					data:chart_data,
					options:options
				});
			}
		})
	}

    function makechart2()
	{
		$.ajax({
			url:"report_data2.php",
			method:"POST",
			// data:{action:'fetch'},
            data:{action:'fetch2'},
			dataType:"JSON",
			success:function(data)
			{
				// var language = [];
                var language2 = [];
				// var total = [];
                var total2 = [];
				var color = [];
                // var color2 = [];

                for(var count = 0; count < data.length; count++)
				{
                    language2.push(data[count].language2);
					total2.push(data[count].total2);
					color.push(data[count].color);
				}
                // ตัวทดสอบ
                var chart_data2 = {
					labels:language2,
					datasets:[
						{
							label:'จำนวนครั้งที่ใช้งานพนักงานขับรถ',
							backgroundColor:color,
							color:'#fff',
							data:total2
						}
					]
				};

				var options = {
					responsive:true,
					scales:{
						yAxes:[{
							ticks:{
								min:0
							}
						}]
					}
				};

                var group_chart3 = $('#pie_chart2');

				var graph3 = new Chart(group_chart3, {
					type:"pie",
					data:chart_data2
				});

                var group_chart4 = $('#bar_chart2');

				var graph4 = new Chart(group_chart4, {
					type:'bar',
					data:chart_data2,
					options:options
				});
			}
		})
	}

	function makechart3()
	{
		$.ajax({
			url:"report_data3.php",
			method:"POST",
			// data:{action:'fetch'},
            data:{action:'fetch3'},
			dataType:"JSON",
			success:function(data)
			{
				// var language = [];
                var language3 = [];
				// var total = [];
                var total3 = [];
				var color = [];
                // var color2 = [];

                for(var count = 0; count < data.length; count++)
				{
                    language3.push(data[count].language3);
					total3.push(data[count].total3);
					color.push(data[count].color);
				}
                // ตัวทดสอบ
                var chart_data3 = {
					labels:language3,
					datasets:[
						{
							label:'กิโลเมตรของรถ',
							backgroundColor:color,
							color:'#fff',
							data:total3
						}
					]
				};

				var options = {
					responsive:true,
					scales:{
						yAxes:[{
							ticks:{
								min:0
							}
						}]
					}
				};

                // var group_chart5 = $('#pie_chart3');

				// var graph5 = new Chart(group_chart5, {
				// 	type:"pie",
				// 	data:chart_data3
				// });

                var group_chart5 = $('#bar_chart3');

				var graph5 = new Chart(group_chart5, {
					type:'bar',
					data:chart_data3,
					options:options
				});
			}
		})
	}
});

</script>
