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
		"click #go-back": "go_back",
	},
	update_item: function (e) {
		e.preventDefault();
		e.stopPropagation();
		var validateForm = Form_Updating_Item_Validation();
		if (!validateForm) {
		} else {
			this.model.set(validateForm);
			var url = this.model.url + this.model.get("item_id");
			this.model.save(this.model.attributes, {
                patch: false,
				"url": url,
				success: function (model, response) {
					alert("Item has been updated");
					app.mainRouter.navigate("#home", {trigger: true, replace: true});
                },
                error: function(){
                    console.log("error");
                }
			});
		}
	},
	go_back: function (e) {
		app.mainRouter.navigate("#home", {trigger: true, replace: true});
	}
});

