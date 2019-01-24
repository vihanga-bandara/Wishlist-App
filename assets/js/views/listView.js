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
	},
	add_item: function (e) {
		if (!app.addItemView) {
			app.appRouter.navigate("#list/add", {trigger: true, replace: true});
		} else {
			console.log("Not successful")
		}

	}

});
