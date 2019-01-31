var app = app || {};

app.views.updateItemView = Backbone.View.extend({
	el: ".container-update",
	render: function () {
		template = _.template($('#update-item-template').html());
		hideElement();
		$(".container-update").show();
		this.$el.append(template(this.model.attributes));
	},
	events: {
		"click #js-btn-add": "update_item",
		"click #go-back": "go_back",
	},
	update_item: function (e) {
		e.preventDefault();
		e.stopPropagation();
		var validateForm = Form_Updating_Item_Validation();
		if (typeof (validateForm) == "object") {
			this.model.set(validateForm);
			var url = this.model.url + this.model.get("item_id");
			this.model.save(this.model.attributes, {
				patch: false,
				"url": url,
				success: function (model, response) {
					app.mainRouter.navigate("#home", {
							trigger: true,
							replace: true
						}
					);
					notify(model.get("item_name") + " has been updated");
					app.viewHome.collection.sort();
					app.mainRouter.navigate("#home", {
						trigger: true,
						replace: true
					});
				},
				error: function () {
					notify("Error updating, please try again later.");
				}
			});
		} else {
			notify(validateForm);
		}
	},
	go_back: function (e) {
		e.preventDefault();
		e.stopPropagation();
		app.mainRouter.navigate("#home", {trigger: true, replace: true});
	}
});

