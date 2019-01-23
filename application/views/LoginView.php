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
			<input type="text" placeholder="Enter Password" id="reg-password" class="ui-elem ui-elem-rpass --rtn"
				   required/>
			<input type="text" placeholder="Re-type Password" id="rpt-password" class="ui-elem ui-elem-rpass --rtn"
				   required/>
			<input type="text" placeholder="Enter Email" id="reg-email" class="ui-elem ui-elem-rpass --rtn" required/>
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

<script type = "text/template" id="list-template">
	<div id = "item" >

	</div>
</script>

<script type="text/template" id="item-template">
	<div class="card" style="width: 18rem;">
		<div class="card-body">
			<h5 class="card-title"><%=item_name%></h5>
			<h6 class="card-subtitle mb-2 text-muted">Rs.<%=item_price%></h6>
			<p class="card-text"><%=item_description%></p>
			<a href="<%=item_url%>" class="card-link">View</a>

		</div>
	</div>
</script>
<div class="container">

</div>
</body>
</html>
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
</style>


