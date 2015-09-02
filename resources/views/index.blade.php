<!DOCTYPE html>
<html lang="en" ng-app="bananaApp">
<head>
	<meta charset="UTF-8">
	<title>Banana</title>
	<link rel="stylesheet" href="/static/css/vendor/bootstrap.min.css"/>
  <link rel="stylesheet" href="/static/css/haircvt.css"/>
	<script src="/static/js/vendor/angular.js"></script>
	<script src="/static/js/vendor/underscore-min.js"></script>
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
		<div class="row main-content text-left">
			<div class="col-xs-8" ng-controller="SweetyListCtrl">
				<table class="table table-bordered table-striped">
					<thead>
						<th>Name</th>
						<th>Type</th>
						<th>Price</th>
						<th>Buy</th>
					</thead>
					<tbody>
						<tr ng-repeat="sweet in sweeties">
							<td><% sweet.name %></td>
							<td><% sweet.type %></td>
							<td><% sweet.price %></td>
							<td><a href="#" class="btn btn-xs btn-primary" ng-click="addToBasket(sweet)">Add</a></td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="col-xs-4" ng-controller="BasketCtrl">
				<h3>Basket</h3>
				<table class="table table-bordered table-striped">
					<thead>
						<th>Service</th>
						<th>Price</th>
						<th>Quantity</th>
					</thead>
					<tbody>
						<tr ng-repeat="item in items">
							<td><% item.name %></td>
							<td><% item.price %></td>
							<td><% item.quantity %></td>
						</tr>
						<tr>
							<td><strong>Total</strong></td>
							<td>
								<span><strong><% basketService.total %></strong></span>
							</td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script src="/static/js/vendor/jquery-2.1.1.min.js"></script>
</body>
</html>
