var app = app || {};

app.views.ListView = Backbone.View.extend({
	el: ".container",

	render: function () {
		console.log("render");
		template = _.template($('#list-template').html());
		this.$el.html(template);
		this.collection.each(function (item) {
			console.log(item);
			var itemView =new app.views.ItemView({model: item});
			itemView.render();
		});

	},
	events: {
		"click #js-add": "do_register",
	},

});
