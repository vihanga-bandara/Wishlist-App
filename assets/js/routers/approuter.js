var app = app || {};

app.routers.AppRouter = Backbone.Router.extend({
	routes: {
		"": "home",
		"list": "viewList",
		"list/add": "addList",
		"list/update/:id": "updateList"
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
				reset: true,
				"url": url,
				wait: true,
				success: function (collection, response) {
					console.log("init");
					app.listView.render();
				}
			});
		} else if(app.addItemView){
			$(".container-add").html("");
			app.listView.render();
		}
		else{
			app.listView.render();
		}
	},

	addList: function () {
		if (!app.addItemView) {
			app.addItemView = new app.views.addItemView({model: new app.models.Item()});
			$(".container").html("");
			app.addItemView.render();


		} else {
			console.log("Not successful")
		}
	},
	updateList: function (e) {
		if (!app.updateItemView) {
			var collection = app.listView.collection;
			var existing_arr = collection.models;
			var newVal = existing_arr.find(function(el){
				return el.attributes.item_id == e;
			});

			app.updateItemView = new app.views.updateItemView ({model: newVal});
			// app.updateItemView = app.listView;
			app.updateItemView.render();
			}
		}

});
