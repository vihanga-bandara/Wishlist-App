var app = app || {};

app.views.addItemView = Backbone.View.extend({
	el:".container-add",
	render:function () {
		template = _.template($('#add-item-template').html());
		this.$el.append(template(this.model.attributes));

	},
	events: {
		"click #js-btn-add": "add_item",
	},
	add_item: function (e) {
	e.preventDefault();
	e.stopPropagation();
	var validateForm = validateAddForm();
	if (!validateForm) {
		console.log("validation error")
	} else {
		this.model.set(validateForm);
		var url = this.model.url;
		this.model.save(this.model.attributes, {
			"url": url,
			success: function (model, response) {
				alert("Item has been added");
				app.appRouter.navigate("#list", {trigger: true, replace: true});
			}
		});
	}
}
});

