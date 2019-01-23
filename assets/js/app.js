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
	if (!user.name|| !user.password) { return false; }
	return user;
}
function validateRegisterForm() {
	var user = {
		'name': $("#reg-username").val(),
		'password': $("#reg-password").val(),
		'rpt_password': $("#rpt-password").val(),
		'listName': $("#list-name").val(),
		'listDescription': $("#description").val(),
	};
	if (!user.name|| !user.password) {return false; }
	return user;
}
$(document).ready(function() {
	app.appRouter = new app.routers.AppRouter();
	$(function () {
		Backbone.history.start();
	});
});
