var app = app || {};

app.routers.AppRouter = Backbone.Router.extend({
	routes: {
		"": "home",
		"list": "viewList",
		"add": "addList"
	},

	home: function () {
		if (!app.loginView) {
			app.user = new app.models.User();
			app.loginView = new app.views.LoginFormView({model: app.user});
			app.loginView.render();
		} else {
			console.log("already logged");
			app.listView = new app.views.ListView({model: new app.collections.ItemCollection()});
			app.listView.render();
		}
	},

	viewList: function () {
		if (!app.listView) {
			app.listView = new app.views.ListView({collection: new app.collections.ItemCollection()});
			var url = app.listView.collection.url
			app.listView.collection.fetch({
				reset:true,
				"url": url,
				wait:true,
				success: function (collection, response) {
					console.log("init");
					app.listView.render();

				}
			});

		}
	},

	addList: function () {
		if (!app.listView) {
			app.listView = new app.views.ListView({collection: new app.collections.ItemCollection()});
			var url = app.listView.collection.url
			app.listView.collection.save({
				reset:true,
				"url": url,
				wait:true,
				success: function (collection, response) {
					console.log("init");
					app.listView.render();

				}
			});

		}
	}

});
