<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<?php include("header.php"); ?>
	<link rel='stylesheet' href="../../../wishlist-app/assets/css/rwxgep.css">
	<link rel="stylesheet" href="../../../wishlist-app/assets/css/style.css">

	<style>
		.container {
			background-color: #9b59b6;
			max-width: 100%;
			padding-right: 0;
			padding-left: 0;
		}

		.wrap.--new {
			padding: 11% 0;
		}

		.wrap.--rtn {
			padding: 11% 0;
		}

		.select__list {
			top: 25%;
		}

		.pointer {
			left: 5rem;
		}

		.pointer.--new {
			right: 4rem;
			left: unset;
		}

		.banda-cust .form-control {
			height: 38px;
			font-size: 15px;
		}

		.banda-cust label {
			margin-bottom: 0 !important;
			font-size: 13px;
		}
	</style>
</head>
<body>

<script type="text/template" id="login-template">

	<div class="wrap --rtn">
		<form action="" method="" class="flex-form">
			<ul class="select__list">
				<li id="js-usr-new" class="select__label">Sign up</li>
				<li id="js-usr-rtn" class="select__label select__label--active">Sign In</li>
			</ul>
			<span class="pointer"></span>
			<!--Login-->
			<input type="text" placeholder="Username/Email" id="login-username" class="ui-elem ui-elem-email" required/>
			<input type="password" placeholder="Password" id="login-password" class="ui-elem ui-elem-pass" required/>
			<!--Register-->
			<input type="text" placeholder="Enter Username" id="reg-username" class="ui-elem ui-elem-rpass --rtn"
				   required/>
			<input type="password" placeholder="Enter Password" id="reg-password" class="ui-elem ui-elem-rpass --rtn"
				   required/>
			<input type="password" placeholder="Re-type Password" id="rpt-password" class="ui-elem ui-elem-rpass --rtn"
				   required/>
			<input type="email" placeholder="Enter Email" id="reg-email" class="ui-elem ui-elem-rpass --rtn" required/>
			<input type="text" placeholder="Enter List Name" id="list-name" class="ui-elem ui-elem-rpass --rtn"
				   required/>
			<input type="text" placeholder="Enter List Description" id="description" class="ui-elem ui-elem-rpass --rtn"
				   required/>
			<button id="js-btn" class="ui-button ui-login">Log In</button>
			<button id="js-btn-register" class="ui-button ui-register">Register</button>
		</form>
	</div>
	<script src="../../../wishlist-app/assets/js/index.js"></script>
</script>


<script ></script>


<script type="text/template" id="list-template">
	<div class="row">
		<div id="item">
			<table class="pure-table">
				<thead>
				<tr>
					<th>Item Id</th>
					<th>Item Name</th>
					<th>Item Price</th>
					<th>Item Description</th>
					<th>Item Priority</th>
					<th>#</th>
					<th>#</th>
				</tr>
				</thead>

			</table>
		</div>

	</div>

	<button id="btn-add-item" class="ui-button">Add Item</a></button>
</script>

<script type="text/template" id="add-item-template">
	<div class="row">
		<div class="col-md-6 offset-md-3 banda-cust">
			<form>
				<div class="form-group">
					<label for='ItemName'> Name of Item </label>
					<input type='text' class='form-control text-left' name='item_name' id='item_name'/>
				</div>

				<div class="form-group">
					<label for='ItemUrl'> URL of Item </label>
					<input type='text' class='form-control text-left' name='item_url' id='item_url'/>
				</div>

				<div class="form-group">
					<label for='ItemPrice'> Price of Item </label>
					<input type='number' class='form-control text-left' name='item_price' id='item_price'/>
				</div>

				<div class="form-group">
					<label for='ItemDescription'> Item Description </label>
					<textarea class="form-control text-left" id='item_description' name='item_description' rows="3"></textarea>
				</div>

				<div class="form-group">
					<label for='ItemPriority'> Priority of Item </label>
					<select class='form-control text-left' id="item_priority">
						<option selected="selected">Select Priority</option>
						<option value="1">Must Have</option>
						<option value="2">Would be Nice to Have</option>
						<option value="3">If You Can</option>
					</select>
				</div>
				<div class="form-group">
					<button id="js-btn-add" class='form-control btn btn-primary' value="add item">Add Item</a></button>
				</div>
			</form>
		</div>
	</div>

</script>

<script type="text/template" id="item-template">
	<table>
		<tbody>
		<tr>
			<td><%=item_id%></td>
			<td><%=item_name%></td>
			<td><%=item_price%></td>
			<td><%=item_description%></td>
			<td><%=item_priority%></td>
			<td><a href="<%=item_url%>" class="card-link">View</a></td>
			<td>
				<button id="js-btn-edit" class="btn btn-primary">Edit</button>
				<button id="js-btn-delete" class="btn btn-danger">Delete</button>
			</td>
		</tr>
		</tbody>
	</table>
</script>

<div class="container"></div>

<div class="container-add"></div>

<div class="container-update"></div>

<div class="container-delete"></div>


</body>
</html>



