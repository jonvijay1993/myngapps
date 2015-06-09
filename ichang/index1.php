<?php
	session_start();
?>
<html>
<head>
	<script src="assets/js/angular.min.js"></script>
	<script src="assets/js/angular-cookies.min.js"></script>
	<script src="assets/js/jquery-2.1.3.min.js"></script>
</head>
<body>
	<div ng-app="diaryapp" ng-controller="diarycontroller" >
			<div>
				<h2><?php echo $_SESSION['username']."'s diary";?></h1>
				<div ng-hide={{today_exists}}>
					<h4>Write today's note</h4>
					<textarea ng-model="today_note" rows="10" cols="50"></textarea>
					<div>
						<input type="button" value="Submit today's note" ng-click="write_today_msg()">
					</div>
				</div>
				<table border="2" ng-repeat="msg in msg_array">
					<tr>
						<td><span>{{msg.msg}}</span></td>
						<td><span>{{msg.created}}</span></td>
						<td><span>{{msg.modified}}</span></td>
						<td><input type="button" value="Edit" ng-click="updatemsg(msg.msg,msg.created)"></td>	
						<td><input type="button" value="Ditch" ng-click="ditch(msg.msg,msg.created)"></td>	
					</tr>
				</table>
				<div>
					<br>
					<a href="logout.php">Logout <?php echo $_SESSION['username']; ?></a>
				</div>
			</div>
		
		<script>
			var app = angular.module('diaryapp',[]);
			app.controller('diarycontroller',['$scope','$http','$window',function($scope,$http,$window){
				
				$http.get('http://localhost/ichang/msg_read.php').success(function(vals){
					$scope.msg_array = vals.records;
				});
				
				$http.get('http://localhost/ichang/today_exists.php').success(function(vals){
					$scope.today_exists = vals;
				});
				
				$scope.write_today_msg = function(){
					var url = 'http://localhost/ichang/msg_write.php?msg="'+$scope.today_note+'"';
					alert(url);
					$http.get(url).success(function(vals){
						$scope.today_exists = vals;
					});
				}
				
				$scope.updatemsg = function(msg,created){
					var loc = 'http://localhost/ichang/update_msg.php?msg='+msg+'&created="'+created+'"';
					alert(loc);
					$window.location.href = loc;				
				};
				
				$scope.ditch= function(msg,created){
					var loc = 'http://localhost/ichang/ditch.php?created="'+created+'"';
					alert(loc);
					$http.get(loc).success(function(vals){
						$window.location.href = 'index1.php';
					});				
				};
			}]);
		</script>
	</div>
</body>
</html>