var app = app || {};

app.views.ListView = Backbone.View.extend({
	el: ".container",

	render: function () {
		console.log("render");
		template = _.template($('#list-template').html());
		this.$el.html(template);
		this.collection.each(function (item) {
			console.log(item);
			var itemView = new app.views.ItemView({model: item});
			itemView.render();
		});
	},
	events: {
		"click #btn-add-item": "add_item",
		"click #btn-update-item": "update_item",
		"click #btn-delete-item": "delete_item",
		"click #btn-share-list": "share_list",
	},
	add_item: function () {
		if (!app.addItemView) {
			app.appRouter.navigate("#list/add", {trigger: true, replace: true});
		} else {
			console.log("Not successful")
		}

	},
	update_item: function (e) {
		$id = $(e.currentTarget).val();
		if (!app.updateItemView) {

			app.appRouter.navigate("#list/update/" + $id, {trigger: true, replace: true});
		} else {
			console.log("Not successful going to update page");
		}

	},
	delete_item: function (e) {
		$id = $(e.currentTarget).val();
		if (!app.updateItemView) {

			app.appRouter.navigate("#list/delete/" + $id, {trigger: true, replace: true});
		} else {
			console.log("Not successful going to update page");
		}

	},
	share_list: function (e) {
		$id = $(e.currentTarget).val();
		if (!app.updateItemView) {

			app.appRouter.navigate("#share", {trigger: true, replace: true});
		} else {
			console.log("Not successful going to update page");
		}

	}

});
