var app = app || {};

app.models.Item = Backbone.Model.extend({
	urlRoot: '/wishlist-app/api/list/item/',
	defaults: {
		id: null,
		price: null,
		url: null,
		category_id: null,
		status_id: null,
		title: null,
		description: null
	},
	url: '/wishlist-app/api/list/item/',
});

app.collections.ItemCollection = Backbone.Collection.extend({

	model: app.models.Item,

	url: '/wishlist-app/api/list/item/'
});
