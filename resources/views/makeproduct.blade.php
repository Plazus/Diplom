@extends('admin')
@section('start')
<head>
    <style>
        .limited-text {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 12ch; /* ограничение до 12 символов */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Добавить продукт</h1>

        <form method="POST" action="/makeproduct" class="form">
            @csrf
            <table class="table">
                <tr>
                    <td><label for="category_id">ID Категории:</label></td>
                    <td><input type="text" id="category_id" name="category_id" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="name">Название продукта:</label></td>
                    <td><input type="text" id="name" name="name" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="description">Описание:</label></td>
                    <td><textarea id="description" name="description" class="form-control"></textarea></td>
                </tr>
                <tr>
                    <td><label for="image">URL Картинки:</label></td>
                    <td><input type="text" id="image" name="image" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="price">Цена:</label></td>
                    <td><input type="text" id="price" name="price" class="form-control"></td>
                </tr>
            </table>
            <input type="submit" value="Добавить продукт" class="btn btn-primary"> 
        </form>

        <hr>

        <h1>Товары</h1>
        <div class="table-responsive">
            <form method="POST" action="/updateproducts" class="mt-3"> 
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID Категории</th>
                            <th>название продукта</th>
                            <th>Описание</th>
                            <th>картинка</th>
                            <th>Цена</th>
                            <th>Действие</th>
                            <th>Удаление</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <input type="hidden" name="product[{{ $product->id }}][id]" value="{{ $product->id }}">
                            <td>{{ $product->id }}</td>
                            <td><input type="category_id" class="limited-text" name="product[{{ $product->id }}][category_id]" value="{{ $product->category_id }}"></td>
                            <td ><input type="name" name="product[{{ $product->id }}][name]" value="{{ $product->name }}"></td>
                            <td ><input type="description" name="product[{{ $product->id }}][description]" value="{{ $product->description }}"></td>
                            <td ><input type="name" class="limited-text" name="product[{{ $product->id }}][image]" value="{{ $product->image }}"></td>
                            <td ><input type="price" class="limited-text" name="product[{{ $product->id }}][price]" value="{{ $product->price }}"></td>
                            <td><button class="btn btn-success">Принять изменения</button></td>
                            <td><button class="btn btn-danger" onclick="deleteProduct({{ $product->id }})">Удалить</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <script>
        function deleteProduct(productId) {
            if (confirm('Вы уверены, что хотите удалить этот продукт?')) {
                fetch(`/deleteproduct/${productId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        window.location.reload();
                    } else {
                        console.error('Ошибка удаления продукта');
                    }
                })
                .catch(error => {
                    console.error('Произошла ошибка:', error);
                });
            }
        }
    </script>
</body>
@endsection