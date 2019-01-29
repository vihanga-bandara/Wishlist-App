var app = app || {};
app.views = {};
app.models = {};
app.routers = {};
app.collections = {};

function Form_Login_Validation() {
	var user = {
		'user_name': $("#login-username").val(),
		'user_password': $("#login-password").val()
	};
	var message = "";
	if (!user.user_name) {
		message = "Please enter a username";
		return message;
	} else if (!user.user_password) {
		message = "Please enter a password";
		return message;
	} else {
		return user;
	}
}

function Form_Register_Validation() {
	var user = {
		'user_name': $("#reg-username").val(),
		'user_password': $("#reg-password").val(),
		'rpt_password': $("#rpt-password").val(),
		'user_email': $("#reg-email").val(),
		'user_list_name': $("#list-name").val(),
		'user_list_description': $("#description").val(),
	};
	var message = "";
	if (!user.user_name) {
		message = "Please enter a username";
		return message;
	} else if (!user.user_password) {
		message = "Please enter a password";
		return message;
	} else if (!user.rpt_password) {
		message = "Please enter repeat password";
		return message;
	}else if (!user.user_email) {
		message = "Please enter an email";
		return message;
	} else if(user.rpt_password != user.user_password){
		message = "Confirmation password is wrong";
		return message;
	} else {
        return user;
    }
}

function Form_Create_List_Validation() {
	var listDetails = {
		'user_list_name': $("#create-list-name").val(),
		'user_list_description': $("#create-list-desc").val(),
	};
	var message = "";
	if (!listDetails.user_list_name) {
		message = "Please enter an list name";
		return message;
	} else if (!listDetails.user_list_description) {
		message = "Please enter a list description";
		return message;
	} else {
		return listDetails;
	}
}

function notify(message) {
	notif({
		msg: message,
		type: "success",
		position: "center"
	});
}


function Form_Adding_Item_Validation() {
	var item = {
		'item_name': $("#item_name").val(),
		'item_url': $("#item_url").val(),
		'item_price': $("#item_price").val(),
		'item_description': $("#item_description").val(),
		'item_priority': $("#item_priority").val(),
	};
	var message = "";
	if (!item.item_name) {
		message = "Please enter a item name";
		$("#item_name").prop("required",true);
		return message;
	} else if (!item.item_url) {
		message = "Please enter a url";
		$("#item_url").prop("required",true);
		return message;
	} else if (!item.item_price) {
		message = "Please enter a price";
		return message;
	}else if (!item.item_priority) {
		message = "Please enter your priority";
		return message;
	}else {
		return item;
	}
}

function Form_Updating_Item_Validation() {
	var item = {
		'item_name': $("#item_name").val(),
		'item_url': $("#item_url").val(),
		'item_price': $("#item_price").val(),
		'item_description': $("#item_description").val(),
		'item_priority': $("#item_priority").val(),
	};
	var message="";
	if (!item.item_name) {
		message = "Fields cannot be empty when making changes";
		$("#item_name").prop("required",true);
		return message;
	} else if (!item.item_url) {
		message = "Fields cannot be empty when making changes";
		$("#item_url").prop("required",true);
		return message;
	} else if (!item.item_price) {
		message = "Fields cannot be empty when making changes";
		return message;
	}else if (!item.item_priority) {
		message = "Fields cannot be empty when making changes";
		return message;
	}else {
		return item;
	}
}

$(document).ready(function () {
	app.mainRouter = new app.routers.MainRouter();
	$(function () {
		Backbone.history.start();
	});
});
