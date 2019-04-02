<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="<?php echo 'build/app.css'; ?>"> <!--  //-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

	<script src="<?php echo 'build/app.js'; ?>"></script> <!--  //-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<!--[if lt IE 9]>
    	<script src="/js/html5shiv.js"></script>
	<![endif]-->

	<style type="text/css">
		a:hover {
			text-decoration: none;
		}

		h1, h2, h3, h4, h5, h6 {
			margin: 0;
			padding: 0;
		}

		body {
			padding: 20px 0 20px 0;
			background-color: #F8F9F9;
		}

		#header {
			padding-top: 4px;
			padding-bottom: 4px;
			background-color: #EBF5FB;

			border-style: solid;
			border-color: #E8E8E8;
			border-width: 0 0 1px 0;
		}

		#content {
			background-color: #FBFCFC;
			border-style: solid;
			border-color: #E8E8E8;
			border-width: 1px;
			border-radius: 4px;
		}
		
		#products, #categories, #sub-categories {
			min-width: 200px;
			min-height: 200px;
			
			border-style: solid;
			border-color: #F0F0F0;
			border-width: 1px;
			border-radius: 4px;
		}

		#footer {
			background-color: #FFFFFF;
		}
	</style>

	<title>Fitness App</title>
</head>
<body>

<?php
	$products = false;
	$categories = false;
	$subCategories = false;
?>

	<div class="container" id="content">
		<div class="row" id="header">
			<div class="col-lg-4 offset-lg-4 col-md-4 offset-md-4 text-center">
				<h4>Fitness App</h4>
			</div>
		</div>

		<br />

		<div class="row">
			<div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 text-center">
				<h5>Products</h5>

				<div id="products">
					<?php if ($products) { ?>
						<select id="products-list" multiple>
							<?php foreach($products as $value) { ?>
								<option value="">$value</option>
							<?php } // endloop ?>
						</select>
					<?php } else { ?>
						<br />

						<span>No Records</span>
					<?php } //endif ?>
				</div>

				<div class="text-right">
					<button type="button" class="add btn btn-sm btn-info" id="products-add">Add</button>
					<button type="button" class="edit btn btn-sm btn-primary" id="products-edit">Edit</button>
					<button type="button" class="delete btn btn-sm btn-secondary" id="products-delete">Delete</button>
				</div>
			</div>
		</div>

		<br />
		<br />

		<div class="row">
			<div class="col-lg-3 offset-md-3 col-md-3 offset-md-3 text-center">
				<h5>Categories</h5>

				<div id="categories">
					<?php if ($categories) { ?>
						<select id="categories-list" multiple>
							<?php foreach($categories as $value) { ?>
								<option value="">$value</option>
							<?php } // endloop ?>
						</select>
					<?php } else { ?>
						<br />

						<span>No Records</span>
					<?php } //endif ?>
				</div>

				<div class="text-right">
					<button type="button" class="add btn btn-sm btn-info" id="categories-add">Add</button>
					<button type="button" class="edit btn btn-sm btn-primary" id="categories-edit">Edit</button>
					<button type="button" class="delete btn btn-sm btn-secondary" id="categories-delete">Delete</button>
				</div>
			</div>

			<div class="col-lg-3 col-md-3 text-center">
				<h5>Sub Categories</h5>

				<div id="sub-categories">
					<?php if ($subCategories) { ?>
						<select id="subcategories-list" multiple>
							<?php foreach($subcategories as $value) { ?>
								<option value="">$value</option>
							<?php } // endloop ?>
						</select>
					<?php } else { ?>
						<br />

						<span>No Records</span>
					<?php } //endif ?>
				</div>

				<div class="text-right">
					<button type="button" class="add btn btn-sm btn-info" id="subcategories-add">Add</button>
					<button type="button" class="edit btn btn-sm btn-primary" id="subcategories-edit">Edit</button>
					<button type="button" class="delete btn btn-sm btn-secondary" id="subcategories-delete">Delete</button>
				</div>
			</div>
		</div>

		<br />

		<div id="footer">
			<div class="col-lg-4 offset-lg-4 col-md-4 offset-md-4 text-center">
				&nbsp;
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function confirmDelete(method, action, data) {
			var x = confirm('Are You Sure?');
			if (x == true) {
				makeAjaxRequest(method, action, data);
			} else {
				console.log('test');
			}
		}

		function makeAjaxRequest(method, action, data) {
			console.log(method);
			console.log(action);
			console.log(data);

			/*
			$.ajax({
				type: 'post',
				url: method + '/' + action,
				data: data,
				dataType: json,
				// contentType: json,
				success: function(result) {
					console.log(result);
				},
				error: function(result) {
					console.log(result);
				}
			});
			*/
		}

		$(document).ready(function() {
			$(".add, .edit, .delete").click(function() {
				var method = $(this).attr('id').split('-')[0];
				var action = $(this).attr('id').split('-')[1];

				switch (action) {
					case 'add':
						makeAjaxRequest(method, action, {});
						break;

					case 'edit':
					case 'delete':
						if ($(method + '-list').val() !== undefined) {
							data = {"id": $(method + '-list').val()};
							makeAjaxRequest(method, action, data);
						} else {
							alert('Please select an item to ' + action + '.');
						}
						break;
				}
			});
		});
	</script>

</body>
</html>