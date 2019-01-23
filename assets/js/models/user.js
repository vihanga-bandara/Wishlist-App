var app = app || {};
app.models.User = Backbone.Model.extend({
	urlRoot: '/wishlist-app/api/user/',
	defaults: {
		name: "",
		password: "",
		user_id: null,
		email: "",
		listName: "",
		listDescription: "",
		error: "",
		message: "",
		status: "",
	},
	url: '/wishlist-app/api/user/',
});
