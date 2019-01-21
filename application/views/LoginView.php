<!DOCTYPE html>
<html lang="en" >
<?php include("header.php"); ?>
<body>

<link rel='stylesheet' href="../../../wishlist-app/assets/css/rwxgep.css">

<link rel="stylesheet" href="../../../wishlist-app/assets/css/style.css">

<div class="wrap --rtn">
	<form action="" method="" class="flex-form">
		<ul class="select__list">
			<li id="js-usr-new" class="select__label">Sign up</li>
			<li id="js-usr-rtn" class="select__label select__label--active">Sign In</li>
		</ul>
		<span class="pointer"></span>
		<input type="email" placeholder="Email" class="ui-elem ui-elem-email" required/>
		<input type="password" placeholder="Password" class="ui-elem ui-elem-pass" required/>
<!--		<input type="password" placeholder="Repeat Password" class="ui-elem ui-elem-rpass --rtn" />-->
		<input type="text" placeholder="List Name" class="ui-elem ui-elem-rpass --rtn" required/>
		<input type="text" placeholder="List Description" class="ui-elem ui-elem-rpass --rtn" required/>
		<input type="listdescription" placeholder="List Description" class="ui-elem ui-elem-rpass --rtn" required/>
		<button id="js-btn" class="ui-button">Log In</button>
	</form>
</div>

<script  src="../../../wishlist-app/assets/js/index.js"></script>

</body>

</html>
