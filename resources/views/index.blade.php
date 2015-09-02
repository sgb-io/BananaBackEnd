<!DOCTYPE html>
<html lang="en" ng-app="bananaApp">
<head>
	<meta charset="UTF-8">
	<title>Banana</title>
	<link rel="stylesheet" href="/static/css/vendor/bootstrap.min.css"/>
  <link rel="stylesheet" href="/static/css/haircvt.css"/>
	<script src="/static/js/vendor/angular.js"></script>
	<script src="/static/js/controllers.js"></script>
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
		<div class="row main-content">
			<div class="col-xs-12" ng-controller="SweetyListCtrl">
				<ul>
					<li ng-repeat="sweet in sweeties">
						<span><% sweet.name %></span>
						<p><% sweet.type %> - <% sweet.price %></p>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<script src="/static/js/vendor/jquery-2.1.1.min.js"></script>
</body>
</html>
