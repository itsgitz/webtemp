<!DOCTYPE html>
<html>
	<head>
		<title>Sensor Suhu Data Center - Web Version ver1.0</title>
		<script src="js/angular.min.js"></script>
		<script>
			// angular js for sensor
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
	</head>
	<body ng-app="sensorApp" ng-controller="sensorCtrl">
		<h3>{{headerTitle}}</h3>
		<div id="app-sensor-box">
			<p><b>Data Sensor from raspi:</b></p>
			<p>Suhu: {{suhu}}</p>
			<p>Kelembaban: {{kelembaban}}</p>
		</div>
	</body>
</html>