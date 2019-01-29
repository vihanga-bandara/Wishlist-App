var app = app || {};

app.models.User = Backbone.Model.extend({
    urlRoot: "/wishlist-app/api/user/",
    url: "/wishlist-app/api/user/",
	defaults: {
        "user_id":"",
		"user_name": "",
        "user_email": "",
        "user_list_name": "",
        "user_list_description": "",
	}
});