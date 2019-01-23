var app = app || {};

app.views.LoginFormView = Backbone.View.extend({
	el: ".container",

	render: function () {
		template = _.template($('#login-template').html());
		this.$el.html(template(this.model.attributes));
	},
	events: {
		"click #js-btn": "do_login",
		"click #js-btn-register": "do_register",
	},
	do_login: function (e) {
		e.preventDefault();
		e.stopPropagation();
		var validateForm = validateLoginForm();
		if (!validateForm) {
			console.log("validation error")
		} else {
			this.model.set(validateForm);
			var url = this.model.url + "login";
			this.model.save(this.model.attributes, {
				"url": url,
				success: function (model, reponse) {
					app.appRouter.navigate("#list", {trigger: true, replace: true});

				}
			});
		}
	},
	do_register: function (e) {
		e.preventDefault();
		e.stopPropagation();
		var validateForm = validateRegisterForm();
		if (!validateForm) {
			console.log("validation error")
		} else {
			this.model.set(validateForm);
			var url = this.model.url + "register";
			this.model.save(this.model.attributes, {
				"url": url,
				success: function (model, response) {
					$('.container').stop().removeClass('active');
				}
			});
		}
	},
	toggle: function () {
		$('.container').stop().addClass('active');
	},
	close: function () {
		$('.container').stop().removeClass('active');
	}
});
