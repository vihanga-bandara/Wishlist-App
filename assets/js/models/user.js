var app = app || {};
app.models.User = Backbone.Model.extend({
	urlRoot: '/wishlist-app/api/user/',
	defaults: {
		name: "",
		password: "",
		user_id: null,
		list_name: "",
		list_description: ""
	},
	url: '/wishlist-app/api/user/',
});
