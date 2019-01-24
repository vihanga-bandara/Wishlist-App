var app = app || {};

app.views.updateItemView = Backbone.View.extend({
	el:".container-update",
	render: function () {
		template = _.template($('#update-item-template').html());
		$(".container").html("");
		this.$el.append(template(this.model.attributes));
	},
	events: {
		"click #js-btn-add": "update_item",
		"click #go-back": "go_back_item",
	},
	update_item: function (e) {
		e.preventDefault();
		e.stopPropagation();
		var validateForm = validateUpdateForm();
		if (!validateForm) {
			console.log("validation error")
		} else {
			this.model.set(validateForm);
			var url = this.model.url;
			this.model.save(this.model.attributes, {
				"url": url,
				success: function (model, response) {
					alert("Item has been updated");
					app.appRouter.navigate("#list", {trigger: true, replace: true});
				}
			});
		}
	},
	go_back_item: function (e) {
		app.appRouter.navigate("#list", {trigger: true, replace: true});
	}
});

