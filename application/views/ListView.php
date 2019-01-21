<?php defined('BASEPATH') OR exit('No direct script access allowed');
include ("header.php");
?>

<div class="container">
	<h1>Welcome to Admin!</h1>

	<div id="data">
		<table>
			<?php foreach ($names as $row) { ?>

				<tr>
					<td><?= $row->item_id ?></td>
					<td><?= $row->user_id ?></td>
					<td><?= $row->item_name ?></td>
					<td><?= $row->item_description ?></td>
					<td><?= $row->item_url ?></td>
				</tr>

			<?php } ?>
		</table>
	</div>

	<br>

	<p id="message"></p>
	<p id="createmsg"></p>

	<br> <br><br>
	<!---->
	<!--	<h3>Register</h3>-->
	<!---->
	<!--	<form>-->
	<!---->
	<!--		<label for='Name'> Name </label>-->
	<!--		<input type='text' name='name' id='name' size='30'/> <br>-->
	<!---->
	<!--		<label for='Password'> Password </label>-->
	<!--		<input type='text' name='password' id='password' size='30'/> <br>-->
	<!---->
	<!--		<label for='WishListName'> Name of your Wish List </label>-->
	<!--		<input type='text' name='wishListName' id='wishListName' size='30'/> <br>-->
	<!---->
	<!--		<label for='WishListDescription'> Description of the Wish List </label>-->
	<!--		<input type='text' name='wishListDescription' id='wishListDescription'/> <br>-->
	<!---->
	<!--		<input type="submit" value="Create" id="create"/>-->
	<!---->
	<!--	</form>-->

	<h3>Create Item</h3>

	<form>

		<label for='ItemName'> Name of Item </label>
		<input type='text' name='item_name' id='item_name'/> <br>

		<label for='ItemUrl'> URL of Item </label>
		<input type='text' name='item_url' id='item_url'/> <br>

		<label for='ItemPrice'> Price of Item </label>
		<input type='text' name='item_price' id='item_price'/> <br>

		<label for='ItemDescription'> Description </label>
		<input type='text' name='item_description' id='item_description'/> <br>

		<label for='ItemPriority'> Priority of Item </label>
		<select id="item_priority">
			<option value="1">Must Have</option>
			<option value="2">Would be Nice to Have</option>
			<option value="3">If You Can</option>
		</select>
		<br>

		<input type="submit" value="add_item" id="add_item"/>

	</form>

	<br><br>
		<h3>Delete Item</h3>
		<form>
			<label for="edit"> Type in the id to delete/edit</label>
			<input type="text" name="item_id" id="item_id"/> <br>

			<input type="submit" value="Delete" id="delete"/>
			<input type="submit" value="Edit" id="edit"/>
		</form>


		<div id="editBox" style="display: none;">
			<form>

				<input type="hidden" name="hidden_item_id" id="item_id"/> <br>

				<label for="editname">Edit Name</label>
				<input type="text" name="edit_name" id="edit_name"/> <br>

				<label for="editname">Edit Address</label>
				<input type="text" name="edit_url" id="edit_url"/> <br>

				<label for="editname">Edit Address</label>
				<input type="text" name="edit_price" id="edit_price"/> <br>

				<label for="editname">Edit Telephone</label>
				<input type="text" name="edit_description" id="edit_description"/> <br>

				<label for="editname">Edit Telephone</label>
				<input type="text" name="edit_description" id="edit_description"/> <br>

				<label for='ItemPriority'> Priority of Item </label>
				<select id="item_priority">
					<option value="1">Must Have</option>
					<option value="2">Would be Nice to Have</option>
					<option value="3">If You Can</option>
				</select>

				<input type="submit" value="Update" id="update">

			</form>
		</div>
	<script>
		$(document).ready(function () {
			$("#add_item").click(function (event) {
				event.preventDefault();
				var title = $("input#item_name").val();
				var url = $("input#item_url").val();
				var price = $("input#item_price").val();
				var description = $("input#item_description").val();
				var priority = $("select#item_priority").val();
				$.ajax({
					method: "POST",
					url: "<?php echo base_url(); ?>WishList/add",
					dataType: 'JSON',
					data: {
						item_name: title,
						item_url: url,
						item_price: price,
						item_priority: priority,
						item_description: description
					},

					success: function (data) {
						console.log(name, url, price);
						$("#data").load(location.href + " #data");
						$("#message").html("You have successfully added an item to your list");
						$("#message").show().fadeOut(3000);
						// $("input#item_name").val("");
						// $("input#item_url").val("");
						// $("input#item_price").val("");

					}
				});
			});
		});

	</script>
</div>


