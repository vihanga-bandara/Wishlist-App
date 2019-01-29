var app = app || {};

app.routers.MainRouter = Backbone.Router.extend({
	routes: {
		"": "login",
		"create":"createList",
		"home": "viewHome",
		"home/add": "addList",
		"home/update/:id": "updateList",
		"home/delete": "deleteList",
		"share": "shareList",
	},
	login: function () {
		app.user = new app.models.User();
		app.loginDisplay = new app.views.LoginView({
			model: app.user
		});
		app.loginDisplay.render();
	},
	viewHome: function () {
		//creation of collection
		app.viewHome = new app.views.HomeView({collection: new app.collections.ItemCollection()});
		var url = app.viewHome.collection.url;
		app.viewHome.collection.fetch({
			reset: true,
			"url": url,
			wait: true,
			success: function(collection, response) {
				console.log(response);
				if(app.user.attributes.user_list_name == ""){
					app.mainRouter.navigate("#create", {
						trigger: true,
						replace: true
					});
				} else {
					app.viewHome.render(false);
				}
			},
			error: function(collection,xhr,options) {
				if(xhr.status==404){
					app.listView.render(true);
				}
			}
		});
	},
	createList: function(e){
		app.createListView = new app.views.CreateListView({model: app.user});
		app.createListView.render();
	},
	addList: function (e) {
		if (!app.addItemView) {
			app.addItemView = new app.views.addItemView({
				model: new app.models.Item()
			});
			cleanHTML();
			app.addItemView.render();


		} else if (app.addItemView) {
			cleanHTML();
			app.addItemView.render();
		}
	},
	updateList: function (e) {
		if (!app.updateItemView) {
			var collection = app.viewHome.collection;
			var existing_arr = collection.models;
			var newVal = existing_arr.find(function (el) {
				return el.attributes.item_id == e;
			});
			app.updateItemView = new app.views.updateItemView({
				model: newVal
			});
			// app.updateItemView = app.listView;
			cleanHTML();
			app.updateItemView.render();
		} else if (app.updateItemView) {
			cleanHTML();
			app.updateItemView.render();
		}
	},
	shareList: function (e) {

		app.shareListView = new app.views.shareListView({
			collection: new app.collections.ItemCollection()
		});
		var url = app.shareListView.collection.url
		app.shareListView.collection.fetch({
			reset: true,
			"url": url,
			wait: true,
			success: function (collection, response) {
				cleanHTML();
				app.shareListView.render();
				$("#show_url").hide();
			}
		});
	}

});

function cleanHTML() {
	$(".container-add").html("");
	$(".container-update").html("");
	$(".container").html("");
	$(".container-main").html("");
	$(".container-share").html("");
	$(".container-create-list").html("");
}
