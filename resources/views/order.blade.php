@extends('personal')
@section('start')

<div class="flex-grow-1 p-3">
    <h2 class="text-center">Заказы пользователя</h2>
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Номер заказа</th>
                            <th>Количество заказанных товаров</th>
                            <th>Стоимость заказа</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->count }}</td>
                            <td>{{ $order->totalCost }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection