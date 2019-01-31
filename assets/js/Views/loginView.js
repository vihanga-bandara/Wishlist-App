var app = app || {};

app.views.LoginView = Backbone.View.extend({
	el: ".container",
	render: function () {
		//get html content of 'login-template'
		template = _.template($('#login-template').html());
		this.$el.html(template);
		hideElement();
		$(".container").show();
	},
	events: {
		"click #js-btn": "login",
		"click #js-btn-register": "register",
		'change input[type!="submit"]': 'onFocusInput'
	},
	login: function (e) {
		e.preventDefault();
		e.stopPropagation();
		var validationResponse = Form_Login_Validation();
		if (typeof (validationResponse) == "object") {
			this.model.set(validationResponse);
			var urlPost = this.model.url + "login";
			this.model.save(this.model.attributes, {
				"url": urlPost,
				wait:true,
				success: function (model, response) {
					var userJson = JSON.stringify(model);
					localStorage.setItem("UserJson", userJson);
					app.mainRouter.navigate("#home", {
						trigger: true,
						replace: true
					});
				}
				// error: function (e) {
				// 	$("#errorsTab").html("Cannot Login due to a server error").show().fadeOut(5000);
				// }
			});
		} else {
			$("#errorsTab").html(validationResponse)
				.show()
				.fadeOut(5000);
		}
	},
	register: function (e) {
		e.preventDefault();
		e.stopPropagation();
		var validationResponse = Form_Register_Validation();
		if (typeof (validationResponse) == "object") {
			this.model.set(validationResponse);
			var url = this.model.url + "register";
			this.model.save(this.model.attributes, {
				"url": url,
				wait: true,
				success: function (model, response) {
					$("#home-tab").click();
					notify("Registration successful!");
				},
				error: function () {
					$("#errorsTabReg").html("Registration was unsuccessful").show().fadeOut(5000);
					;
				}
			});
		} else {
			$("#errorsTabReg").html(validationResponse)
				.show()
				.fadeOut(5000);
		}
	},
	onFocusInput: function (e) {
		e.preventDefault();
		e.stopPropagation();
		this.$el.find('#errorsTab')
			.hide().fadeOut();
		;
	}
});
