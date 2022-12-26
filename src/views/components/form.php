<section class="form">
	<form action="/submit-form" method="post">
		<label for="price">Price:</label><br>
		<input type="number" id="price" name="price" placeholder="Enter a price"><br>
		<label for="title">Title:</label><br>
		<input type="text" id="title" name="title" placeholder="Enter a title"><br>
		<label for="description">Description:</label><br>
		<textarea id="description" name="description" placeholder="Enter a description"></textarea><br>
		<label for="files">Drop files here:</label><br>
		<input type="file" id="files" name="files" multiple><br>
		<input type="submit" value="Submit">
	</form>
</section>