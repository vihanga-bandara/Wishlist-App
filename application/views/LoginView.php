<!doctype html>
<html lang="en">
<?php include("header.php"); ?>
<style>
	.container {
		/*background-color: #9b59b6;*/
		max-width: 100%;
		padding-right: 0;
		padding-left: 0;
		margin-top: -24px;
		height: 100%;
	}

	.banda-style {
		border: 1px solid #ccc;
	}

	/*.banda-cust .form-control {*/
	/*height: 38px;*/
	/*font-size: 15px;*/
	/*}*/

	/*.banda-cust label {*/
	/*margin-bottom: 0 !important;*/
	/*font-size: 13px;*/
	/*}*/

	body {
		font-family: "Poppins", sans-serif;
		height: 100vh;
	}

	a {
		color: #92badd;
		display: inline-block;
		text-decoration: none;
		font-weight: 400;
	}

	h2 {
		text-align: center;
		font-size: 16px;
		font-weight: 600;
		text-transform: uppercase;
		display: inline-block;
		margin: 40px 8px 10px 8px;
		color: #cccccc;
	}

	.wrapper {
		display: flex;
		align-items: center;
		flex-direction: column;
		justify-content: center;
		width: 100%;
		min-height: 100%;
		padding: 20px;
	}

	#formContent {
		-webkit-border-radius: 10px 10px 10px 10px;
		border-radius: 10px 10px 10px 10px;
		background: #fff;
		padding: 30px;
		width: 90%;
		max-width: 450px;
		position: relative;
		padding: 0px;
		-webkit-box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
		box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
		text-align: center;
	}

	#formFooter {
		background-color: #f6f6f6;
		border-top: 1px solid #dce8f1;
		padding: 25px;
		text-align: center;
		-webkit-border-radius: 0 0 10px 10px;
		border-radius: 0 0 10px 10px;
	}

	h2.inactive {
		color: #cccccc;
	}

	h2.active {
		color: #0d0d0d;
		border-bottom: 2px solid #5fbae9;
	}

	/* FORM TYPOGRAPHY*/

	input[type=button], input[type=submit], input[type=reset] {
		background-color: #56baed;
		border: none;
		color: white;
		padding: 15px 80px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		text-transform: uppercase;
		font-size: 13px;
		-webkit-box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
		box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
		-webkit-border-radius: 5px 5px 5px 5px;
		border-radius: 5px 5px 5px 5px;
		margin: 5px 20px 40px 20px;
		-webkit-transition: all 0.3s ease-in-out;
		-moz-transition: all 0.3s ease-in-out;
		-ms-transition: all 0.3s ease-in-out;
		-o-transition: all 0.3s ease-in-out;
		transition: all 0.3s ease-in-out;
	}

	input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover {
		background-color: #39ace7;
	}

	input[type=button]:active, input[type=submit]:active, input[type=reset]:active {
		-moz-transform: scale(0.95);
		-webkit-transform: scale(0.95);
		-o-transform: scale(0.95);
		-ms-transform: scale(0.95);
		transform: scale(0.95);
	}

	input[type=text], input[type=password], input[type=email] {
		background-color: #f6f6f6;
		border: none;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 5px;
		width: 85%;
		border: 2px solid #f6f6f6;
		-webkit-transition: all 0.5s ease-in-out;
		-moz-transition: all 0.5s ease-in-out;
		-ms-transition: all 0.5s ease-in-out;
		-o-transition: all 0.5s ease-in-out;
		transition: all 0.5s ease-in-out;
		-webkit-border-radius: 5px 5px 5px 5px;
		border-radius: 5px 5px 5px 5px;
	}

	input[type=text]:focus, input[type=password]:focus, input[type=email]:focus {
		background-color: #fff;
		border-bottom: 2px solid #5fbae9;
	}

	input[type=text]::placeholder, input[type=password]::placeholder, input[type=email]::placeholder {
		color: #cccccc;
	}

	/* ANIMATIONS */

	/* Simple CSS3 Fade-in-down Animation */
	.fadeInDown {
		-webkit-animation-name: fadeInDown;
		animation-name: fadeInDown;
		-webkit-animation-duration: 1s;
		animation-duration: 1s;
		-webkit-animation-fill-mode: both;
		animation-fill-mode: both;
	}

	@-webkit-keyframes fadeInDown {
		0% {
			opacity: 0;
			-webkit-transform: translate3d(0, -100%, 0);
			transform: translate3d(0, -100%, 0);
		}
		100% {
			opacity: 1;
			-webkit-transform: none;
			transform: none;
		}
	}

	@keyframes fadeInDown {
		0% {
			opacity: 0;
			-webkit-transform: translate3d(0, -100%, 0);
			transform: translate3d(0, -100%, 0);
		}
		100% {
			opacity: 1;
			-webkit-transform: none;
			transform: none;
		}
	}

	/* Simple CSS3 Fade-in Animation */
	@-webkit-keyframes fadeIn {
		from {
			opacity: 0;
		}
		to {
			opacity: 1;
		}
	}

	@-moz-keyframes fadeIn {
		from {
			opacity: 0;
		}
		to {
			opacity: 1;
		}
	}

	@keyframes fadeIn {
		from {
			opacity: 0;
		}
		to {
			opacity: 1;
		}
	}

	.fadeIn {
		opacity: 0;
		-webkit-animation: fadeIn ease-in 1;
		-moz-animation: fadeIn ease-in 1;
		animation: fadeIn ease-in 1;

		-webkit-animation-fill-mode: forwards;
		-moz-animation-fill-mode: forwards;
		animation-fill-mode: forwards;

		-webkit-animation-duration: 1s;
		-moz-animation-duration: 1s;
		animation-duration: 1s;
	}

	.fadeIn.first {
		-webkit-animation-delay: 0.4s;
		-moz-animation-delay: 0.4s;
		animation-delay: 0.4s;
	}

	.fadeIn.second {
		-webkit-animation-delay: 0.6s;
		-moz-animation-delay: 0.6s;
		animation-delay: 0.6s;
	}

	.fadeIn.third {
		-webkit-animation-delay: 0.8s;
		-moz-animation-delay: 0.8s;
		animation-delay: 0.8s;
	}

	.fadeIn.fourth {
		-webkit-animation-delay: 1s;
		-moz-animation-delay: 1s;
		animation-delay: 1s;
	}

	/* Simple CSS3 Fade-in Animation */
	.underlineHover:after {
		display: block;
		left: 0;
		bottom: -10px;
		width: 0;
		height: 2px;
		background-color: #56baed;
		content: "";
		transition: width 0.2s;
	}

	.underlineHover:hover {
		color: #0d0d0d;
	}

	.underlineHover:hover:after {
		width: 100%;
	}

	h1 {
		color: #60a0ff;
	}

	/* OTHERS */

	*:focus {
		outline: none;
	}

	#icon {
		width: 30%;
	}

	.custab {
		margin: 10px 0 !important;
	}

	.show-url {
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
	}

	.pad-give {
		padding: 0 5px !important;
		margin-bottom: 5px;
	}

	.tab-head {
		border-top: 1px solid #dbd3d3;
		border-bottom: 1px solid #dbd3d3;
		font-weight: 600;
		padding: 5px 0;
		margin: 6px 0;
	}
</style>

<body>

<script type="text/template" class="login-temp" id="login-template">
	<div class="wrapper" id="lig">
		<div id="formContent">

			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#user-login-form" role="tab"
					   aria-controls="home"
					   aria-selected="true">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#user-register-form" role="tab"
					   aria-controls="profile" aria-selected="false">Sign up</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="user-login-form" role="tabpanel" aria-labelledby="home-tab">
					<!-- Tabs Titles -->
					<h2>
						<!-- Icon -->
						<div class="fadeIn first">
							<h1 style="margin: 15px 0; font-size: 25px;">LOGIN</h1>
						</div>
						<!-- Login Form -->
						<form>
							<input type="text" id="login-username" placeholder="username">
							<input type="password" id="login-password" placeholder="password">
							<input type="submit" class="fadeIn fourth loginButton" id="js-btn" value="Login">
						</form>
						<!-- Remind Passowrd -->
						<div id="formFooter">
							<span id="errorsTab" style="color:red;font-size: small;"></span>
						</div>

				</div>
				<div class="tab-pane fade" id="user-register-form" role="tabpanel" aria-labelledby="profile-tab">
					<!-- Tabs Titles -->
					<h2>

						<!-- Icon -->
						<div class="fadeIn first">
							<h1 style="margin: 15px 0; font-size: 25px;">REGISTRATION</h1>
						</div>

						<!-- Login Form -->
						<form>
							<input type="text" id="reg-username" placeholder="Enter Username">
							<input type="password" id="reg-password" placeholder="Enter Password">
							<input type="password" id="rpt-password" placeholder="Re-type Password">
							<input type="email" id="reg-email" placeholder="Enter your email">
							<input type="text" id="list-name" placeholder="Enter your list name">
							<input type="text" id="description" placeholder="Enter your list description">
							<input type="submit" class="fadeIn fourth registerButton" id="js-btn-register"
								   value="Register">
						</form>

						<!-- Remind Passowrd -->
						<div id="formFooter">
							<span id="errorsTabReg" style="color:red;font-size: small;"></span>
						</div>
				</div>
			</div>
		</div>
	</div>
</script>

<script type="text/template" class="login-temp" id="create-list-template">
	<div class="wrapper" id="lig">
		<div id="formContent">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="user-login-form" role="tabpanel" aria-labelledby="home-tab">

					<div class="fadeIn first">
						<h1 style="margin: 15px 0; font-size: 25px;">Create your List</h1>
					</div>
					<!-- Login Form -->
					<form>
						<input type="text" id="create-list-name" placeholder="Enter list name">
						<input type="text" id="create-list-desc" placeholder="Enter list description">
						<input type="submit" class="fadeIn fourth loginButton" id="create-list-btn" value="Create">
					</form>
					<!-- Remind Passowrd -->
					<div id="formFooter">
						<span id="createListErrorsTab" style="color:red;font-size: small;"></span>
					</div>

				</div>
			</div>
		</div>
	</div>
</script>

<script type="text/template" id="list-template">

	<br>
	<div style="text-align: center">
		<h1><%=user_list_name%></h1>
		<h2><%=user_list_description%></h2>
	</div>
	<h1 id="#no-items"></h1>
	<div id="item_position">
		<button id="btn-add-item" class="btn btn-success btn-xs pull-right" style="margin-left: 9px;">Add Item</button>
		<button id="btn-share-list" class="btn btn-primary btn-xs pull-right">Go to Share List</button>
		<button id="btn-view-list" class="btn btn-primary btn-xs pull-right">Get Share Link</button>
		<button id="btn-logout" class="btn btn-danger btn-xs pull-right" style="text-align: right">Logout</button>

		<div class="row no-gutters tab-head">
			<div class="col-md-12">
				<div class="row no-gutters">
					<div class="col-md-1 pad-give">ID</div>
					<div class="col-md-2 pad-give">Name</div>
					<div class="col-md-1 pad-give">price</div>
					<div class="col-md-3 pad-give">Url</div>
					<div class="col-md-2 pad-give">Item Priority</div>
					<div class="col-md-2 pad-give"></div>
				</div>
			</div>
		</div>

	</div>

</script>

<script type="text/template" id="list-template-share">

	<div id="placing">
		<button id="go-back" class="btn btn-primary">Go back</button>
		<button id="btn-copy-link" class="btn btn-success">Copy Link to clipboard</button>
		<span id="show_url"></span>

		<div class="row no-gutters tab-head">
			<div class="col-md-12">
				<div class="row no-gutters">
					<div class="col-md-1 pad-give">ID</div>
					<div class="col-md-2 pad-give">Name</div>
					<div class="col-md-1 pad-give">price</div>
					<div class="col-md-3 pad-give">Url</div>
					<div class="col-md-2 pad-give">Item Priority</div>
				</div>
			</div>
		</div>
	</div>

</script>

<script type="text/template" id="add-item-template">
	<div class="row">
		<div class="col-md-6 offset-md-3 banda-cust">
			<form>
				<div class="form-group">
					<label for='ItemName'><h1>Add an Item</h1></label> <br>
				</div>
				<div class="form-group">
					<label for='ItemName'> Name of Item </label> <br>
					<input type='text' class='form-control text-left banda-style' name='item_name' id='item_name'/>
				</div>

				<div class="form-group">
					<label for='ItemUrl'> URL of Item </label><br>
					<input type='text' class='form-control text-left banda-style' name='item_url' id='item_url'/>
				</div>

				<div class="form-group">
					<label for='ItemPrice'> Price of Item (LKR) </label>
					<input type='number' class='form-control text-left' name='item_price' id='item_price'/>
				</div>

				<div class="form-group">
					<label for='ItemDescription'> Item Description </label>
					<textarea class="form-control text-left" id='item_description' name='item_description'
							  rows="3"></textarea>
				</div>

				<div class="form-group">
					<label for='ItemPriority'> Priority of Item </label>
					<select class='form-control text-left' id="item_priority">
						<option selected="selected" value="1">Must Have</option>
						<option value="2">Would be Nice to Have</option>
						<option value="3">If You Can</option>
					</select>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<button id="js-btn-add" class='form-control btn btn-primary' value="add item">Add
									Item
								</button>
							</div>
							<div class="col-md-6">
								<button id="js-btn-back" class='form-control btn btn-primary' value="go back">Go
									Back
								</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</script>

<script type="text/template" id="update-item-template">
	<div class="row">
		<div class="col-md-6 offset-md-3 banda-cust">
			<form>
				<div class="form-group">
					<label for='ItemName'><h1>Update an Item</h1></label> <br>
					<label for='ItemName'>Item Id : <%=item_id%></label> <br><br>
					<label for='ItemName'> Name of Item </label> <br>
					<input type='text' class='form-control text-left' value="<%=item_name%>" name='item_name'
						   id='item_name'/>
				</div>

				<div class="form-group">
					<label for='ItemUrl'> URL of Item </label> <br>
					<input type='text' class='form-control text-left' value="<%=item_url%>" name='item_url'
						   id='item_url'/>
				</div>

				<div class="form-group">
					<label for='ItemPrice'> Price of Item (LKR) </label>
					<input type='number' class='form-control text-left' value="<%=item_price%>" name='item_price'
						   id='item_price'/>
				</div>

				<div class="form-group">
					<label for='ItemDescription'> Item Description </label>
					<textarea class="form-control text-left" id='item_description' value="<%=item_description%>"
							  name='item_description' rows="3"><%=item_description%></textarea>
				</div>

				<div class="form-group">
					<br>
					<label for='Selected Value'>Previous Priority of Item : <%if(item_priority =='1'){%>
						Must Have
						<%}else if(item_priority =='2'){%>
						Would be Nice to Have
						<%}else{%>
						Not needed<%}%></label><br>
					<label for='ItemPriority'> Select Priority </label>

					<select class='form-control text-left' id="item_priority">
						<option selected="selected" value="<%=item_priority%>"><%if(item_priority =='1'){%>
							Must Have
							<%}else if(item_priority =='2'){%>
							Would be Nice to Have
							<%}else{%>
							Not needed<%}%>
						</option>
						<option value="1">Must Have</option>
						<option value="2">Would be Nice to Have</option>
						<option value="3">If You Can</option>
					</select>
				</div>
				<div class="form-group">
					<button id="js-btn-add" class='btn btn-success' value="add item">Add Item</a></button>
					<button id="go-back" class=' btn btn-primary' value="Go Back">Go Back</a></button>
				</div>
			</form>
		</div>
	</div>

</script>

<script type="text/template" id="item-template">
	<div class="row mar">
		<div class="col-md-12 custyle">

			<div class="row no-gutters">
				<div class="col-md-1 pad-give"><%=item_id%></div>
				<div class="col-md-2 pad-give"><%=item_name%></div>
				<div class="col-md-1 pad-give">Rs.<%=item_price%></div>
				<div class="col-md-3 pad-give show-url"><a href="<%=item_url%>" target="_blank"><%=item_url%></a></div>
				<div class="col-md-2 pad-give"><%if(item_priority =='1'){%>
					Must Have
					<%}else if(item_priority =='2'){%>
					Would be Nice to Have
					<%}else{%>
					Not needed<%}%>
				</div>
				<div class="col-md-2 pad-give text-right">
					<button class='btn btn-info btn-xs' value="<%=item_id%>" id="btn-update-item">
						<span class="glyphicon glyphicon-edit"></span> Edit
					</button>
					<button class="btn btn-danger btn-xs" value="<%=item_id%>" id="btn-delete-item">
						<span class="glyphicon glyphicon-remove "></span> Delete
					</button>
				</div>

			</div>
		</div>
	</div>

</script>

<script type="text/template" id="error-template">
	<span></span>
</script>

<script type="text/template" id="item-template-share">
	<div class="row mar">
		<div class="col-md-12 custyle">
			<div class="row no-gutters">
				<div class="col-md-1 pad-give"><%=item_id%></div>
				<div class="col-md-2 pad-give"><%=item_name%></div>
				<div class="col-md-1 pad-give">Rs.<%=item_price%></div>
				<div class="col-md-3 pad-give show-url"><a href="<%=item_url%>" target="_blank"><%=item_url%></a></div>
				<div class="col-md-2 pad-give"><%if(item_priority =='1'){%>
					Must Have
					<%}else if(item_priority =='2'){%>
					Would be Nice to Have
					<%}else{%>
					Not needed<%}%>
				</div>
			</div>
		</div>
	</div>
</script>

<div class="container"></div>

<div class="container-create-list" style="margin:9%;"></div>

<div class="container-main" style="margin: 5%;"></div>

<div class="container-add"></div>

<div class="container-update" style="margin:-2%;"></div>

<div class="container-share" style="margin: 5%;"></div>


</body>
</html>



