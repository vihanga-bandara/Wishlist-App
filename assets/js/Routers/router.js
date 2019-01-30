var app = app || {};

app.routers.MainRouter = Backbone.Router.extend({
	routes: {
		"": "login",
		"create": "createList",
		"home": "viewHome",
		"home/add": "addList",
		"home/update/:id": "updateList",
		"home/delete": "deleteList",
		"share/:id": "sharedLink",
		// "share": "shareList",
	},
	login: function (e) {
		UserJson = JSON.parse(localStorage.getItem("UserJson"));
		if (UserJson == null) {
			app.user = new app.models.User();
			app.loginDisplay = new app.views.LoginView({
				model: app.user
			});
			app.loginDisplay.render();
		} else {
			app.user = UserJson;
			this.viewHome();
		}
	},
	viewHome: function () {
		UserJson = JSON.parse(localStorage.getItem("UserJson"));
		if (UserJson != null) {
			app.user = UserJson;
			//creation of collection
			app.viewHome = new app.views.HomeView({collection: new app.collections.ItemCollection()});
			var url = app.viewHome.collection.url;
			app.viewHome.collection.fetch({
				reset: true,
				"url": url,
				wait: true,
				success: function (collection, response) {
					console.log(response);
					if (app.user.attributes.user_list_name == "") {
						app.mainRouter.navigate("#create", {
							trigger: true,
							replace: true
						});
					} else {
						app.viewHome.collection.sort();
						app.viewHome.render(false);
					}
				},
				error: function (collection, xhr, options) {
					if (xhr.status == 404) {
						app.viewHome.render(true);
					}
				}
			});
		} else {
			this.login();
		}

	},
	createList: function (e) {
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
	sharedLink: function (id) {
		UserJson = JSON.parse(localStorage.getItem("UserJson"));
		if (UserJson != null ) {
			app.user = UserJson;
			var getUserUrl = "/wishlist-app/api/user/" + id;
			app.shareListView = new app.views.shareListView(
				{collection: new app.collections.ItemCollection(), model: new app.models.User()});
			app.shareListView.model.fetch({
				reset: true,
				"url": getUserUrl,
				wait: true,
				success: function (model, response) {
					console.log(response);
				}
			});

			var url = app.shareListView.collection.url + id;
			app.shareListView.collection.fetch({
				reset: true,
				"url": url,
				wait: true,
				success: function (collection, response) {
					app.shareListView.render();
				}
			});
		} else {
			this.login();
		}
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

function hideElement() {
	$(".container").hide();
	$(".container-create-list").hide();
	$(".container-add").hide();
	$(".container-share").hide();
	$(".container-update").hide();
	$(".container-main").hide();
}
