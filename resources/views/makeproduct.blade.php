<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>

    <form method="POST" action="/makeproduct">
        @csrf
        <label for="category_id">Category ID:</label>
        <input type="text" id="category_id" name="category_id"><br><br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea><br><br>
        <label for="image">Image URL:</label>
        <input type="text" id="image" name="image"><br><br>
        <label for="price">Price:</label>
        <input type="text" id="price" name="price"><br><br>
        <input type="submit" value="Add Product"> 
    </form>


</body>
</html>