<html>
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
</html>

<style>
	form {
	width: 500px;
	margin: auto;
	padding: 20px;
	border: 1px solid #ccc;
	box-shadow: 2px 2px 5px #ccc;
	background-color: #ccc;
  }
  
  label {
	display: block;
	margin-bottom: 10px;
	font-weight: bold;
  }
  
  input, textarea {
	width: 100%;
	padding: 12px 20px;
	margin: 8px 0;
	box-sizing: border-box;
	border: 1px solid #ccc;
	border-radius: 4px;
	resize: none;
  }
  
  input[type="submit"] {
	background-color: #4CAF50;
	color: white;
	padding: 12px 20px;
	border: none;
	border-radius: 4px;
	cursor: pointer;
  }
  
  input[type="submit"]:hover {
	background-color: #45a049;
  }
  </style>