@extends('admin')
@section('start')
<body>
    <div class="container">
        <h1>Создать новый тип товара</h1>
        <form method="POST" action="/makecatalog" class="form">
            @csrf
            <table class="table">
                <tr>
                    <td><label for="name">Название:</label></td>
                    <td><input type="text" id="name" name="name" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="description">Примечание:</label></td>
                    <td><textarea id="description" name="description" class="form-control"></textarea></td>
                </tr>
            </table>
            <input type="submit" value="Добавить" class="btn btn-primary"> 
        </form>
    </div>
</body>
@endsection