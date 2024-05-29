@extends('layout')
@section('main')
<div class="flex-grow-1 p-3 text-center">
        <h2>{{ $product->name }}</h2>
        <img src="{{ $product->image }}" alt="Product Image" style="max-width: 300px; max-height: 300px;">
        <p>Цена: {{ $product->price }}</p>
    
        <form action="{{ url('/tovar/'.$product->id.'/add-review') }}" method="POST">
            @csrf
            <div class="text-center">ОСТАВЬТЕ ОТЗЫВ</div>
            <label for="username">Ваше имя:</label>
            <div class="form-floating mb-3">
                <input type="text" name="username" required>
            </div>
            <label for="feedback">Отзыв:</label>
            <div class="form-floating mb-3">
                <textarea name="feedback" required></textarea>
            </div>
            <label for="evaluation">Оценка:</label>
            <div class="form-floating mb-3">
                <select name="evaluation" required>
                    <option value="5">5 звезд</option>
                    <option value="4">4 звезды</option>
                    <option value="3">3 звезды</option>
                    <option value="2">2 звезды</option>
                    <option value="1">1 звезда</option>
                </select>
            </div>
            <button class="btn btn-primary mb-3" type="submit">Добавить отзыв</button>
        </form>

        <form action="/add-to-cart" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="mb-2 d-flex justify-content-center">
                <input type="number" name="quantity" value="1" min="1" class="text-center">
            </div>
            <button class="btn btn-primary" type="submit">Добавить в корзину</button>
        </form>
    </div>


@endsection