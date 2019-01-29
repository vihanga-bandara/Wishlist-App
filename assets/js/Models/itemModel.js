var app = app || {};

app.models.Item = Backbone.Model.extend({
	urlRoot: '/wishlist-app/api/list/item/',
	url: '/wishlist-app/api/list/item/',
	defaults: {
		"id": "",
		"item_id": "",
		"item_name": "",
		"item_url": "",
		"item_price": "",
		"item_description": "",
		"item_priority": "",
		"item_image": ""
	}
});