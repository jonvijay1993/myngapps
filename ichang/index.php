<html>
<head>
	<script src="assets/js/angular.min.js"></script>
	<script src="assets/js/angular-cookies.min.js"></script>
	<script src="assets/js/jquery-2.1.3.min.js"></script>
	<script>
		/*var hello;
		$(document).ready(
			function(){
				
				$('.login_submit').click(function(){
				$.ajax({
					url : 'getdata.php',
					data : {
						username:$('.username').val()	
					},
					type : 'get',
					success : function(data){
						//alert(data);
					}
				});
				});
			}
		);*/
	</script>
</head>
<body>
	<div ng-app="cookietest" ng-controller="cookiecon" class="login">
	<form>
	<p>{{user}}</p>
	<input type="text" ng-hide={{hideusername}} class="username" ng-model="username_val" placeholder="username">
	<input type="password" ng-hide={{hidepass}} class="username" placeholder="password">
	<input type="submit" ng-click="check_cred()" class="login_submit" value="Go">
	</form>
	<script>
		var app = angular.module('cookietest',['ngCookies']);
		app.controller('cookiecon',['$scope','$cookies','$cookieStore','$window','$http',function($scope,$cookies,$cookieStore,$window,$http){
			
			/*var now = new Date(),
			// this will set the expiration to 12 months
			exp = new Date(now.getFullYear()+1, now.getMonth(), now.getDate());*/
			
			if($cookieStore.get('username') === undefined){
					$cookieStore.put("username",'samjonnew',{
					expires:"05 DEC 2015 00:00:00 GMT"
				});
				$scope.user = $cookieStore.get('username');
				//$scope.hidepass = true;
				//$scope.hideusername = false;
			}
			else if($cookieStore.get('username') !== null){
				$scope.user = $cookieStore.get('username');
				//$scope.hidepass = false;
				//$scope.hideusername = true;
			}
			
			$scope.check_cred = function(){
			
			$scope.url_make = 'http://localhost/ichang/getdata.php?username=' + $scope.username_val	
			var req={
				method : 'GET',
				url : $scope.url_make
			}	
			$http(req).success(
				function(va){
					alert(va);
				}
			).error(
				function(va){
					alert(va);
				}
			);
			};
			/*if($window.hello == "false"){
					$cookieStore.put("username",'samjonnew',{
					expires:"05 DEC 2015 00:00:00 GMT"
				});
				$scope.user = $cookieStore.get('username');
			}
			else
				$scope.user = $cookieStore.get('username');
			*/
		}]);
	</script>
	</div>
</body>
</html>