var app = app || {};

app.views.shareListView = Backbone.View.extend({
	el: ".container-share",

	render: function () {
		template = _.template($('#list-template-share').html());
		this.$el.html(template);
		this.collection.each(function (item) {
			var ItemView = new app.views.ItemsViewShare({model: item});
			ItemView.render();
		});
	},
	events: {
		"click #go-back": "go_back_list",
	},
	go_back_item: function (e) {
		app.appRouter.navigate("#list", {trigger: true, replace: true});
	}
});
