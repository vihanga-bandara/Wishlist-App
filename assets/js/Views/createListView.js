var app = app || {};

app.views.CreateListView = Backbone.View.extend({
	el: ".container-create-list",
	render: function () {
		//get html content of 'create-list-template'
		$(".container").hide("");
		template = _.template($('#create-list-template').html());
		this.$el.html(template);
	}
	,
	events: {
		"click #create-list-btn": "createList"
	},
	createList: function (e) {
		e.preventDefault();
		e.stopPropagation();
		var validationResponse = Form_Create_List_Validation();
		if (typeof (validationResponse) == "object") {
			this.model.set(validationResponse);
			var url = this.model.url + "update/"+ app.user.get("user_id");
			this.model.save(this.model.attributes, {
				"url": url,
				wait: true,
				success: function (model, response) {
					var userJson = JSON.stringify(model);
					localStorage.setItem("UserJson",userJson);
					app.mainRouter.navigate("#home", {
						trigger: true,
						replace: true
					});
				},
				error: function () {
					$("#errorsTab").html("Creating List was unsuccessful").show().fadeOut();
				}
			});
		} else {
			this.$el.find('#createListErrorsTab')
				.html(validationResponse)
				.show().fadeOut(5000);
		}
	}
});



