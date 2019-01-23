var app = app || {};
app.views = {};
app.routers = {};
app.models = {};
app.collections = {};

function validateLoginForm() {
	var user = {
		'name': $("#login-username").val(),
		'password': $("#login-password").val()
	};
	if (!user.name || !user.password) {
		return false;
	}
	return user;
}

function validateRegisterForm() {
	var user = {
		'name': $("#reg-username").val(),
		'password': $("#reg-password").val(),
		'rpt_password': $("#rpt-password").val(),
		'email': $("#reg-email").val(),
		'listName': $("#list-name").val(),
		'listDescription': $("#description").val(),
	};
	//check for password and repeat password
	if ((!user.name || !user.password) && (user.password != user.rpt_password)) {
		return false;
	}
	return user;
}

function validateAddForm() {
	var item = {
		'item_name': $("#item_name").val(),
		'item_url': $("#item_url").val(),
		'item_price': $("#item_price").val(),
		'item_description': $("#item_description").val(),
		'item_priority': $("#item_priority").val(),
	};
	return item;
}

$(document).ready(function () {
	app.appRouter = new app.routers.AppRouter();
	$(function () {
		Backbone.history.start();
	});
});
