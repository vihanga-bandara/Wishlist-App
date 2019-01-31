var app = app || {};

app.views.addItemView = Backbone.View.extend({
	el: ".container-add",
	render: function () {
		hideElement();
		$(".container-add").show();
		template = _.template($('#add-item-template').html());
		this.$el.append(template(this.model.attributes));
	},
	events: {
		"click #js-btn-add": "add_item",
		"click #js-btn-back": "go_back",
	},
	add_item: function (e) {
		e.preventDefault();
		e.stopPropagation();
		var validateForm = Form_Adding_Item_Validation();
		if (typeof (validateForm) == "object") {
			this.model.clear();
			this.model.set(validateForm);
			var url = this.model.url;
			this.model.save(this.model.attributes, {
				"url": url,
				wait: true,
				success: function (model, response) {
					notify(model.get("item_name") + " has been added");
					app.viewHome.collection.add(model);
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
