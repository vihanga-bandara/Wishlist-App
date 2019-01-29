var app = app || {};

app.views.HomeView = Backbone.View.extend({
	el: ".container-main",

	render: function (empty) {
		console.log("rendering");
		template = _.template($('#list-template').html());
		this.$el.html(template(app.user.attributes));
		$(".container").hide();
		$(".container-create-list").hide();
		$(".container-add").hide();
		$(".container-share").hide();
		$(".container-update").hide();
		$(".container-main").show();
		if (empty) {
			$("#no-items").show();
		} else {
			$("#no-items").hide();
		}
		this.collection.each(function (item) {
			var itemView = new app.views.ItemView({
				model: item
			});
			itemView.render();
		});
	},
	initialize: function () {
		// if(app.viewHome){
		//     this.listenTo(app.viewHome.collection, 'add', this.onItemAdded);
		//     this.listenTo(app.viewHome.collection, 'remove', this.onItemDeleted);
		// }
	},
	onItemAdded: function () {
		alert("Item added");
	},
	onItemDeleted: function () {
		alert("Item deleted");
	},
	events: {
		"click #btn-add-item": "add_item",
		"click #btn-update-item": "update_item",
		"click #btn-delete-item": "delete_item",
		"click #btn-share-list": "share_list",
		"click #btn-view-list": "view_list_link",
		"click #btn-logout": "logout",
	},
	add_item: function (e) {
		e.preventDefault();
		e.stopPropagation();
		if (!app.addItemView) {
			app.mainRouter.navigate("#home/add", {
				trigger: true,
				replace: true
			});
		} else {
			app.mainRouter.navigate("#home/add", {
				trigger: true,
				replace: true
			});
		}

	},
	update_item: function (e) {
		e.preventDefault();
		e.stopPropagation();
		var id = $(e.currentTarget).val();
		if (!app.updateItemView) {
			app.mainRouter.navigate("#home/update/" + id, {
				trigger: true,
				replace: true
			});
		} else if (app.updateItemView) {
			app.mainRouter.navigate("#home/update/" + id, {
				trigger: true,
				replace: true
			});
		}

	},
	delete_item: function (e) {
		e.preventDefault();
		e.stopPropagation();
		var collection = app.viewHome.collection;
		var existing_arr = collection.models;
		var id = $(e.currentTarget).val();
		var newVal = existing_arr.find(function (el) {
			return el.attributes.item_id == id;
		});
		var url = newVal.url + id;
		newVal.destroy({
			url: url,
			wait: true,
			success: function (model, response) {
				app.viewHome.collection.remove(newVal);
				app.viewHome.render();
				notify(model.get("item_name") + " has been deleted");
			}
		})
	},
	share_list: function (e) {
		e.preventDefault();
		e.stopPropagation();
		if (!app.updateItemView) {

			app.mainRouter.navigate("#share", {
				trigger: true,
				replace: true
			});
		} else {
			app.mainRouter.navigate("#share", {
				trigger: true,
				replace: true
			});
		}

	},
	view_list_link : function(e){
		e.preventDefault();
		e.stopPropagation();
		var link = "http://localhost/wishlist-app/#share"
		$("#show-link").html(link).show();
	},
	logout: function () {
		window.location.href = "http://localhost/wishlist-app/";
	}
});
