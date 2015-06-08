<?php
	echo $_GET['msg']."done";
	echo $_GET['created'];
?>
<html>
<head>
	<script src="assets/js/angular.min.js"></script>
	<script src="assets/js/angular-cookies.min.js"></script>
	<script src="assets/js/jquery-2.1.3.min.js"></script>
	
	<script>
		/*$(document).ready(
			function(){
				$('.updatedmsg').change(
					function(){
						//alert($('.updatedmsg').val());
					}
				);
			}
		);*/
	</script>
</head>
<body>
	<div ng-app="diaryapp" ng-controller="diarycontroller" >
		<form action="check.php" method="get">
			<textarea class="updatedmsg" x-webkit-speech ><?php echo $_GET['msg']; ?></textarea>
			<input type="button" ng-click="update()">
		</form>
		
		<script>
			var app = angular.module('diaryapp',[]);
			app.controller('diarycontroller',['$scope','$http','$window',function($scope,$http,$window){
				$scope.$apply();
				$scope.update = function(){
					$scope.$apply();
					var loc = 'http://localhost/ichang/msg_update.php?msg=' + $(".updatedmsg").val()+'&created='+<?php echo $_GET['created'] ?>;
					//alert(loc);
					$http.get(loc).success(function(vals){
						alert(vals);
					});
				}
			}]);
		</script>
	</div>
</body>
</html>