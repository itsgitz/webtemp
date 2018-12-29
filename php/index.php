<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Sensor Suhu Data Center - Web Version ver1.0</title>
		<script src="js/angular.min.js"></script>
		<script>
			// angular js for data center temperature monitoring system (UI)
			var app = angular.module("sensorApp", []);
			app.controller("sensorCtrl", function($scope, $http, $interval) {
				$scope.headerTitle = "Monitoring Suhu Data Center";
				$http.get("get_sensor.php").then(function(response) {
					$scope.suhu = response.data.suhu;
					$scope.kelembaban = response.data.kelembaban;
				});
				$interval(function() {
					$http.get("get_sensor.php").then(function(response) {
						$scope.suhu = response.data.suhu;
						$scope.kelembaban = response.data.kelembaban;
					});
				}, 3000);
					
			});
		</script>
		<style>
			body {
				font-family: "arial";
				background-color: #7f8c8d;
			}
			.app-data-box {
				position: absolute;
				bottom: 20%;
				left: 10%;
				background-color: #e74c3c;
				color: white;
				font-weight: 800;
				padding: 5px;
				border-radius: 5px;
			}
			.app-title {
				background-color: #2c3e50;
				color: white;
				padding: 20px;
				border-radius: 5px;
			}
			.app-img-denah {
				border: solid 3px #ecf0f1;
				border-radius: 5px;
			}
			.app-container {

			}
		</style>
	</head>
	<body ng-app="sensorApp" ng-controller="sensorCtrl">
		<div class="app-container">
			<h3 class="app-title">{{headerTitle}}</h3>
			<div id="app-sensor-box">
				<div class="app-denah">
					<img class="app-img-denah" src="img/denah.jpeg" width="100%">
					<div class="app-data-box">
						<p>{{suhu}}</p>
						<p>{{kelembaban}}</p>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>