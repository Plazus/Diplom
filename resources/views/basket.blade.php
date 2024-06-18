@extends('layout')
@section('main')
<div class="flex-grow-1 p-3">
    <h2 class="text-center">Корзина</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Номер</th>
                <th>Количество</th>
                <th>Товар</th>
                <th>Цена</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $index => $item)
            <tr>
                <td>{{ $item->Number }}</td>
                <td>{{ $item->Count }}</td>
                <td>{{  $productNames[$index]->name  }}</td>
                <td>{{ $item->price }}</td>
                <td><button class="btn btn-danger" onclick="removeFromCart({{ $item->id }})">Удалить</button></td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3">Общая стоимость:</td>
                <td>{{ $totalCost }}</td>
                <td></td>
            </tr>
            
        </tbody>
    </table>

    <form class="mb-3" action="/apply-coupon" method="POST">
        @csrf
        <div class="mb-3 text-dark" style="width: 300px;">
            <label for="coupon"> Введите купон:</label>
            <input type="text" name="coupon" id="coupon" class="form-control" required>
        </div>
        <button class="btn btn-primary" type="submit">Применить купон</button>
    </form>

    <form action="/create-order" method="POST">
        @csrf
        <button class="btn btn-primary" type="submit">Создать заказ</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function removeFromCart(id) {
        $.ajax({
            url: '/remove-from-cart/' + id,
            type: 'POST',
            data: {
                _method: 'DELETE',
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                location.reload(); 
            }
        });
    }
</script>
@endsection