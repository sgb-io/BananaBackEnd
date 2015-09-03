<!DOCTYPE html>
<html lang="en" ng-app="bananaApp">
<head>
	<meta charset="UTF-8">
	<title>Banana</title>
	<link rel="stylesheet" href="/static/css/vendor/bootstrap.min.css"/>
  <link rel="stylesheet" href="/static/css/haircvt.css"/>
	<script src="/static/js/vendor/angular.js"></script>
	<script src="/static/js/vendor/angular-route.js"></script>
	<script src="/static/js/vendor/underscore-min.js"></script>
	<script src="/static/js/controllers.js"></script>
	<base href="/"/>
</head>
<body>

	<div class="container-fluid header">
		<nav class="navbar navbar-default">
			<div class="navbar-header">
				<a class="navbar-brand" href="">
					<img src="/static/img/logo.png" alt="HAIRCVT"/>
				</a>
			</div>
		</nav>
	</div>

	<div class="container">
		<div class="row main-content text-left">
			<div class="col-xs-8">
				<h3>Filter</h3>
			</div>
			<div class="col-xs-4">
				<h3>Basket</h3>
			</div>
		</div>

		<div ng-view></div>
	</div>

	<script src="/static/js/vendor/jquery-2.1.1.min.js"></script>
</body>
</html>
