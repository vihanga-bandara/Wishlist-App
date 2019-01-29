var app = app || {};

app.collections.ItemCollection = Backbone.Collection.extend({
	model: app.models.Item,
	comparator: 'item_priority',
	url: '/wishlist-app/api/list/item/',
});