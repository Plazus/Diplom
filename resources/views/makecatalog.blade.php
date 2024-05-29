<!DOCTYPE html>
<html>
<head>
    <title> Create </title>
</head>
<body>
    <h1>CreateCatalog</h1>
    <form method="POST" action="/makecatalog">
        @csrf
        <label for="name"> NAME:</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="description"> Desciption:</label>
        <textarea id="description" name="description"> </textarea> <br> <br>
        <input type="submit" value="Add Category">
    </form>




</body>
</html>