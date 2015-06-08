<html>
<head>
	<script src="assets/js/angular.min.js"></script>
	<script src="assets/js/angular-cookies.min.js"></script>
	<script src="assets/js/jquery-2.1.3.min.js"></script>
</head>
<body>
	<div ng-app="diaryapp" ng-controller="diarycontroller" >
		<form action="check.php" method="get">
			<div>
				{{name}}
			</div>
			<input type="text" name="username">
			<input type="password" name="password">
			<button>
				Go {{name}}
			</button>
			<div>
				<div ng-repeat="msg in msg_array">
					<span>{{msg.msg}}</span>
					<span>{{msg.created}}</span>
					<span>{{msg.modified}}</span>
					<input type="button" value="Edit" ng-click="editmsg()" >
					<div ng-show="edit_enable">
						<textarea>{{msg.msg}}</textarea>
						<input type="button" value="Submit" ng-click="updatemsg(msg.msg,msg.created)">
					</div>
				</div>
			</div>
		</form>
		
		<script>
			var app = angular.module('diaryapp',[]);
			app.controller('diarycontroller',['$scope','$http','$window',function($scope,$http,$window){
				$scope.name = "Jonathan";
				$scope.edit_enable = false;
				$http.get('http://localhost/ichang/msg_read.php').success(function(vals){
					$scope.msg_array = vals.records;
				});
				$scope.editmsg = function(){
					$scope.edit_enable = $scope.edit_enable == true ? false:true;
				};
				$scope.updatemsg = function(msg,created){
					var loc = 'http://localhost/ichang/update_msg.php?msg='+msg+'&created="'+created+'"';
					alert(loc);
					$window.location.href = loc;				
				};
			}]);
		</script>
	</div>
</body>
</html>