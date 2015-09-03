<!DOCTYPE html>
<html lang="en" ng-app="bananaApp">
<head>
	<meta charset="UTF-8">
	<title>Banana</title>
	<link rel="stylesheet" href="/static/css/vendor/bootstrap.min.css"/>
  <link rel="stylesheet" href="/static/css/haircvt.css"/>

	<script src="/static/js/vendor/jquery-2.1.1.min.js"></script>
	<script src="/static/js/vendor/underscore.js"></script>
	<script src="/static/js/vendor/backbone.js"></script>
	<script src="/static/js/vendor/backbone.queryparams.js"></script>
	<script src="/static/js/app.js"></script>
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
		<div id="sweeties" class="row main-content text-left"></div>
	</div>

	<script id="sweety-template" type="text/template">
		<div class="col-xs-8">
			<select class="form-control select-filter">
				<% _.each(filters, function(filter) { %>
					<% var selected = (selectedFilter === filter) ? 'selected' : ''; %>
					<option value="<%= filter %>" <%= selected %>><%= filter %></option>
				<% }); %>
			</select>
		</div>
		<br/><br/>
		<div class="col-xs-8">
			<table class="table table-bordered table-striped">
				<thead>
					<th>Name</th>
					<th>Type</th>
					<th>Price</th>
					<th>Buy</th>
				</thead>
				<tbody>
					<% _.each(sweeties, function(sweet) { %>
					<tr ng-repeat="sweet in sweeties">
						<td><%= sweet.name %></td>
						<td><%= sweet.type %></td>
						<td><%= sweet.price %></td>
						<td><a href="" class="btn btn-xs btn-primary">Add</a></td>
					</tr>
					<% }); %>
				</tbody>
			</table>
		</div>
		<div class="col-xs-4" ng-controller="BasketCtrl">
			<table class="table table-bordered table-striped">
				<thead>
					<th>Service</th>
					<th>Price</th>
					<th>Quantity</th>
				</thead>
				<tbody>
					<% _.each(items, function(item) { %>
					<tr>
						<td><% item.name %></td>
						<td><% item.price %></td>
						<td><% item.quantity %></td>
					</tr>
					<% }); %>
					<tr>
						<td><strong>Total</strong></td>
						<td>
							<span><strong><%= formattedTotal %></strong></span>
						</td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
	</script>

</body>
</html>
