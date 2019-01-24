var app = app || {};

app.views.addItemView = Backbone.View.extend({

	el:".container-add",
	render:function () {
		template = _.template($('#add-item-template').html());
		this.$el.append(template(this.model.attributes));

	}
});

